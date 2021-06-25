<?php

namespace App\Repositories;

use Monolog\Logger;
use PDO;
use Psr\Log\LoggerInterface;



class MagentoStoragePdo implements MagentoStorage
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * MagentoStorage constructor.
     * @param $log Logger
     * @param $dbCon
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getImagesByEntityId(int $entityId): array
    {
        $result = [];

        $sql
            = "SELECT cpeg.entity_id, CONCAT('https://pd.ru/media/catalog/product/', cpeg.value) AS image, cpemgv.position
                FROM catalog_product_entity_media_gallery AS cpeg
                INNER JOIN catalog_product_entity_media_gallery_value cpemgv
                ON cpeg.value_id = cpemgv.value_id
                WHERE cpeg.entity_id = $entityId AND cpemgv.store_id = 0 AND cpemgv.disabled = 0
                ORDER BY cpemgv.position
                LIMIT 5";
        $stmt = $this->getConnection()->query($sql);
        while ($row = $stmt->fetch())
        {
            $result[] = ['original' => $row['image'], 'thumbnail' => $row['image']];
        }

        return $result;
    }

    private function getConnection(): PDO
    {
        $host = getenv("MAGENTO_DB_HOSTNAME");
        $db = getenv("MAGENTO_DB_BASE");
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        return new PDO($dsn, getenv("MAGENTO_DB_USERNAME"), getenv("MAGENTO_DB_PASSWORD"), $opt);
    }

    public function getManufacturers(): array
    {
        $result = [];
        $sql = "SELECT o.option_id AS manufacturer_id, ov.value AS manufacturer_name
                FROM `eav_attribute_option` o
                LEFT JOIN `eav_attribute_option_value` ov ON ov.option_id = o.option_id AND ov.store_id = 0
                WHERE attribute_id = 148
                ORDER BY ov.value";
        $stmt = $this->getConnection()->query($sql);
        while ($row = $stmt->fetch())
        {
            $result[] = $row;
        }

        return $result;

    }

    public function getCategories()
    {
        $url = 'https://pd.ru/dop/tab.php?action=get_category';
        return $this->getInfo($url);
    }

    public function getSuppliers()
    {
        $url = 'https://pd.ru/dop/tab.php?action=get_postavshiki';
        return $this->getInfo($url);
    }

    public function getCatIds()
    {
        return $this->extractColumnFromApi('attribute_set_id', [$this, 'getCategories']);
    }

    public function getSupplierIds()
    {
        return $this->extractColumnFromApi('postavshik', [$this, 'getSuppliers']);
    }

    private function extractColumnFromApi(string $fieldName, callable $func): array
    {
        $result = [];
        $apiInfo = $func();
        foreach ($apiInfo as $row) {
            $result[] = $row[$fieldName];
        }
        return $result;
    }

    public function getShopImageByEntityId(int $entityId)
    {
        $sql = "SELECT
                  m.value image,
                  p.entity_id,
                  p.sku artikul,
                  IF (small_image.value = m.value, 1, 0) main,
                  name.value name,
                  p.attribute_set_id,
                  st.is_in_stock,
                  postavshik.value postavshik,
                  name_pricelist.value name_pricelist,
                  upakovka_val.value upakovka
                FROM `catalog_product_entity` p
                JOIN `catalog_product_entity_varchar` m ON m.entity_id = p.entity_id and m.attribute_id=85
                LEFT JOIN `catalog_product_entity_varchar` name ON p.entity_id = name.entity_id AND name.attribute_id = (SELECT attribute_id FROM `eav_attribute` WHERE entity_type_id=4 AND attribute_code='name')
                LEFT JOIN `catalog_product_entity_int` postavshik ON p.entity_id = postavshik.entity_id AND postavshik.attribute_id = (SELECT attribute_id FROM `eav_attribute` WHERE entity_type_id=4 AND attribute_code='postavshik')
                LEFT JOIN `catalog_product_entity_int` upakovka ON p.entity_id = upakovka.entity_id AND upakovka.attribute_id = (SELECT attribute_id FROM `eav_attribute` WHERE entity_type_id=4 AND attribute_code='upakovka')
                LEFT JOIN `eav_attribute_option_value` upakovka_val ON upakovka.value = upakovka_val.option_id
                LEFT JOIN `catalog_product_entity_text` name_pricelist ON p.entity_id = name_pricelist.entity_id AND name_pricelist.attribute_id = (SELECT attribute_id FROM `eav_attribute` WHERE entity_type_id=4 AND attribute_code='naimenovanie_v_prais_liste')
                LEFT JOIN `catalog_product_entity_varchar` small_image ON p.entity_id = small_image.entity_id AND small_image.attribute_id = (SELECT attribute_id FROM `eav_attribute` WHERE entity_type_id=4 AND attribute_code='small_image')
                LEFT JOIN `cataloginventory_stock_item` st ON p.entity_id = st.product_id
                WHERE p.entity_id={$entityId}
                LIMIT 1
                ";
        $stmt = $this->getConnection()->query($sql);
        $row = $stmt->fetch();
        if (!$row) {
            return [];
        }
        return $row;
    }

    private function getInfo($url)
    {
        return json_decode(gzinflate(file_get_contents($url)), 1);
    }

    private function getNamesByProductType(string $productType): array
    {
        $result = [];

        $sql
            = "SELECT p.entity_id, name.value as name, p.sku
            FROM `catalog_product_entity` p
            LEFT JOIN `catalog_product_entity_varchar` name
            ON p.entity_id = name.entity_id
            AND name.attribute_id = (
                                    SELECT attribute_id
                                    FROM `eav_attribute`
                                    WHERE entity_type_id=4
                                    AND attribute_code='name'
                                    )
            WHERE p.type_id = '{$productType}' AND p.updated_at >= ( CURDATE() - INTERVAL 3 DAY )
            ";
        $stmt = $this->getConnection()->query($sql);
        while ($row = $stmt->fetch())
        {
            $result[] = $row['entity_id'];
        }

        return $result;
    }

    public function getProductNames(): array
    {
        return $this->getNamesByProductType('simple');
    }

    public function getGroupProductNames(): array
    {
        return $this->getNamesByProductType('grouped');
    }

    public function getProductEntityIds(): array
    {
        $result = [];
        $stmt = $this->getConnection()->query("
            SELECT DISTINCT p.entity_id
            FROM `catalog_product_entity` p
            WHERE p.type_id='simple'
        ");
        while ($row = $stmt->fetch())
        {
            $result[] = $row['entity_id'];
        }

        return $result;
    }

    public function getMagentoImageLinks(): array
    {
        $result = [];
        $stmt = $this->getConnection()->query("
            SELECT p.entity_id, m.value AS image
            FROM `catalog_product_entity` p
            JOIN `catalog_product_entity_varchar` m
            ON m.entity_id = p.entity_id AND m.attribute_id=85
            WHERE p.updated_at >= ( CURDATE() - INTERVAL 3 DAY )
        ");
        while ($row = $stmt->fetch())
        {
            $result[] = $row;
        }

        return $result;
    }

    public function getMagentoPriceListNames()
    {

        $sql = "SELECT p.entity_id, cpet.value AS name_pricelist
            FROM `catalog_product_entity` p
            LEFT JOIN `catalog_product_entity_text` cpet
            ON p.entity_id = cpet.entity_id
            AND cpet.attribute_id = (
            SELECT attribute_id
            FROM `eav_attribute`
            WHERE entity_type_id=4
            AND attribute_code='naimenovanie_v_prais_liste')
            WHERE p.updated_at >= ( CURDATE() - INTERVAL 3 DAY )
            ";
        $result = [];
        $stmt = $this->getConnection()->query($sql);
        while ($row = $stmt->fetch())
        {
            $result[] = $row;
        }

        return $result;
    }

    public function getUpakovka()
    {
        $sql = "SELECT cpe.entity_id, eaov.value upakovka
            FROM catalog_product_entity_int cpei
            INNER JOIN eav_attribute_option_value eaov
            ON cpei.value = eaov.option_id AND cpei.attribute_id = 215
            INNER JOIN catalog_product_entity cpe on cpei.entity_id = cpe.entity_id
            WHERE cpe.updated_at >= ( CURDATE() - INTERVAL 3 DAY )";
        $result = [];
        $stmt = $this->getConnection()->query($sql);
        while ($row = $stmt->fetch())
        {
            $result[] = $row;
        }

        return $result;
    }

    public function getAttributeSet(): array
    {
        $sql = "SELECT cpe.entity_id, cpe.attribute_set_id
                FROM catalog_product_entity cpe
                ";
        $result = [];
        $stmt = $this->getConnection()->query($sql);
        while ($row = $stmt->fetch())
        {
            $result[] = $row;
        }

        return $result;
    }

    public function getPostavshik()
    {
        $sql = "SELECT p.entity_id, postavshik.value postavshik
            FROM `catalog_product_entity` p
            LEFT JOIN `catalog_product_entity_int` postavshik ON p.entity_id = postavshik.entity_id AND postavshik.attribute_id = (SELECT attribute_id FROM `eav_attribute` WHERE entity_type_id=4 AND attribute_code='postavshik')
            WHERE p.type_id = 'simple' AND p.updated_at >= ( CURDATE() - INTERVAL 3 DAY )";
        $result = [];
        $stmt = $this->getConnection()->query($sql);
        while ($row = $stmt->fetch())
        {
            $result[] = $row;
        }

        return $result;
    }

    public function getManufacturerIds(): array
    {
        return $this->extractColumnFromApi('manufacturer_id', [$this, 'getManufacturers']);
    }
}

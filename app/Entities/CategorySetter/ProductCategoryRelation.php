<?php

namespace App\Entities\CategorySetter;

use App\Entities\Category;
use App\Entities\ShopImage;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategoryRelation
 *
 * @ORM\Table(name="cs_product_category_relation",
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="product_category_relation_unique",
 *            columns={"attribute_set_id", "shop_image_id"})
 *    }
 * )
 * @ORM\Entity(repositoryClass="App\Repositories\CategorySetter\DoctrineProductCategoryRelationRepository")
 */
class ProductCategoryRelation
{

    public $resource;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entities\ShopImage")
     * @ORM\JoinColumn(name="shop_image_id", referencedColumnName="id")
     */
    private ShopImage $shopImage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Category")
     * @ORM\JoinColumn(name="attribute_set_id", referencedColumnName="id")
     */
    private Category $category;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return ShopImage
     */
    public function getShopImage(): ShopImage
    {
        return $this->shopImage;
    }

    /**
     * @param ShopImage $shopImage
     */
    public function setShopImage(ShopImage $shopImage): void
    {
        $this->shopImage = $shopImage;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

}

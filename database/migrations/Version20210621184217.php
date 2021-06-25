<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210621184217 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cs_product_category_relation (id INT AUTO_INCREMENT NOT NULL, shop_image_id INT NOT NULL, attribute_set_id INT NOT NULL, UNIQUE INDEX UNIQ_411F7A28E61DDFFB (shop_image_id), UNIQUE INDEX UNIQ_411F7A28321A2342 (attribute_set_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cs_product_category_relation ADD CONSTRAINT FK_411F7A28E61DDFFB FOREIGN KEY (shop_image_id) REFERENCES shop_image (id)');
        $this->addSql('ALTER TABLE cs_product_category_relation ADD CONSTRAINT FK_411F7A28321A2342 FOREIGN KEY (attribute_set_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cs_product_category_relation');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

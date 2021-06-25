<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210621200436 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE UNIQUE INDEX product_category_relation_unique ON cs_product_category_relation (attribute_set_id, shop_image_id)');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX product_category_relation_unique ON cs_product_category_relation');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

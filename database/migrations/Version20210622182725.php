<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210622182725 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cs_product_category_relation DROP INDEX UNIQ_411F7A28321A2342, ADD INDEX IDX_411F7A28321A2342 (attribute_set_id)');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cs_product_category_relation DROP INDEX IDX_411F7A28321A2342, ADD UNIQUE INDEX UNIQ_411F7A28321A2342 (attribute_set_id)');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

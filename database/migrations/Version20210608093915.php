<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210608093915 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop_image ADD grtov_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE shop_image ADD CONSTRAINT FK_22B5E0D987EFBE0 FOREIGN KEY (grtov_id) REFERENCES group_product (grtov)');
        $this->addSql('CREATE INDEX IDX_22B5E0D987EFBE0 ON shop_image (grtov_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop_image DROP FOREIGN KEY FK_22B5E0D987EFBE0');
        $this->addSql('DROP INDEX IDX_22B5E0D987EFBE0 ON shop_image');
        $this->addSql('ALTER TABLE shop_image DROP grtov_id, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

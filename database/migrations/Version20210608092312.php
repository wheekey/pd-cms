<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210608092312 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE group_product ADD grtov_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE group_product ADD CONSTRAINT FK_554A50A1987EFBE0 FOREIGN KEY (grtov_id) REFERENCES group_product (grtov)');
        $this->addSql('CREATE INDEX IDX_554A50A1987EFBE0 ON group_product (grtov_id)');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE group_product DROP FOREIGN KEY FK_554A50A1987EFBE0');
        $this->addSql('DROP INDEX IDX_554A50A1987EFBE0 ON group_product');
        $this->addSql('ALTER TABLE group_product DROP grtov_id');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

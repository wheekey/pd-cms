<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210622123854 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop_image ADD manufacturer_id INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE shop_image ADD CONSTRAINT FK_22B5E0DA23B42D FOREIGN KEY (manufacturer_id) REFERENCES manufacturer (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_22B5E0DA23B42D ON shop_image (manufacturer_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop_image DROP FOREIGN KEY FK_22B5E0DA23B42D');
        $this->addSql('DROP INDEX IDX_22B5E0DA23B42D ON shop_image');
        $this->addSql('ALTER TABLE shop_image DROP manufacturer_id, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210612132724 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE manufacturer (id INT AUTO_INCREMENT NOT NULL, manufacturer_name VARCHAR(128) DEFAULT NULL, manufacturer_id SMALLINT DEFAULT NULL, INDEX man_id (id), INDEX man_name (manufacturer_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE manufacturer');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

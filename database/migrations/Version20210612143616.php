<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210612143616 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category CHANGE attribute_set_id attribute_set_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE manufacturer CHANGE manufacturer_id manufacturer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category CHANGE attribute_set_id attribute_set_id SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE manufacturer CHANGE manufacturer_id manufacturer_id SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

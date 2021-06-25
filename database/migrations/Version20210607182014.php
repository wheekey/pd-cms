<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210607182014 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop_image DROP FOREIGN KEY FK_22B5E0DE61DDFFB');
        $this->addSql('DROP INDEX IDX_22B5E0DE61DDFFB ON shop_image');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP, CHANGE shop_image_id grimg_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shop_image ADD CONSTRAINT FK_22B5E0DB553893F FOREIGN KEY (grimg_id) REFERENCES group_image (grimg)');
        $this->addSql('CREATE INDEX IDX_22B5E0DB553893F ON shop_image (grimg_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shop_image DROP FOREIGN KEY FK_22B5E0DB553893F');
        $this->addSql('DROP INDEX IDX_22B5E0DB553893F ON shop_image');
        $this->addSql('ALTER TABLE shop_image CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE grimg_id shop_image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shop_image ADD CONSTRAINT FK_22B5E0DE61DDFFB FOREIGN KEY (shop_image_id) REFERENCES group_image (grimg) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_22B5E0DE61DDFFB ON shop_image (shop_image_id)');
    }
}

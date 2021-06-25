<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210609170850 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sku_group_image');
        $this->addSql('DROP TABLE sku_group_product');
        $this->addSql('DROP TABLE sku_no_group');
        $this->addSql('ALTER TABLE shop_image ADD new_name TINYTEXT DEFAULT NULL, ADD not_fit TINYINT(1) DEFAULT NULL, CHANGE updated_at updated_at DATETIME on update CURRENT_TIMESTAMP');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sku_group_image (id INT AUTO_INCREMENT NOT NULL, shop_image_id INT DEFAULT NULL, grimg INT DEFAULT NULL, INDEX grimg (grimg), INDEX shop_image_id_fk (shop_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sku_group_product (id INT AUTO_INCREMENT NOT NULL, grtov INT DEFAULT NULL, shop_image_id INT DEFAULT NULL, sku_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX grtov (grtov), UNIQUE INDEX shop_image_id_uindex (shop_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sku_no_group (id INT AUTO_INCREMENT NOT NULL, shop_image_id INT DEFAULT NULL, INDEX shop_image_id_index (shop_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sku_group_image ADD CONSTRAINT FK_14B593C8688525E9 FOREIGN KEY (grimg) REFERENCES group_image (grimg) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sku_group_image ADD CONSTRAINT FK_14B593C8E61DDFFB FOREIGN KEY (shop_image_id) REFERENCES shop_image (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sku_group_product ADD CONSTRAINT FK_8321CF1F24FD57BA FOREIGN KEY (grtov) REFERENCES group_product (grtov) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sku_group_product ADD CONSTRAINT FK_8321CF1FE61DDFFB FOREIGN KEY (shop_image_id) REFERENCES shop_image (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sku_no_group ADD CONSTRAINT FK_8DAC313E61DDFFB FOREIGN KEY (shop_image_id) REFERENCES shop_image (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shop_image DROP new_name, DROP not_fit, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210220164405 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gem_size (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, gem_id INT NOT NULL, value DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_BE2FAA614584665A (product_id), INDEX IDX_BE2FAA61A5AD5580 (gem_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jewel_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, brand_id INT DEFAULT NULL, style_id INT DEFAULT NULL, metal_id INT NOT NULL, article VARCHAR(25) NOT NULL, size DOUBLE PRECISION DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, price INT NOT NULL, INDEX IDX_D34A04ADC54C8C93 (type_id), INDEX IDX_D34A04AD44F5D008 (brand_id), INDEX IDX_D34A04ADBACD6074 (style_id), INDEX IDX_D34A04AD2B534CF2 (metal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, date DATE NOT NULL, total_price INT NOT NULL, INDEX IDX_6117D13B4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gem_size ADD CONSTRAINT FK_BE2FAA614584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE gem_size ADD CONSTRAINT FK_BE2FAA61A5AD5580 FOREIGN KEY (gem_id) REFERENCES gem (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC54C8C93 FOREIGN KEY (type_id) REFERENCES jewel_type (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBACD6074 FOREIGN KEY (style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD2B534CF2 FOREIGN KEY (metal_id) REFERENCES metal (id)');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD44F5D008');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC54C8C93');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD2B534CF2');
        $this->addSql('ALTER TABLE gem_size DROP FOREIGN KEY FK_BE2FAA614584665A');
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13B4584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADBACD6074');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE gem_size');
        $this->addSql('DROP TABLE jewel_type');
        $this->addSql('DROP TABLE metal');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE purchase');
        $this->addSql('DROP TABLE style');
    }
}

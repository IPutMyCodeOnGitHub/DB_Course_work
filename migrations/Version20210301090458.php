<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210301090458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE metal_assay (id INT AUTO_INCREMENT NOT NULL, metal_id INT NOT NULL, assay INT NOT NULL, INDEX IDX_19991F502B534CF2 (metal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE metal_assay ADD CONSTRAINT FK_19991F502B534CF2 FOREIGN KEY (metal_id) REFERENCES metal (id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD2B534CF2');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD2B534CF2 FOREIGN KEY (metal_id) REFERENCES metal_assay (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD2B534CF2');
        $this->addSql('DROP TABLE metal_assay');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD2B534CF2');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD2B534CF2 FOREIGN KEY (metal_id) REFERENCES metal (id)');
    }
}

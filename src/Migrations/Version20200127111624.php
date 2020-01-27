<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200127111624 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, techno VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, name_id INT NOT NULL, enterprise_id INT DEFAULT NULL, salary INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_288A3A4E71179CD6 (name_id), INDEX IDX_288A3A4EA97D1AC3 (enterprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techno (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techno_poste (techno_id INT NOT NULL, poste_id INT NOT NULL, INDEX IDX_5F9D164051F3C1BC (techno_id), INDEX IDX_5F9D1640A0905086 (poste_id), PRIMARY KEY(techno_id, poste_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E71179CD6 FOREIGN KEY (name_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4EA97D1AC3 FOREIGN KEY (enterprise_id) REFERENCES enterprise (id)');
        $this->addSql('ALTER TABLE techno_poste ADD CONSTRAINT FK_5F9D164051F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE techno_poste ADD CONSTRAINT FK_5F9D1640A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E71179CD6');
        $this->addSql('ALTER TABLE techno_poste DROP FOREIGN KEY FK_5F9D1640A0905086');
        $this->addSql('ALTER TABLE techno_poste DROP FOREIGN KEY FK_5F9D164051F3C1BC');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE techno');
        $this->addSql('DROP TABLE techno_poste');
    }
}

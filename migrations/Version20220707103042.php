<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220707103042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE producer (id INT AUTO_INCREMENT NOT NULL, circuit_id INT NOT NULL, image VARCHAR(50) NOT NULL, name VARCHAR(100) NOT NULL, product LONGTEXT NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_976449DCCF2182C8 (circuit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE producer ADD CONSTRAINT FK_976449DCCF2182C8 FOREIGN KEY (circuit_id) REFERENCES circuit (id)');
        $this->addSql('ALTER TABLE circuit ADD relation LONGTEXT NOT NULL, ADD relationship LONGTEXT NOT NULL, ADD duration LONGTEXT NOT NULL, ADD price VARCHAR(50) NOT NULL, ADD full_content LONGTEXT NOT NULL, ADD producer_id INT NOT NULL, ADD day_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE producer');
        $this->addSql('ALTER TABLE circuit DROP relation, DROP relationship, DROP duration, DROP price, DROP full_content, DROP producer_id, DROP day_id');
    }
}

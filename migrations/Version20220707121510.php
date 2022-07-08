<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220707121510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE discover (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(50) NOT NULL, content VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discover_circuit (discover_id INT NOT NULL, circuit_id INT NOT NULL, INDEX IDX_B7357ACB98537D7C (discover_id), INDEX IDX_B7357ACBCF2182C8 (circuit_id), PRIMARY KEY(discover_id, circuit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE discover_circuit ADD CONSTRAINT FK_B7357ACB98537D7C FOREIGN KEY (discover_id) REFERENCES discover (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE discover_circuit ADD CONSTRAINT FK_B7357ACBCF2182C8 FOREIGN KEY (circuit_id) REFERENCES circuit (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE discover_circuit DROP FOREIGN KEY FK_B7357ACB98537D7C');
        $this->addSql('DROP TABLE discover');
        $this->addSql('DROP TABLE discover_circuit');
    }
}

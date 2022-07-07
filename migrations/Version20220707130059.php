<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220707130059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE program DROP FOREIGN KEY FK_92ED7784BC21E890');
        $this->addSql('DROP INDEX IDX_92ED7784BC21E890 ON program');
        $this->addSql('ALTER TABLE program DROP circuit_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE program ADD circuit_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE program ADD CONSTRAINT FK_92ED7784BC21E890 FOREIGN KEY (circuit_id_id) REFERENCES circuit (id)');
        $this->addSql('CREATE INDEX IDX_92ED7784BC21E890 ON program (circuit_id_id)');
    }
}

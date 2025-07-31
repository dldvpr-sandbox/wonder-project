<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250731153040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE reset_password_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE reset_password (id INT NOT NULL, user_recover_id INT NOT NULL, expired_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, token VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B9983CE557A0C654 ON reset_password (user_recover_id)');
        $this->addSql('COMMENT ON COLUMN reset_password.expired_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE reset_password ADD CONSTRAINT FK_B9983CE557A0C654 FOREIGN KEY (user_recover_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE reset_password_id_seq CASCADE');
        $this->addSql('ALTER TABLE reset_password DROP CONSTRAINT FK_B9983CE557A0C654');
        $this->addSql('DROP TABLE reset_password');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190708015507 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE tb_opportunity_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tb_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tb_person_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tb_opportunity (id INT NOT NULL, category VARCHAR(255) DEFAULT NULL, company VARCHAR(255) DEFAULT NULL, deadline INT DEFAULT NULL, price NUMERIC(10, 2) DEFAULT NULL, biuder INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tb_user (id INT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D6E3D458E7927C74 ON tb_user (email)');
        $this->addSql('CREATE TABLE tb_person (id INT NOT NULL, user_id INT DEFAULT NULL, phone VARCHAR(11) NOT NULL, name VARCHAR(100) NOT NULL, photo VARCHAR(200) NOT NULL, skills JSON NOT NULL, cpf VARCHAR(11) NOT NULL, bank_name VARCHAR(100) NOT NULL, agency VARCHAR(10) NOT NULL, account VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_890BC83AA76ED395 ON tb_person (user_id)');
        $this->addSql('ALTER TABLE tb_person ADD CONSTRAINT FK_890BC83AA76ED395 FOREIGN KEY (user_id) REFERENCES tb_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tb_person DROP CONSTRAINT FK_890BC83AA76ED395');
        $this->addSql('DROP SEQUENCE tb_opportunity_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tb_user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tb_person_id_seq CASCADE');
        $this->addSql('DROP TABLE tb_opportunity');
        $this->addSql('DROP TABLE tb_user');
        $this->addSql('DROP TABLE tb_person');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200116070532 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text CLOB NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE article_category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, article_id INTEGER NOT NULL, category_id INTEGER NOT NULL, created_at DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL)');
        $this->addSql('DROP TABLE test');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE test (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL)');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE category');
    }
}

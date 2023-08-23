<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230822224036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating transactions table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE transactions (id INT AUTO_INCREMENT NOT NULL, payment_method VARCHAR(16) NOT NULL, transaction_deposit TINYINT(1) NOT NULL, timestamp BIGINT NOT NULL, base_amount NUMERIC(20, 2) NOT NULL, base_currency VARCHAR(3) NOT NULL, target_amount NUMERIC(20, 2) NOT NULL, target_currency VARCHAR(3) NOT NULL, exchange_rate NUMERIC(10, 6) NOT NULL, client_ip VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE transactions');
    }
}

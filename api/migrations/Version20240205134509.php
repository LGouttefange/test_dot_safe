<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240205134509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE todo ADD due_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE todo ADD completion_progress INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE todo DROP due_date');
        $this->addSql('ALTER TABLE todo DROP completion_progress');
    }
}

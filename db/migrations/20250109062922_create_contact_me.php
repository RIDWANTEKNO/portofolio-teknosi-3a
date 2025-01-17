<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateContactMe extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('contact_me', ['id' => 'id']);
        $table->addColumn('judul', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('konten', 'text', ['null' => true])
            ->addColumn('email', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('no_hp_wa', 'string', ['limit' => 20, 'null' => true])
            ->addColumn('instagram', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('tiktok', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('twitter', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('facebook', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('linkedin', 'string', ['limit' => 100, 'null' => true])
            ->addColumn('aktif', 'smallinteger', ['limit' => 1, 'default' => 1])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}

<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateHome extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('home', ['id' => 'id']);
        $table->addColumn('judul', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('konten', 'text', ['null' => true])
            ->addColumn('tentang_saya', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}

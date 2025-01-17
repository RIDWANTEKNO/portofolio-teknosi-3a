<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMyServices extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('my_services', ['id' => 'id']);
        $table->addColumn('bx_logo', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('judul', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('konten', 'text', ['null' => true])
            ->addColumn('aktif', 'smallinteger', ['limit' => 1, 'default' => 1])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}

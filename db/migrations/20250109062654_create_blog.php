<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateBlog extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('blog', ['id' => 'id']);
        $table->addColumn('judul', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('penulis', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('konten', 'text', ['null' => true])
            ->addColumn('gambar_utama', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('aktif', 'smallinteger', ['limit' => 1, 'default' => 1])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}

<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateAboutMe extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('about_me', ['id' => 'id']);
        $table->addColumn('nama', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('foto', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('konten', 'text', ['null' => true])
            ->addColumn('aktif', 'smallinteger', ['limit' => 1, 'default' => 1])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}

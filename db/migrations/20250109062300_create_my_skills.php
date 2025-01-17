<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMySkills extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('my_skills', ['id' => 'id']);
        $table->addColumn('tipe_skill', 'enum', ['values' => ['technical', 'profesional']])
            ->addColumn('nama_skill', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('bx_logo', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('nilai', 'integer', ['limit' => 1, 'default' => 0])
            ->addColumn('aktif', 'smallinteger', ['limit' => 1, 'default' => 1])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}

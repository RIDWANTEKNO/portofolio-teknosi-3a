<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AlterHomeFieldAktif extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('home');
        $table->addColumn('aktif', 'smallinteger', ['limit' => 1, 'default' => 1])
            ->save();
    }

    public function down()
    {
        $this->table('home')
            ->RemoveColumn('aktif')
            ->save();
    }
}

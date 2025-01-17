<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AlterHomeFieldGambarLatarBelakang extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('home');
        $table->addColumn('gambar_latar_belakang', 'string', ['limit' => 255, 'null' => true])
            ->save();
    }

    public function down()
    {
        $this->table('home')
            ->RemoveColumn('gambar_latar_belakang')
            ->save();
    }
}

<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePengunjungPerHari extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('pengunjung_per_hari');
        $table->addColumn('tanggal', 'date')
            ->addColumn('total_pengunjung', 'integer')
            ->addColumn('last_updated', 'datetime')
            ->addIndex(['tanggal'], ['unique' => true])
            ->create();
    }
}

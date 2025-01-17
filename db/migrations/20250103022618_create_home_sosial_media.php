<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateHomeSosialMedia extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('home_sosial_media', ['id' => 'id']);
        $table->addColumn('bx_logo', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('link', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}

<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUser extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users', ['id' => 'id']);
        $table->addColumn('username', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('last_login', 'timestamp', ['null' => true, 'default' => null])
            ->addIndex(['username'], ['unique' => true])
            ->addIndex(['email'], ['unique' => true])
            ->create();
    }
}

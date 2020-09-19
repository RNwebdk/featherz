<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUserPendingTable extends AbstractMigration
{
    public function up(){
        $users_pending = $this->table('users_pending')
        ->addColumn('token', 'string')
        ->addColumn('user_id', 'integer')
        ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
        ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('updated_at', 'datetime', ['null' => true])
        ->save();
    }

    public function down(){
        $this->table('users_pending')->drop()->save();
    }
}

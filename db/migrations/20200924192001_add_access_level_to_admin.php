<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddAccessLevelToAdmin extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('access_level', 'integer', ['default' => '2'])
              ->save();
    }
}

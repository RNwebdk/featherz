<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddUniqueEmailToUsers extends AbstractMigration
{

    public function change(): void
    {
        $table = $this->table('users');
        $table->addIndex(['email'], ['unique' => true])
              ->save();
    }
}

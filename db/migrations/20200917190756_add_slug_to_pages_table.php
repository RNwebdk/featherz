<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddSlugToPagesTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pages');
        $table->addColumn('slug', 'string', ['default' => ''])
              ->addIndex(['slug'], ['unique' => true])
              ->save();
    }
}

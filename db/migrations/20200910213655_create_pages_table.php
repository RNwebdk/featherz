<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePagesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    // public function change(): void
    // {

    // }

    public function up(){
        $table = $this->table('pages');
        $table->addColumn('browser_title', 'string')
              ->addColumn('page_content', 'text')
              ->addColumn('create_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_at', 'datetime', ['null' => true])
              ->create();

    }

    public function down(){
        $this->table('pages')->drop()->save();
    }
}

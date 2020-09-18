<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTestimonialsTable extends AbstractMigration
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
        $table = $this->table('testimonials');
        $table->addColumn('title', 'string')
              ->addColumn('testimonial', 'text')
              ->addColumn('user_id', 'integer')
              ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => ' cascade'])
              ->addColumn('create_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_at', 'datetime', ['null' => true])
              ->create();

    }

    public function down(){
        $this->table('testimonials')->drop()->save();
    }
}

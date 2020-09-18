<?php


use Phinx\Seed\AbstractSeed;

class PageSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $this->execute("INSERT INTO pages (browser_title, page_content, slug)VALUES('About', '<h1>About</h1><p>About this company</p>', 'about-acme')");
        $this->execute("INSERT INTO pages (browser_title, page_content, slug)VALUES('Success', '<h1>Success</h1><p>Successfully registered</p>', 'success')");
    }
}

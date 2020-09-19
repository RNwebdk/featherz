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
        $this->execute("INSERT INTO pages (browser_title, page_content, slug)VALUES('About us', '<h1>About</h1><p>About this company</p>', 'about-acme')");
        $this->execute("INSERT INTO pages (browser_title, page_content, slug)VALUES('Success', '<h1>Success</h1><p>Successfully registered</p>', 'success')");
        $this->execute("INSERT INTO pages (browser_title, page_content, slug)VALUES('Not Found', '<h1>Not found</h1><p>Not found</p>', 'not-found')");
        $this->execute("INSERT INTO pages (browser_title, page_content, slug)VALUES('Page Not Found', '<h1>Page Not Found</h1><p>Not found</p>', 'page-not-found')");
        $this->execute("INSERT INTO pages (browser_title, page_content, slug)VALUES('Account Activated', '<h1>Account Activated</h1><p>Account now active. You can now login!</p>', 'account-activated')");
    }
}

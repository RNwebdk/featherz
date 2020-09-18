<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
        $password_hash = password_hash('verysecret', PASSWORD_DEFAULT);


        $this->execute("INSERT INTO users (first_name, last_name, email, password)
            VALUES('John', 'Doe', 'me@here.ca', '$password_hash')
        ");
    }
}

<?php


use Phinx\Seed\AbstractSeed;

class TestimonialSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    

     public function getDependencies()
    {
        return [
            'UserSeeder'
        ];
    }

    public function run()
    {
        $this->execute("INSERT into testimonials (title, testimonial, user_id) VALUES('This is awesome', 'What is so nice and awesome concept, I DIG IT !', 1) 
            ");
    }
}

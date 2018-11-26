<?php

use Illuminate\Database\Seeder;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Category::create(['name' => 'Web Development']);
        Category::create(['name' => 'Web Design']);
        Category::create(['name' => 'Technologies']);
        Category::create(['name' => 'Travel']);
    }
}

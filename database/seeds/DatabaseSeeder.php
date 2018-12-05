<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;

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
        // default administrator user, password - admin
        User::create([
            'name' => 'Admin', 
            'nickname' => 'Admin', 
            'email' => 'admin@ex.com',
            'administrator' => true, 
            'password' => '$2y$10$sIIDD4jNaI8qfTlS.KocPe2/c5j6KeUDVjMigdhgBIKCAIdheeVlS'
        ]);
    }
}

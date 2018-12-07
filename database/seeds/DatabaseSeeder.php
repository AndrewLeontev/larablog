<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\User;
use App\Role;
use App\Permission;

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
        // User::create([
        //     'name' => 'Admin', 
        //     'nickname' => 'Admin', 
        //     'email' => 'admin@ex.com',
        //     'administrator' => true, 
        //     'password' => '$2y$10$sIIDD4jNaI8qfTlS.KocPe2/c5j6KeUDVjMigdhgBIKCAIdheeVlS'
        // ]);
        $dev_role = Role::where('slug','admin')->first();
        $manager_role = Role::where('slug', 'registered')->first();

        $createTasks = new Permission();
        $createTasks->slug = 'create-posts';
        $createTasks->name = 'Create Posts';
        $createTasks->save();
        $createTasks->roles()->attach($dev_role);

        $editUsers = new Permission();
        $editUsers->slug = 'edit-users';
        $editUsers->name = 'Edit Users';
        $editUsers->save();
        $editUsers->roles()->attach($manager_role);


        $dev_permission = Permission::where('slug','create-posts')->first();
        $manager_permission = Permission::where('slug', 'edit-posts')->first();

        //RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->slug = 'admin';
        $dev_role->name = 'Administrator';
        $dev_role->save();
        $dev_role->permissions()->attach($dev_permission);

        $manager_role = new Role();
        $manager_role->slug = 'registered';
        $manager_role->name = 'Registered User';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission);


        $dev_role = Role::where('slug','admin')->first();
        $manager_role = Role::where('slug', 'registered')->first();
        $dev_perm = Permission::where('slug','create-posts')->first();
        $manager_perm = Permission::where('slug','edit-posts')->first();

        $developer = new User();
        $developer->name = 'Andrew Leontev';
        $developer->email = 'admin@ex.com';
        $developer->nickname = 'Admin';
        $developer->password = bcrypt('secret');
        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->permissions()->attach($dev_perm);


        $manager = new User();
        $manager->name = 'Andrew Test';
        $manager->email = 'user@ex.com';
        $manager->nickname = 'registered';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);
    }
}

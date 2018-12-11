<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dev_permission = Permission::where('slug','create-tasks')->first();
        $user_permission = Permission::where('slug', 'edit-users')->first();

        //RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->slug = 'admin';
        $dev_role->name = 'Administrator user';
        $dev_role->save();
        $dev_role->permissions()->attach($dev_permission);

        $manager_role = new Role();
        $manager_role->slug = 'registered';
        $manager_role->name = 'Registered user';
        $manager_role->save();
        $manager_role->permissions()->attach($user_permission);
    }
}

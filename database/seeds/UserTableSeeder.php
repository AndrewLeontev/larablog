<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //UserTableSeeder.php
        $dev_role = Role::where('slug','admin')->first();
        $user_role = Role::where('slug', 'registered')->first();
        $dev_perm = Permission::where('slug','create-tasks')->first();
        $user_perm = Permission::where('slug','edit-users')->first();

        $developer = new User();
        $developer->name = 'Admin';
        $developer->nickname = 'Admin';
        $developer->email = 'admin@ex.com';
        $developer->password = bcrypt('secret');
        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->roles()->attach($user_role);
        $developer->permissions()->attach($dev_perm);

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->name = 'User';
            $user->nickname = 'User' . $i;
            $user->email = 'user' . $i . '@ex.com';
            $user->password = bcrypt('secret');
            $user->save();
            $user->roles()->attach($user_role);
            $user->permissions()->attach($user_perm);
        }
    }
}

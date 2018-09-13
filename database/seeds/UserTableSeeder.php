<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role=Role::where('name','administrator')->first();
        $authuser_role=Role::where('name','authenticated')->first();

        $admin_user=new User();
        $admin_user->name='admin';
        $admin_user->email='admin@example.com';
        $admin_user->password=bcrypt('admin');
        $admin_user->save();
        $admin_user->roles()->attach($admin_role);

        $authenticated_user=new User();
        $authenticated_user->name='user1';
        $authenticated_user->email='user1@example.com';
        $authenticated_user->password=bcrypt('user1');
        $authenticated_user->save();
        $authenticated_user->roles()->attach($authuser_role);
    }
}

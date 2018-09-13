<?php

use Illuminate\Database\Seeder;
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
        $administrator_role=new Role();
        $administrator_role->name="administrator";
        $administrator_role->description="administrator";
        $administrator_role->save();

        $autenticated_role=new Role();
        $autenticated_role->name="authenticated";
        $autenticated_role->description="authenticated";
        $autenticated_role->save();
    }
}

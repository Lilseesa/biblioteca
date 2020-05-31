<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->descripcion = 'Admin Role';
        $role->save();

        $role = new Role();
        $role->name = 'moderador';
        $role->descripcion = 'Moderador Role';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->descripcion = 'User Role';
        $role->save();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();

      $role_user = Role::where('name', 'user')->first();
      $role_admin = Role::where('name', 'admin')->first();
      $role_notas = Role::where('name', 'notas')->first();

      $user = new User();
      $user->name = 'User';
      $user->apellido = 'User1';
      $user->direccion = 'User2';
      $user->nacimiento = '2021-02-06';
      $user->email = 'usuario@jfpl.com';
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);

      $admin = new User();
      $admin->name = 'Manager Name';
      $admin->apellido = 'Manager1';
      $admin->direccion = 'Manager2';
      $admin->nacimiento = '2021-02-04';
      $admin->email = 'admin@jfpl.com';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);
      $admin->roles()->attach($role_notas);

      $admin = new User();
      $admin->name = 'Inactivo';
      $admin->apellido = 'Manager1';
      $admin->direccion = 'Manager2';
      $admin->nacimiento = '2021-02-04';
      $admin->email = 'inactivo@jfpl.com';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_user);
      $admin->roles()->attach($role_notas);
      $admin->delete();
    }
}

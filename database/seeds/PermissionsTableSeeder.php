<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Smapac\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    // create permissions
    Permission::create(['name' => 'create_users']);
    Permission::create(['name' => 'read_users']);
    Permission::create(['name' => 'update_users']);
    Permission::create(['name' => 'delete_users']);
    // create permissions
    Permission::create(['name' => 'create_roles']);
    Permission::create(['name' => 'read_roles']);
    Permission::create(['name' => 'update_roles']);
    Permission::create(['name' => 'delete_roles']);
    // create permissions
    Permission::create(['name' => 'create_permisos']);
    Permission::create(['name' => 'read_permisos']);
    Permission::create(['name' => 'update_permisos']);
    Permission::create(['name' => 'delete_permisos']);

    // create roles and assign existing permissions
    $titular = Role::create(['name' => 'titular']);
    $invitado = Role::create(['name' => 'invitado']);
    $admin = Role::create(['name' => 'admin']);

    $administrador = Role::create(['name' => 'super-admin']);
    $administrador->givePermissionTo(Permission::all());
    // gets all permissions via Gate::before rule; see AuthServiceProvider

    // create demo users
    $user_berna = User::create([
        'NoEmpleado' => 'SMA000',
        'name' => 'Bernabe Cantun Dominguez',
        'no_seg_soc' => 'N/A',
        'categoria' => 'N/A',
        'nivel' => 'N/A',
        'rfc' => 'N/A',
        'curp' => 'N/A',
        'fe_nacimiento' => 'N/A',
        'fe_ingreso' => 'N/A',
        'email' => 'berna@gmail.com',
        'password' => bcrypt('CantunDominguez97.-'),
        'status' => '2'
    ]);
  /*  $user_veronica = UserSeeder::create([
        'NoEmpleado' => 'SMA001',
        'name' => 'Veronica',
        'no_seg_soc' => 'N/A',
        'categoria' => 'N/A',
        'coordinacion' => 'N/A',
        'depto' => 'N/A',
        'nivel' => 'N/A',
        'rfc' => 'N/A',
        'curp' => 'N/A',
        'fe_nacimiento' => 'N/A',
        'fe_ingreso' => 'N/A',
        'email' => 'veronica@gmail.com',
        'password' => bcrypt('1234')
    ]);
    $user_victor = UserSeeder::create([
        'NoEmpleado' => 'SMA002',
        'name' => 'Victor',
        'no_seg_soc' => 'N/A',
        'categoria' => 'N/A',
        'coordinacion' => 'N/A',
        'depto' => 'N/A',
        'nivel' => 'N/A',
        'rfc' => 'N/A',
        'curp' => 'N/A',
        'fe_nacimiento' => 'N/A',
        'fe_ingreso' => 'N/A',
        'email' => 'victor@gmail.com',
        'password' => bcrypt('1234')
    ]); */

    $user_berna->assignRole($administrador);
   // $user_victor->assignRole($titular);

    }
}

<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use HAE\User;

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

    $superadmin = Role::create(['name' => 'Super-Admin']);
    $administrador = Role::create(['name' => 'Administrado']);
    $administrador->givePermissionTo(Permission::all());
    // gets all permissions via Gate::before rule; see AuthServiceProvider

    // create demo users
    $user_berna = User::create([
        'NoEmpleado' => 'HAE000',
        'name' => 'Bernabe Cantun Dominguez',
        'email' => 'cantunberna@gmail.com',
        'password' => bcrypt('Cantun97.-'),
        'status' => '2'
    ]);
    $user_berna = User::create([
        'NoEmpleado' => 'HAE001',
        'name' => 'Victor Jose Cantun Dominguez',
        'email' => 'cantundominguez@gmail.com',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);
    $user = User::create([
        'NoEmpleado' => 'HAE100',
        'grado' => 'Lic.',
        'name' => 'Víctor Manuel Pérez Ascencio',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);
    $user = User::create([
        'NoEmpleado' => 'HAE101',
        'grado' => 'Lic.',
        'name' => 'Damaris Naal Espinoza',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);
    $user = User::create([
        'NoEmpleado' => 'HAE102',
        'grado' => 'Lic.',
        'name' => 'Manuel de Jesús Escobar Suárez',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);
    $user = User::create([
        'NoEmpleado' => 'HAE103',
        'grado' => 'Lic.',
        'name' => ' Manuel Jesús Escobar Piña',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);
    $user = User::create([
        'NoEmpleado' => 'HAE104',
        'grado' => 'Br.',
        'name' => 'Sergio Enrique Luna Gómez',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);
    $user = User::create([
        'NoEmpleado' => 'HAE105',
        'grado' => 'Ing.',
        'name' => 'Carlos Mario Segovia Torres',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);
    $user = User::create([
        'NoEmpleado' => 'HAE106',
        'grado' => 'Lic.',
        'name' => ' María Guadalupe González Rodríguez',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);
    $user = User::create([
        'NoEmpleado' => 'HAE105',
        'grado' => 'Ing.',
        'name' => 'Carlos Mario Segovia Torres',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);
    $user = User::create([
        'NoEmpleado' => 'HAE106',
        'grado' => 'Lic.',
        'name' => ' María Guadalupe González Rodríguez',
        'password' => bcrypt('StigmaCode2022'),
        'status' => '2'
    ]);

    $user_berna->assignRole($superadmin);
    }
}

<?php

use Illuminate\Database\Seeder;
use Smapac\Department;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PERMISOS
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'create_departamentos']);
        Permission::create(['name' => 'read_departamentos']);
        Permission::create(['name' => 'update_departamentos']);
        Permission::create(['name' => 'delete_departamentos']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo(['create_departamentos',
                        'read_departamentos',
                        'update_departamentos',
                        'delete_departamentos']);
    }
}

<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class StorehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'create_almacen']);
        Permission::create(['name' => 'read_almacen']);
        Permission::create(['name' => 'update_almacen']);
        Permission::create(['name' => 'delete_almacen']);

        $super_admin = Role::findByName('super-admin');
        $super_admin->givePermissionTo(['create_almacen',
                        'read_almacen',
                        'update_almacen',
                        'delete_almacen']);
    }
}

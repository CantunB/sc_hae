<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'create_compras']);
        Permission::create(['name' => 'read_compras']);
        Permission::create(['name' => 'update_compras']);
        Permission::create(['name' => 'delete_compras']);

        $super_admin = Role::findByName('super-admin');
        $super_admin->givePermissionTo(['create_compras',
                        'read_compras',
                        'update_compras',
                        'delete_compras']);
    }
}

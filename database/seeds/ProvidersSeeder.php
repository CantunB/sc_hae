<?php

use HAE\Providers;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class ProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'create_proveedores']);
        Permission::create(['name' => 'read_proveedores']);
        Permission::create(['name' => 'update_proveedores']);
        Permission::create(['name' => 'delete_proveedores']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo(['create_proveedores',
                        'read_proveedores',
                        'update_proveedores',
                        'delete_proveedores']);

        $providers = factory(Providers::class,25)->create();

    }
}

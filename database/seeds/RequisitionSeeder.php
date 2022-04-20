<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RequisitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'create_requisicion']);
        Permission::create(['name' => 'read_requisicion']);
        Permission::create(['name' => 'update_requisicion']);
        Permission::create(['name' => 'delete_requisicion']);

        $super_admin = Role::findByName('super-admin');
        $super_admin->givePermissionTo(['create_requisicion',
                        'read_requisicion',
                        'update_requisicion',
                        'delete_requisicion']);

        $titular = Role::findByName('titular');
        $titular->givePermissionTo(['create_requisicion',
                        'read_requisicion']);
    }
}

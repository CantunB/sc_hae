<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class QuotesrequisitionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'create_quotes']);
        Permission::create(['name' => 'read_quotes']);
        Permission::create(['name' => 'update_quotes']);
        Permission::create(['name' => 'delete_quotes']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo(['create_quotes',
                        'read_quotes',
                        'update_quotes',
                        'delete_quotes']);
    }
}

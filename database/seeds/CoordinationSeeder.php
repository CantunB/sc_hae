<?php

use HAE\Coordination as HAECoordination;
use HAE\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;
use HAE\UserCoordination;

class CoordinationSeeder extends Seeder
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
        Permission::create(['name' => 'create_coordinaciones']);
        Permission::create(['name' => 'read_coordinaciones']);
        Permission::create(['name' => 'update_coordinaciones']);
        Permission::create(['name' => 'delete_coordinaciones']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo(['create_coordinaciones',
                        'read_coordinaciones',
                        'update_coordinaciones',
                        'delete_coordinaciones']);

        $coordinations = factory( HAECoordination::class, 15 )->create();
    }
}

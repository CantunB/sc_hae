<?php

use Illuminate\Database\Seeder;
use Smapac\Coordination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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

        $super_admin = Role::findByName('super-admin');
        $super_admin->givePermissionTo(['create_coordinaciones',
                        'read_coordinaciones',
                        'update_coordinaciones',
                        'delete_coordinaciones']);


        //DATA
        $oic = Coordination::create([
            'id' => '1',
            'name' => 'Organo Interno de Control',
            'slug' => 'OIC'
        ]);
       $caf = Coordination::create([
            'id' => '2',
            'name' => 'Coordinación de Administración y Finanzas',
            'slug' => 'CAF'
        ]);
       $co = Coordination::create([
            'id' => '3',
            'name' => 'Coordinación Operativa',
            'slug' => 'CO'
        ]);
        $ci = Coordination::create([
            'id' => '4',
            'name' => 'Contraloría Interna',
            'slug' => 'CI'
        ]);
        $di = Coordination::create([
            'id' => '5',
            'name' => 'Direccion',
            'slug' => 'DG'
        ]);

        $ad = Coordination::create([
            'id' => '6',
            'name' => 'Administrador',
            'slug' => 'Administrador'
        ]);
    }
}

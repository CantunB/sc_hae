<?php

namespace Database\Seeders;

use HAE\Dependency;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DependencySeeder extends Seeder
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
        Permission::create(['name' => 'create_dependency']);
        Permission::create(['name' => 'read_dependency']);
        Permission::create(['name' => 'update_dependency']);
        Permission::create(['name' => 'delete_dependency']);

        $super_admin = Role::findByName('Super-Admin');
        $super_admin->givePermissionTo(['create_dependency',
                        'read_dependency',
                        'update_dependency',
                        'delete_dependency']);

        $smdif = Dependency::create([
            'name' => 'Desarrollo Integral de la Familia',
            'slug' => 'SMDIF',
            'colony_dependency' => 'Centro',
            'address_dependency' => 'C. 29 S/N, Andador Miguel Hidalgo',
            'telephone_dependency' => '(982)824-3485',
            'status' => 1,
        ]);

        $profeco = Dependency::create([
            'name' => 'Procuraduría Federal del Consumidor',
            'slug' => 'PROFECO',
            'colony_dependency' => 'U.E. y T. No. 2',
            'address_dependency' => 'Calle 69 S/N Entre 28 y Av. Solidaridad',
            'telephone_dependency' => '(982)824-3152',
            'status' => 1,
        ]);
        $injucam = Dependency::create([
            'name' => 'Instituto de la Juventud',
            'slug' => 'INJUCAM',
            'colony_dependency' => 'U.E. y T. No. 2',
            'address_dependency' => 'Av. Solidaridad S/N',
            'telephone_dependency' => '(982)105-9793',
            'status' => 1,
        ]);
        $smapae = Dependency::create([
            'name' => 'Agua Potable y Alcantarillado',
            'slug' => 'SMAPAE',
            'colony_dependency' => 'Morelos',
            'address_dependency' => 'Av. H. Pérez Martínez Entre 31A y 31B',
            'status' => 1,
        ]);
        $seprocicam = Dependency::create([
            'name' => 'Dirección de Protección Civil',
            'slug' => 'SEPROCICAM',
            'colony_dependency' => 'Morelos',
            'address_dependency' => 'Calle 43 S/N Entre 22 y 24',
            'status' => 1,
        ]);
        $dop = Dependency::create([
            'name' => 'Dirección de Obras Públicas',
            'slug' => 'DOP',
            'colony_dependency' => 'U.E. y T. No. 1',
            'address_dependency' => 'Av. Solidaridad S/N Entre 67 y 69',
            'telephone_dependency' => '(982)824-1800',
            'status' => 1,
        ]);
        $imecam = Dependency::create([
            'name' => 'Instituto de la Mujer',
            'slug' => 'IMECAM',
            'colony_dependency' => 'Centro',
            'address_dependency' => 'C. 29 S/N, Andador Miguel Hidalgo',
            'telephone_dependency' => '(982)1256723',
            'status' => 1,
        ]);
        $dsp = Dependency::create([
            'name' => 'Dirección de Servicios Públicos',
            'slug' => 'DSP',
            'colony_dependency' => 'U.E. y T. No. 1',
            'address_dependency' => 'Av. Solidaridad S/N Entre 67 y 69',
            'telephone_dependency' => '(982)824-0082',
            'status' => 1,
        ]);
        $cim = Dependency::create([
            'name' => 'Órgano Interno de Control',
            'slug' => 'CIM',
            'colony_dependency' => 'Centro',
            'address_dependency' => 'Calle 29 S/N Entre 28 Y 31',
            'telephone_dependency' => '(982)824-0211',
            'status' => 1,
        ]);
    }
}

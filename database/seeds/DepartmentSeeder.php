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

        $super_admin = Role::findByName('super-admin');
        $super_admin->givePermissionTo(['create_departamentos',
                        'read_departamentos',
                        'update_departamentos',
                        'delete_departamentos']);

        Department::create([
            'id' => '1',
            'name' => 'Dirección General',
            'slug' => 'DG'
        ]);
        Department::create([
            'id' => '2',
            'name' => 'Unida de Asuntos Juridicos',
            'slug' => 'UAJ'
        ]);
        Department::create([
            'id' => '3',
            'name' => 'Unidad de Transparencia',
            'slug' => 'DG-UT'
        ]);
        Department::create([
            'id' => '4',
            'name' => 'Organo Interno de Control',
            'slug' => 'PRM'
        ]);
        Department::create([
            'id' => '5',
            'name' => 'Unidad de Auditoria y Control Interno',
            'slug' => 'UACI-JMZS'
        ]);
        Department::create([
            'id' => '6',
            'name' => 'Unidad Investigadora',
            'slug' => 'UI-MCPM'
        ]);
        Department::create([
            'id' => '7',
            'name' => 'Coordinación de Administración y Finanzas',
            'slug' => 'JCM'
        ]);
        Department::create([
            'id' => '8',
            'name' => 'Contabilidad y Finanzas',
            'slug' => 'DC'
        ]);
        Department::create([
            'id' => '9',
            'name' => 'Tecnologias de la Información',
            'slug' => 'TI'
        ]);
        Department::create([
            'id' => '10',
            'name' => 'Comercialización',
            'slug' => 'DC'
        ]);
        Department::create([
            'id' => '11',
            'name' => 'Inspección',
            'slug' => 'DC'
        ]);
        Department::create([
            'id' => '12',
            'name' => 'Facturación',
            'slug' => 'DC'
        ]);
        Department::create([
            'id' => '13',
            'name' => 'Atención a Usuarios',
            'slug' => 'DC'
        ]);
        Department::create([
            'id' => '14',
            'name' => 'Ingresos',
            'slug' => 'DC'
        ]);
        Department::create([
            'id' => '15',
            'name' => 'Sabancuy',
            'slug' => 'DC'
        ]);
        Department::create([
            'id' => '16',
            'name' => 'Unidad Coordinadora de Archivos',
            'slug' => 'UCA'
        ]);
        Department::create([
            'id' => '17',
            'name' => 'Unidad de Archivo de Concentración',
            'slug' => 'UAC'
        ]);
        Department::create([
            'id' => '18',
            'name' => 'Unidad de Recursos Materiales',
            'slug' => 'URM'
        ]);
        Department::create([
            'id' => '19',
            'name' => 'Area de Almacen',
            'slug' => 'URM'
        ]);
        Department::create([
            'id' => '20',
            'name' => 'Unidad de Parque Vehicular',
            'slug' => 'URM'
        ]);
        Department::create([
            'id' => '21',
            'name' => 'Unidad de Relaciones Publicas y Cumunicación Social',
            'slug' => 'RPCS'
            ]);
        Department::create([
            'id' => '22',
            'name' => 'Coordinación Operativa',
            'slug' => 'LAMA'
            ]);
        Department::create([
            'id' => '23',
            'name' => 'Mantenimiento',
            'slug' => 'JCCS'
            ]);
        Department::create([
            'id' => '24',
            'name' => 'Operación Sabancuy',
            'slug' => 'DO'
            ]);
        Department::create([
            'id' => '25',
            'name' => 'Distribución Hidraulica',
            'slug' => 'DH'
            ]);
        Department::create([
            'id' => '26',
            'name' => 'Trataminenot y Sanamiento',
            'slug' => 'DTSA'
            ]);
        Department::create([
            'id' => '27',
            'name' => 'Tecnico',
            'slug' => 'DT'
            ]);
        Department::create([
            'id' => '28',
            'name' => 'Unidad de Cultura del Agua',
            'slug' => 'UCA'
            ]);
        Department::create([
            'id' => '29',
            'name' => 'Agua Limpia',
            'slug' => 'AL'
            ]);
        Department::create([
            'id' => '30',
            'name' => 'Mantenimiento Electronico y Limpieza',
            'slug' => 'DM.UML'
            ]);
        Department::create([
            'id' => '31',
            'name' => 'Apoyo en Pipas',
            'slug' => 'LAMA'
            ]);
        Department::create([
            'id' => '32',
            'name' => 'Administrador',
            'slug' => 'Administrador'
        ]);

    }
}

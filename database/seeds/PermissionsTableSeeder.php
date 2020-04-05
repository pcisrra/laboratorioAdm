<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'administracion_de_biene_access',
            ],
            [
                'id'    => '18',
                'title' => 'localizacione_create',
            ],
            [
                'id'    => '19',
                'title' => 'localizacione_edit',
            ],
            [
                'id'    => '20',
                'title' => 'localizacione_show',
            ],
            [
                'id'    => '21',
                'title' => 'localizacione_delete',
            ],
            [
                'id'    => '22',
                'title' => 'localizacione_access',
            ],
            [
                'id'    => '23',
                'title' => 'materiale_create',
            ],
            [
                'id'    => '24',
                'title' => 'materiale_edit',
            ],
            [
                'id'    => '25',
                'title' => 'materiale_show',
            ],
            [
                'id'    => '26',
                'title' => 'materiale_delete',
            ],
            [
                'id'    => '27',
                'title' => 'materiale_access',
            ],
            [
                'id'    => '28',
                'title' => 'activo_create',
            ],
            [
                'id'    => '29',
                'title' => 'activo_edit',
            ],
            [
                'id'    => '30',
                'title' => 'activo_show',
            ],
            [
                'id'    => '31',
                'title' => 'activo_delete',
            ],
            [
                'id'    => '32',
                'title' => 'activo_access',
            ],
            [
                'id'    => '33',
                'title' => 'muestra_create',
            ],
            [
                'id'    => '34',
                'title' => 'muestra_edit',
            ],
            [
                'id'    => '35',
                'title' => 'muestra_show',
            ],
            [
                'id'    => '36',
                'title' => 'muestra_delete',
            ],
            [
                'id'    => '37',
                'title' => 'muestra_access',
            ],
            [
                'id'    => '38',
                'title' => 'herramientum_create',
            ],
            [
                'id'    => '39',
                'title' => 'herramientum_edit',
            ],
            [
                'id'    => '40',
                'title' => 'herramientum_show',
            ],
            [
                'id'    => '41',
                'title' => 'herramientum_delete',
            ],
            [
                'id'    => '42',
                'title' => 'herramientum_access',
            ],
            [
                'id'    => '43',
                'title' => 'solicitude_create',
            ],
            [
                'id'    => '44',
                'title' => 'solicitude_edit',
            ],
            [
                'id'    => '45',
                'title' => 'solicitude_show',
            ],
            [
                'id'    => '46',
                'title' => 'solicitude_delete',
            ],
            [
                'id'    => '47',
                'title' => 'solicitude_access',
            ],
            [
                'id'    => '48',
                'title' => 'plan_compra_create',
            ],
            [
                'id'    => '49',
                'title' => 'plan_compra_edit',
            ],
            [
                'id'    => '50',
                'title' => 'plan_compra_show',
            ],
            [
                'id'    => '51',
                'title' => 'plan_compra_delete',
            ],
            [
                'id'    => '52',
                'title' => 'plan_compra_access',
            ],
            [
                'id'    => '53',
                'title' => 'ingreso_materiale_create',
            ],
            [
                'id'    => '54',
                'title' => 'ingreso_materiale_edit',
            ],
            [
                'id'    => '55',
                'title' => 'ingreso_materiale_show',
            ],
            [
                'id'    => '56',
                'title' => 'ingreso_materiale_delete',
            ],
            [
                'id'    => '57',
                'title' => 'ingreso_materiale_access',
            ],
            [
                'id'    => '58',
                'title' => 'gestion_servicio_access',
            ],
            [
                'id'    => '59',
                'title' => 'beneficiario_create',
            ],
            [
                'id'    => '60',
                'title' => 'beneficiario_edit',
            ],
            [
                'id'    => '61',
                'title' => 'beneficiario_show',
            ],
            [
                'id'    => '62',
                'title' => 'beneficiario_delete',
            ],
            [
                'id'    => '63',
                'title' => 'beneficiario_access',
            ],
            [
                'id'    => '64',
                'title' => 'maquina_create',
            ],
            [
                'id'    => '65',
                'title' => 'maquina_edit',
            ],
            [
                'id'    => '66',
                'title' => 'maquina_show',
            ],
            [
                'id'    => '67',
                'title' => 'maquina_delete',
            ],
            [
                'id'    => '68',
                'title' => 'maquina_access',
            ],
            [
                'id'    => '69',
                'title' => 'asistencia_tecnica_create',
            ],
            [
                'id'    => '70',
                'title' => 'asistencia_tecnica_edit',
            ],
            [
                'id'    => '71',
                'title' => 'asistencia_tecnica_show',
            ],
            [
                'id'    => '72',
                'title' => 'asistencia_tecnica_delete',
            ],
            [
                'id'    => '73',
                'title' => 'asistencia_tecnica_access',
            ],
            [
                'id'    => '74',
                'title' => 'diseno_asistido_create',
            ],
            [
                'id'    => '75',
                'title' => 'diseno_asistido_edit',
            ],
            [
                'id'    => '76',
                'title' => 'diseno_asistido_show',
            ],
            [
                'id'    => '77',
                'title' => 'diseno_asistido_delete',
            ],
            [
                'id'    => '78',
                'title' => 'diseno_asistido_access',
            ],
            [
                'id'    => '79',
                'title' => 'capacitacion_create',
            ],
            [
                'id'    => '80',
                'title' => 'capacitacion_edit',
            ],
            [
                'id'    => '81',
                'title' => 'capacitacion_show',
            ],
            [
                'id'    => '82',
                'title' => 'capacitacion_delete',
            ],
            [
                'id'    => '83',
                'title' => 'capacitacion_access',
            ],
            [
                'id'    => '84',
                'title' => 'fabricacion_create',
            ],
            [
                'id'    => '85',
                'title' => 'fabricacion_edit',
            ],
            [
                'id'    => '86',
                'title' => 'fabricacion_show',
            ],
            [
                'id'    => '87',
                'title' => 'fabricacion_delete',
            ],
            [
                'id'    => '88',
                'title' => 'fabricacion_access',
            ],
        ];

        Permission::insert($permissions);
    }
}

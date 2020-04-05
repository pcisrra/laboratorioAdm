<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Excel;

class ReportsController extends Controller{
    function index(){
        $materials_data = DB::table('materiales')->get();
        return view('export_excel')->with('materials_data', $materials_data);
    }

    function generateMat(){
        $materials_data = DB::table('materiales')->get()->toArray();
        $materials_array[] = array('Código', 'Descripción', 'Fecha de último ingreso','Fecha de última salida',
        'Cantidad (en unidades)','Unidad de almacenaje', 'Costo Unitario (en Bs.)', 'Costo Total (en Bs.)');
        foreach($materials_data as $material){
            $materials_array[] = array(
                'Código' => $material->codigo,
                'Descripción' => $material->descripcion,
                'Fecha de de último ingreso' => $material->created_at,
                'Fecha de de último salida' => $material->updated_at,
                'Cantidad' => $material->cantidad,
                'Unidad de almacenaje' => $material->unidad,
                'Costo Unitario' => $material->costo_unitario,
                'Costo Total' => $material->costo_total
            );
        }
        Excel::create('Reporte de Materiales', function($excel) use ($materials_array){
            $excel->setTitle('Reporte de Materiales');
            $excel->sheet('Materiales', function($sheet) use ($materials_array){
                $sheet->fromArray($materials_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }
    
    function generateClie(){
        $clients_data = DB::table('reporte_cliente')->get();
        $clients_array[] = array('Nombre','CI','Extensión','Fecha de Nacimiento',
            'Correo Electronico','Celular','Zona de Domicilio','Municipio de Domicilio',
            'Macrodistrito de Domicilio','Ocupación','Tipo de Beneficiario','Tipo de Ingreso',
            'Nombre del Curso','Fecha de Inicio','Fecha de Finalización','Nivel de Estudios',
            'Universidad','Carrera','Nombre de Emprendimiento','Sector de Emprendimiento',
            'Macrodistrito de Emprendimiento','Celular/Telèfono de Empresa', 'Titular/Razon Social de Empresa',
            'Rango de Emprendimiento','Rubro de Emprendimiento','Descripción de Emprendimiento');
        foreach($clients_data as $client){
            $clients_array[] = array(
                'Nombre' => $client->nombre_clie,
                'CI' => $client->ci_clie,
                'Extensión' => $client->ci_extension,
                'Fecha de Nacimiento' => $client->fecha_nac_clie,
                'Correo Electronico' => $client->correo_clie,
                'Celular' => $client->celular_clie,
                'Zona de Domicilio' => $client->zona_domi_clie,
                'Municipio de Domicilio' => $client->municipio_clie,
                'Macrodistrito de Domicilio' => $client->macrodistrito_clie,
                'Ocupación' => $client->ocupacion_clie,
                'Tipo de Beneficiario' => $client->tipo_beneficiario,
                'Tipo de Ingreso' => $client->tipo_ingreso,
                'Nombre del Curso' => $client->curso_nombre,
                'Fecha de Inicio' => $client->fecha_inicio,
                'Fecha de Fin' => $client->fecha_fin,
                'Nivel de Estudios' => $client->nivel_estudio,
                'Universidad' => $client->universidad,
                'Carrera' => $client->carrera,
                'Nombre de Emprendimiento' => $client->nombre_negocio,
                'Sector de Emprendimiento' => $client->sector_negocio,
                'Macrodistrito de Emprendimiento' => $client->macrodistrito_negocio,
                'Celular/Telèfono de Empresa' => $client->celular_negocio,
                'Titular/Razon Social de Empresa' => $client->titular_empresa,
                'Rango de Emprendimiento' => $client->rango_negocio,
                'Rubro de Emprendimiento' => $client->rubro_negocio,
                'Descripción de Emprendimiento' => $client->descripcion_negocio,
            );
        }
        Excel::create('Reporte de Beneficiarios', function($excel) use ($clients_array){
            $excel->setTitle('Reporte de Beneficiarios');
            $excel->sheet('Beneficiarios', function($sheet) use ($clients_array){
                $sheet->fromArray($clients_array, null, 'A1', false, false);
                $sheet->cells('U1:AB1', function($cells){
                    $cells->setBackground('#9bcf63');
                });
                $sheet->cells('R1:T1', function($cells){
                    $cells->setBackground('#d9534f');
                });
                $sheet->cells('A1:Q1', function($cells){
                    $cells->setBackground('#6497b1');
                });
            });
        })->download('xlsx');
    }
}
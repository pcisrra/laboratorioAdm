<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class AssistanceController extends Controller{
    function createList(){
        $i = 1;
        $list_info = DB::table('listCapacitacion')->get()->toArray();
        $list_array[] = array('Num','Nombre Completo','CI',
        'Sesión 1 '.date('d/m/Y'),
        'Sesión 2 '.date('d/m/Y',strtotime('+1 day')),
        'Sesión 3 '.date('d/m/Y',strtotime('+2 day')),
        'Sesión 4 '.date('d/m/Y',strtotime('+4 day')),
        'Sesión 5 '.date('d/m/Y',strtotime('+4 day')));
        foreach($list_info as $person){
            $list_array[] = array(
                'Num' => $i,
                'Nombre Completo' => $person->nombre_asistente,
                'CI' => $person->ci_asistente
            );
            $i++;
        }
        Excel::create('Lista de Asistentes', function($excel) use ($list_array){
            $excel->setTitle('Lista de Asistentes');
            $excel->sheet('Asistentes', function($sheet) use ($list_array){
                $sheet->fromArray($list_array,null,'A1',false,false);
            });
        })->download('xlsx');
        return redirect()->route('home');
    }
}
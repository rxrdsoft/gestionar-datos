<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ivalido;
use Excel;
use DB;
class ErrorController extends Controller
{
    public function log($cont,$total,$duplicados)
    {
        $contador_invalido = Ivalido::count();
        return view('resumen.resumen',
        [
            'contador_valido' =>$cont,
            'invalido' => $contador_invalido,
            'total' => $total,
            'duplicados' => $duplicados
        ]);
    }

    public function Excel_Invalido()
    {
        return Excel::create('Tabla de email invalidos', function($excel) {

            $excel->sheet('Invalidos', function($sheet) {
                $invalido=Ivalido::all();
                $sheet->loadView('exportar.exportar-invalidos',['invalidos'=>$invalido]);

            });
        })->export('xls');


    }
}

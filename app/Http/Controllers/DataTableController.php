<?php

namespace App\Http\Controllers;

use App\ListaBlanca;
use App\ListaNegra;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class DataTableController extends Controller
{
    public function storeListaNegra(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $this->deleteListaBlanca($request->get('data'));

        foreach ($request->get('data') as $data)
        {
            $lista_negra = new ListaNegra();
            $lista_negra->email = $data['email'];
            $lista_negra->categoria_id = $request->get('categoria');
            $lista_negra->save();
        }

//        Alert::success('Datos movidos', 'Se movieron los datos satisfactoriamente');

        return "re realizo correctamente";


    }

    public function deleteListaBlanca($array = [])
    {
        foreach ($array as $arr)
        {
            $suscriptor = ListaBlanca::findOrFail($arr['id']);
            $suscriptor->delete();
        }
    }
}

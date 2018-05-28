<?php

namespace App\Http\Controllers;

use App\BlancaLista;
use App\Categoria;
use App\Ivalido;
use App\Lista;
use App\ListaBlanca;
use App\ListaNegra;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class ListaBlancaController extends Controller
{
    public function todos()
    {
        $listas = Lista::all();
        $total_lista_blanca = ListaBlanca::count();
        $categorias = Categoria::all();
        return view('lista-blanca.todos',
            [
                'listas' => $listas,
                'total' => $total_lista_blanca,
                'categorias' => $categorias
            ]);
    }

    public function todos_json()
    {
        $lista_blanca = ListaBlanca::select('id','nombre','apellido','email','sms')->get();

        return response()->json(['data'=> $lista_blanca]);
    }

    public function filtrado_json($id)
    {
        $lista_blanca = DB::table('blanca_lista as bl')
                            ->join('lista_blanca as ls','bl.lista_blanca_id','=','ls.id')
                            ->select('ls.id','ls.nombre','ls.apellido','ls.email','ls.sms')
                            ->where('bl.lista_id',$id)
                            ->get();

        return response()->json(['data'=>$lista_blanca]);
    }

    public function lista()
    {
        $listas = Lista::paginate(7);

        return view('lista-blanca.list',
            [
                'listas' => $listas
            ]);
    }


    public function createLista(Request $request)
    {
        $reglas = [
            'nombre_lista' => 'required'
        ];
        $this->validate($request,$reglas);
        //dd($request);
        if($this->validar_lista($request->input('nombre_lista')))
        {
            Alert::error('Lista existente', 'El nombre de la lista ya existe');
        }
        else{
            $lista = new Lista();
            $lista->nombre_lista = $request->input('nombre_lista');
            $lista->cantidad = 0;
            $lista->save();
            Alert::success('Lista creada', 'Se creo la lista satisfactoriamente');
        }

        return redirect()->back();
    }


    public function validar_lista($nombre)
    {
        $existe = Lista::where('nombre_lista',$nombre)->first();
        if ($existe == null)
        {
            return false;
        }
        else {
            return true;
        }
    }



    public function store(Request $request)
    {
        try{
            if($request->hasFile('import_file'))
            {
                $path = $request->file('import_file')->getRealPath();
                $data = \Excel::load($path)->get();

                $contador = 0;
                $contador_duplicados = 0;
                if($data->count())
                {
                    foreach ($data as $key => $value)
                    {

                        if($this->is_valid_email($value->email))
                        {
                            $existe_lista = ListaBlanca::where('email',$value->email)->first();
                            if($existe_lista == null)
                            {
                                $email = new ListaBlanca();
                                $email->nombre =$value->nombre;
                                $email->apellido =$value->apellido;
                                $email->email =$value->email;
                                $email->sms =$value->sms;
                                $email->fecha_cumpleanios =$value->cumpleanios;
                                $email->estado_civil =$value->estado_civil;
                                $email->genero =$value->genero;
                                $email->profesion_ocupacion =$value->profesion;
                                $email->direccion =$value->direccion;
                                $email->distrito =$value->distrito;
                                $email->provincia =$value->provincia;
                                $email->departamento =$value->departamento;
                                $email->save();

                                $blanca_lista = new BlancaLista();
                                $blanca_lista->lista_blanca_id = $email->id ;
                                $blanca_lista->lista_id = $request->input('lista_id');
                                $blanca_lista->save();
                                $contador++;

                            }
                            else {

                                $blanca_lista = new BlancaLista();
                                $blanca_lista->lista_blanca_id = $existe_lista->id;
                                $blanca_lista->lista_id = $request->input('lista_id');
                                $blanca_lista->save();
                                $contador++;
                                $contador_duplicados++;

                                }

                        }else{

                            $invalido = new Ivalido();
                            $invalido->email = $value->email;
                            $invalido->save();
                        }
                    }
                }
            }
            $this->updateCantidadLista($request->input('lista_id'),$contador);
            Alert::success('Lista cargada', 'Se subio los datos satisfactoriamente');
        }
        catch (\Exception $e)
        {
            Alert::error('Error', 'Error a cargar los datos');
        }

        return redirect()->action('ErrorController@log',
            [
                'cont'=>$contador,
                'total'=>$data->count(),
                'duplicados' =>$contador_duplicados
            ]);
    }

    public function is_valid_email($str)
    {
        $emailErr= true;
        $email = $str;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = false;
        }
        return $emailErr;
    }

    // PARA LA CARGA DE DATOS NUEVO A VALIDAR
    public function check_email($email) {
        if(preg_match('/^\w[-.\w]*@(\w[-._\w]*\.[a-zA-Z]{2,}.*)$/', $email, $matches))
        {
            if(function_exists('checkdnsrr'))
            {
                if(checkdnsrr($matches[1] . '.', 'MX')) return true;
                if(checkdnsrr($matches[1] . '.', 'A')) return true;
            }else{
                if(!empty($hostName))
                {
                    if( $recType == '' ) $recType = "MX";
                    exec("nslookup -type=$recType $hostName", $result);
                    foreach ($result as $line)
                    {
                        if(eregi("^$hostName",$line))
                        {
                            return true;
                        }
                    }
                    return false;
                }
                return false;
            }
        }
        return false;
    }


    public function updateCantidadLista($id,$contador)
    {
        $lista = Lista::findOrFail($id);
        $lista->cantidad = $contador;
        $lista->save();
    }

    public function editLista(Request $request)
    {
        $lista = Lista::findOrFail($request->input('lista_id'));
        $lista->nombre_lista = $request->input('nombre_lista');
        $lista->save();

        return redirect()->back();
    }

    public function descargarLista($id)
    {
        return Excel::create('Tabla de email', function($excel) use ($id) {

            $excel->sheet('Table de email', function($sheet) use ($id) {
                $lista=DB::table('blanca_lista as bl')
                                ->join('lista_blanca as lb','lb.id','=','bl.lista_blanca_id')
                                ->where('bl.lista_id',$id)
                                ->get();
                $sheet->loadView('exportar.exportar-lista',['listas'=>$lista]);

            });
        })->export('xls');
    }


    public function limpiarLista($id)
    {
        $suscriptores = DB::table('blanca_lista as bl')
                ->join('lista_blanca as lb','lb.id','=','bl.lista_blanca_id')
                ->where('bl.lista_id',$id)
                ->get();

        //dd($suscriptores);
        $contador = 0;
        foreach ($suscriptores as $suscriptor)
        {
            $existe = ListaNegra::where('email','=',$suscriptor->email)->first();

            if ($existe != null)
            {
                $email = ListaBlanca::findOrFail($suscriptor->lista_blanca_id);
                $email->delete();
                $contador++;
            }
        }
        $lista = Lista::findOrFail($id);
        $lista->cantidad = count($suscriptores) - $contador;
        $lista->save();
        Alert::success('Limpieza exitosa', '');
        return redirect()->back();
    }


    public function decargar_partes($id)
    {
        return Excel::create('Tabla de email', function($excel) use ($id) {

            $excel->sheet('Table de email', function($sheet) use ($id) {
                $listas = ListaBlanca::skip($id-500000)->take(500000)->get();
                $sheet->loadView('exportar.exportar-lista',['listas'=>$listas]);

            });
        })->export('xls');

    }


    public function validarMX($id)
    {
        $suscriptores = DB::table('blanca_lista as bl')
            ->select('lb.email','bl.lista_blanca_id')
            ->join('lista_blanca as lb','lb.id','=','bl.lista_blanca_id')
            ->where('bl.lista_id',$id)
            ->get();
        $contador = 0;
        foreach ($suscriptores as $suscriptor)
        {
            $existe = $this->check_email($suscriptor->email);

            if ($existe != null)
            {
                $email = ListaBlanca::findOrFail($suscriptor->lista_blanca_id);
                $email->delete();
                $contador++;
            }
        }
        $lista = Lista::findOrFail($id);
        $lista->cantidad = count($suscriptores) - $contador;
        $lista->save();
        Alert::success('Limpieza exitosa', '');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Ivalido;
use App\ListaNegra;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class ListaNegraController extends Controller
{
    public function todos()
    {
        $categorias = Categoria::all();
        $lista_negra = DB::table('lista_negra as ln')
                        ->join('categorias as c','c.id','=','ln.categoria_id')
                        ->paginate(10);
        $contador = [
            $total_indecopi = ListaNegra::where('categoria_id',1)->count(),
            $total_rebotes = ListaNegra::where('categoria_id',2)->count(),
            $total_bajas = ListaNegra::where('categoria_id',3)->count(),
            $total_quejas = ListaNegra::where('categoria_id',4)->count(),
            $total_terminologia = ListaNegra::where('categoria_id',5)->count()
        ];

        return view('lista-negra.todos',
        [
            'contador' => $contador,
            'categorias' => $categorias,
            'lista_negra' => $lista_negra
        ]);
    }

    public function lista()
    {
        $categorias = Categoria::all();


        $contador = [
            $total_indecopi = ListaNegra::where('categoria_id',1)->count(),
            $total_rebotes = ListaNegra::where('categoria_id',2)->count(),
            $total_bajas = ListaNegra::where('categoria_id',3)->count(),
            $total_quejas = ListaNegra::where('categoria_id',4)->count(),
            $total_terminologia = ListaNegra::where('categoria_id',5)->count()
        ];

        return view('lista-negra.list',
            [
                'categorias' => $categorias,
                'contador' => $contador,
            ]);
    }

    public function store(Request $request)
    {
        $reglas = [
            'import_file' => 'required',
            'categoria_id' => 'required'
        ];

        $this->validate($request,$reglas);

        //dd($request);


        try{
            if($request->hasFile('import_file'))
            {
                $path = $request->file('import_file')->getRealPath();
                $data = \Excel::load($path)->get();
                //dd($data);
                $contador = 0;
                $contador_duplicados = 0;

                if($data->count())
                {
                    foreach ($data as $key => $value) {

                        $valor = $this->is_valid_email($value->email);
                        if($valor)
                        {
                            if(!$this->existe_email($value->email))
                            {
                                $lista_negra = new ListaNegra();
                                $lista_negra->email = $value->email;
                                $lista_negra->categoria_id = $request->input('categoria_id');
                                $lista_negra->save();
                                $contador++;

                            }else{
                                $contador_duplicados++;
                            }
                        }else{

                            $invalido = new Ivalido();
                            $invalido->email = $value->email;
                            $invalido->save();
                        }

                    }
                    Alert::success('Carga Correcta', 'El archvivo subio perfectamente');
                }
                else{
                    Alert::info('Sin datos', 'El archivo no contiene datos');
                }
            }else{
                Alert::warning('Sin archivo', 'No hay archivo a subir');
            }
        }
        catch (\Exception $e)
        {
            Alert::error('Error', 'Error a cargar los datos');
            //dd('Error al cargar la dtaa');
        }


        return redirect()->action('ErrorController@log',
            [
                'cont'=>$contador,
                'total'=>$data->count(),
                'duplicados' =>$contador_duplicados
            ]);
    }

    //SOLO PARA LISTA NEGRA
    public function is_valid_email($str)
    {
        $emailErr= true;
        $email = $str;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = false;
        }
        return $emailErr;
    }

    public function existe_email($email)
    {
        $existe = ListaNegra::where('email','=',$email)->first();

        if($existe == null)
        {
            return false;
        }
        else{
            return true;
        }
    }
}

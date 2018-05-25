<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    public function update()
    {
        return view('users.modificar-datos');
    }

    public function store(Request $request)
    {
        try
        {
            $user = User::findOrFail(auth()->user()->id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if($request->input('password') != '')
            {
                $user->password = bcrypt($request->input('password'));
                $user->save();
            }
            $user->save();

            Alert::success('Datos Actualizados', 'Se realizo la actualizacion correctamente');
        }catch (\Exception $e)
        {
            Alert::error('Ocurrio un error', 'Ocurrio un error intentalo otra vez');
        }
        return redirect()->back();
    }

    public function crearUsuario()
    {
        return view('users.create');
    }

    public function create(Request $request)
    {
        $reglas = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];

        $this->validate($request,$reglas);

        try
        {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            Alert::success('Registro correcto', 'Se realizo el registro correctamente');
        }
        catch (\Exception $e)
        {
            Alert::error('Ocurrio un error', 'Ocurrio un error intentalo otra vez');
        }
        return redirect()->back();
    }
}

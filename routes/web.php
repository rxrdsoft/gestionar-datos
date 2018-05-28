<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard', function () {
        return view('home.home');
    })->name('dashboard');

    Route::get('lista-blanca/all','ListaBlancaController@todos')->name('lista-blanca.todos');
    Route::get('lista-blanca/list','ListaBlancaController@lista')->name('lista-blanca.list');
    Route::post('lista-blanca/create','ListaBlancaController@createLista')->name('lista-blanca.create.lista');
    Route::post('lista-blanca/store','ListaBlancaController@store')->name('lista-blanca.store.lista');
    Route::post('lista-blanca/edit','ListaBlancaController@editLista')->name('lista-blanca.edit.lista');
    Route::get('lista-blanca/list/desacargar/{id}','ListaBlancaController@descargarLista')->name('lista-blanca.descargar.lista');
    Route::get('lista-blanca/list/limpiar/{id}','ListaBlancaController@limpiarLista')->name('lista-blanca.limpiar.lista');
    Route::get('lista-blanca/lista/descargar-partes/{id}','ListaBlancaController@decargar_partes');
    Route::get('lista-blanca/validarmx/{id}','ListaBlancaController@validarMX')->name('lista-blanca.validarmx.lista');



    Route::get('lista-negra/all','ListaNegraController@todos')->name('lista-negra.todos');
    Route::get('lista-negra/list','ListaNegraController@lista')->name('lista-negra.list');
    Route::post('lista-negra/store','ListaNegraController@store')->name('lista-negra.store');


    Route::get('resumen/{cont}/{total}/{duplicados}','ErrorController@log');

    Route::get('decargar/invalidos','ErrorController@Excel_Invalido')->name('descargar.invalidos');
    Route::get('eliminar',function(){

        \App\Ivalido::truncate();

        return redirect('lista-blanca/all');
    })->name('eliminar.invalido');

    Route::get('update/datos','UserController@update')->name('update.datos');
    Route::get('user/create','UserController@crearUsuario')->name('crear.usuario');
    Route::post('user/create','UserController@create')->name('create.user');
    Route::post('update/datos','UserController@store')->name('store.datos');

});


Auth::routes();

Route::get('/', function (){
    return redirect('/login');
});
Route::get('/register', function (){
    return redirect('/login');
});

Route::get('lista-blanca-json','ListaBlancaController@todos_json');
Route::get('lista-blanca-json/{id}','ListaBlancaController@filtrado_json');
Route::post('mover/suscriptores','DataTableController@storeListaNegra');

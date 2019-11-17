<?php

use Illuminate\Http\Request;
//Llamar el metodo para interactuar con la base de datos
use App\Formulario;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    /** --------COMIENZA ADMIN FORMULARIO----------- */

    Route::get('admin/formulario', function () {
        //mandando de un objeto de un modelo a las vistas... para que se vean puej
        //all() es la forma normal, para ordenarlo pondremos orderBy()
        $formularios = Formulario::orderBy('created_at','desc')->get();
        return view('admin.reactivo.index', compact('formularios'));
    })->name('admin.reactivo.index');

    //Cambiar a otra pagina dentro de admin
    Route::get('admin/formulario/crear', function () {
        return view('admin.reactivo.crear');
    })->name('admin.reactivo.crear');

    /** --------CREAR un reactivo----------- */
    //request, captura los datos que recibe el formulario :0
    Route::post('admin/formulario/crear', function (Request $request) {
        //return $request->all();
        // Crea un objeto del modelo y lo manda a guardar a la bd :0
        $newFormulario = new Formulario;
        $newFormulario->tema_formulario = $request->input('tema_formulario');
        $newFormulario->reactivo = $request->input('reactivo');    
        $newFormulario->save();
        //Nos manda de donde comenzamos, puej xd y nos dara un mensaje de hecho
        return redirect()->route('admin.reactivo.index')->with('Reactivo','Un reactivo ha sido Creado satisfactoriamente');
    })->name('admin.reactivo.alta');

    /** --------ELIMINAR un reactivo----------- */
    //request, captura los datos que recibe el formulario :0
    //solicitar id
    Route::delete('admin/formulario/eliminar/{id}', function ($id) {
        //nos devolveran el id
        //return $id;
        $formulario = Formulario::FindOrFail($id);
        $formulario->delete();
        return redirect()->route('admin.reactivo.index')->with('Reactivo','Un reactivo ha sido Eliminado satisfactoriamente');
    })->name('admin.reactivo.eliminar');

    /** --------EDITAR un reactivo----------- */
    //request, captura los datos que recibe el formulario :0
    //solicitar id
    Route::get('admin/formulario/{id}/editar', function ($id) {
        //nos devolveran el id    
        $formulario = Formulario::FindOrFail($id);
        return view('admin.reactivo.editar', compact('formulario'));
    })->name('admin.reactivo.editar');

    Route::put('admin/formulario/editar/{id}', function (Request $request, $id) {
        //nos devolveran el id    
        $formulario = Formulario::FindOrFail($id);
        $formulario->tema_formulario =$request->input('tema_formulario');
        $formulario->reactivo =$request->input('reactivo');
        $formulario->save();
        return redirect()->route('admin.reactivo.index')->with('Reactivo','Un reactivo ha sido Editado satisfactoriamente');
    })->name('admin.reactivo.actualizar');

    /** --------FIN ADMIN FORMULARIO----------- */

});

Auth::routes();


/**  
*Route::get('/home', 'HomeController@index')->name('home');

*Route::get('/usuario/alumno', 'UsuarioController@alumno');
*Route::get('/usuario/admin', 'UsuarioController@admin');
*Route::get('/usuario/admin', 'UsuarioController@admin');

*Route::get('/formulario', 'FormularioController@formulario');

*Route::get('/home', 'HomeController@index')->name('home');
*Route::get('/pruebas', 'PuebasController@pruebas')->name('pruebas');

*/
<?php

use Illuminate\Http\Request;
//Llamar el metodo para interactuar con la base de datos
use App\Formulario;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    /** --------COMIENZA ADMIN FORMULARIO----------- */

    Route::get('admin/administrar/formularios', function () {
        //mandando de un objeto de un modelo a las vistas... para que se vean puej
        //all() es la forma normal, para ordenarlo pondremos orderBy()
        $formularios = Formulario::orderBy('created_at','desc')->get();
        return view('admin.formulario.index', compact('formularios'));
    })->name('admin.formulario.index');

    //Cambiar a otra pagina dentro de admin
    Route::get('admin/crear/formulario', function () {
        return view('admin.formulario.crear');
    })->name('admin.formulario.crear');

    /** --------CREAR un reactivo----------- */
    //request, captura los datos que recibe el formulario :0
    Route::post('admin/crear/formulario', function (Request $request) {
        //return $request->all();
        // Crea un objeto del modelo y lo manda a guardar a la bd :0
        $newFormulario = new Formulario;
        $newFormulario->titulo = $request->input('titulo');
        $newFormulario->descripcion = $request->input('descripcion');    
        $newFormulario->save();
        //Nos manda de donde comenzamos, puej xd y nos dara un mensaje de hecho
        return redirect()->route('admin.formulario.index')->with('formu','Un formulario ha sido Creado satisfactoriamente');
    })->name('admin.formulario.alta');

    /** --------ELIMINAR un reactivo----------- */
    //request, captura los datos que recibe el formulario :0
    //solicitar id
    Route::delete('admin/eliminar/formulario/{id}', function ($id) {
        //nos devolveran el id
        //return $id;
        $formulario = Formulario::FindOrFail($id);
        $formulario->delete();
        return redirect()->route('admin.formulario.index')->with('Formu','Un formulario ha sido Eliminado satisfactoriamente');
    })->name('admin.formulario.eliminar');

    /** --------EDITAR un reactivo----------- */
    //request, captura los datos que recibe el formulario :0
    //solicitar id
    Route::get('admin/editar/formulario/{id}', function ($id) {
        //nos devolveran el id    
        $formulario = Formulario::FindOrFail($id);
        return view('admin.formulario.editar', compact('formulario'));
    })->name('admin.formulario.editar');

    Route::put('admin/editar/formulario/{id}', function (Request $request, $id) {
        //nos devolveran el id    
        $formulario = Formulario::FindOrFail($id);
        $formulario->titulo =$request->input('titulo');
        $formulario->descripcion =$request->input('descripcion');
        $formulario->save();
        return redirect()->route('admin.formulario.index')->with('Formu','Un formulario ha sido Editado satisfactoriamente');
    })->name('admin.formulario.actualizar');

    /** --------FIN ADMIN FORMULARIO----------- */

    /** --------COMIENZA ADMIN REACTIVOS----------- */

    Route::get('admin/administrar/reactivo', function () {
        //mandando de un objeto de un modelo a las vistas... para que se vean puej
        //all() es la forma normal, para ordenarlo pondremos orderBy()
        $reactivos = Reactivo::orderBy('created_at','desc')->get();
        return view('admin.reactivo.index', compact('reactivo'));
    })->name('admin.reactivo.index');

    //Cambiar a otra pagina dentro de admin
    Route::get('admin/crear/reactivo', function () {
        return view('admin.reactivo.crear');
    })->name('admin.reactivo.crear');

    /** --------CREAR un reactivo----------- */
    //request, captura los datos que recibe el formulario :0
    Route::post('admin/crear/reactivo', function (Request $request) {
        //return $request->all();
        // Crea un objeto del modelo y lo manda a guardar a la bd :0
        $newReactivo = new Reactivo;
        $newReactivo->titulo = $request->input('titulo');
        //$newReactivo->descripcion = $request->input('descripcion');    
        $newReactivo->save();
        //Nos manda de donde comenzamos, puej xd y nos dara un mensaje de hecho
        return redirect()->route('admin.reactivo.index')->with('reactivo','Un reactivo ha sido Creado satisfactoriamente');
    })->name('admin.reactivo.alta');

    /** --------ELIMINAR un reactivo----------- */
    //request, captura los datos que recibe el formulario :0
    //solicitar id
    Route::delete('admin/eliminar/reactivo/{id}', function ($id) {
        //nos devolveran el id
        //return $id;
        $reactivo = Reactivo::FindOrFail($id);
        $reactivo->delete();
        return redirect()->route('admin.reactivo.index')->with('reactivo','Un reactivo ha sido Eliminado satisfactoriamente');
    })->name('admin.reactivo.eliminar');

    /** --------EDITAR un reactivo----------- */
    //request, captura los datos que recibe el formulario :0
    //solicitar id
    Route::get('admin/editar/reactivo/{id}', function ($id) {
        //nos devolveran el id    
        $reactivo = Reactivo::FindOrFail($id);
        return view('admin.reactivo.editar', compact('reactivo'));
    })->name('admin.reactivo.editar');

    Route::put('admin/editar/reactivo/{id}', function (Request $request, $id) {
        //nos devolveran el id    
        $reactivo = Reactivo::FindOrFail($id);
        $reactivo->titulo =$request->input('titulo');
        //$reactivo->descripcion =$request->input('descripcion');        
        $reactivo->titulo =$request->input('titulo');
        $reactivo->save();
        return redirect()->route('admin.reactivo.index')->with('reactivo','Un reactivo ha sido Editado satisfactoriamente');
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

Route::get('tutor/prueba', function() {
    return view('tutor.prueba');
});
Route::get('tutor/accion', function() {
    return view('tutor.accion.index');
});

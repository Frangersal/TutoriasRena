<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function alumno()
    {
        return view('perfilalumno');
    }

    /* ---------------------**/

    public function tutor(){

        return view('perfiltutor');
    }

    /* ---------------------**/
    
    public function admin(){
        return view('perfiladmin');
    }

    /* ---------------------
    error de no
    no carga el compilador.
    **/
}

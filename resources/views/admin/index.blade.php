
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
-->
@extends('layouts.main')
@section('contenido')
<div class="container"> <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de reactivos
                    <a href="{{ route('admin.reactivo.crear') }}" class="btn btn-success btn-sm float-right">Nuevo reactivo</a>
                </div>
                <div class="card-body">
                
                   @if(session('Reactivo'))
                   <div class="alert alert-success">
                        {{ session('Reactivo') }}
                   </div>                   
                   @endif
                   <table class="table table-hover table-sm">
                        <thead>
                            <th>Tema</th>
                            <th>Reactivo</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                        <!-- For para colocar varias filas -->
                            @foreach($formularios as $formulario)
                            <tr>
                                <td>                                 
                                    {{ $formulario->tema_formulario }}                               
                                </td>
                                <td>                                 
                                    {{ $formulario->reactivo }}
                                </td>
                                <td> 
                                    <!-- OJO codigo para EDITAR, copialo. OwO  -->                           
                                    <a href="{{ route('admin.reactivo.editar', $formulario->id)  }}" class="btn btn-warning btn-sm">Editar</a>
                                    <!-- FIN codigo para EDITAR, de nada. UwU-->  
                                    
                                    <!-- OJO codigo para ELIMINAR, copialo. OwO  -->                           
                                    <a href="javascript: document.getElementById('delete-{{$formulario->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                    <form id="delete-{{$formulario->id}}" action="{{ route('admin.reactivo.eliminar', $formulario->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    </form>                                    
                                    <!-- FIN codigo para ELIMINAR, de nada. UwU-->   

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@include ('includes.header')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Agregar alumno
                    
                </div>
                <div class="card-body">
                
                    <!-- OJO codigo para EDITAR, copialo. OwO  --> 
                    <form action="{{ route('admin.formulario.actualizar', $formulario->id) }}" method="POST">
                    @method('put')
                    @csrf
                        <div class="fore-group">
                            <label for="">Tema</label>
                            <input type="text" name="titulo" value="{{ $formulario->titulo }}" class="form-control" >                   
                        </div>
                        <div class="fore-group">
                            <label for="">Descripcion</label>
                            <input type="text" name="descripcion" value="{{ $formulario->descripcion }}"class="form-control" >                   
                        </div><br>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('admin.formulario.index') }}" class="btn btn-danger">Cancelar</a>
                    </form>                    
                    <!-- FIN codigo para EDITAR, dena'a. UwU  --> 

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
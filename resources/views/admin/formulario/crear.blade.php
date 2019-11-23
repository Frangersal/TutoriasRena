
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
                    Crear FORMULARIO
                    
                </div>
                <div class="card-body">
                
                    <!-- OJO codigo para AGREGAR, copialo. OwO  --> 
                    <form action="{{ route('admin.formulario.alta') }}" method="POST">
                    @csrf
                        <div class="fore-group">
                            <label for="">Titulo</label>
                            <input type="text" class="form-control" name="titulo">                   
                        </div>
                        <div class="fore-group">
                            <label for="">Descripcion</label>
                            <input type="text" class="form-control" name="descripcion">                   
                        </div><br>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('admin.formulario.index') }}" class="btn btn-danger">Cancelar</a>
                    </form>                    
                    <!-- FIN codigo para AGREGAR, dena'a. UwU  --> 

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
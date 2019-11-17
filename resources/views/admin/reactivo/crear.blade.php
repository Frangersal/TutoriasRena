
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
                    Crear reactivos
                    
                </div>
                <div class="card-body">
                
                    <!-- OJO codigo para AGREGAR, copialo. OwO  --> 
                    <form action="{{ route('admin.reactivo.alta') }}" method="POST">
                    @csrf
                        <div class="fore-group">
                            <label for="">Tema</label>
                            <input type="text" class="form-control" name="tema_formulario">                   
                        </div>
                        <div class="fore-group">
                            <label for="">Reactivo</label>
                            <input type="text" class="form-control" name="reactivo">                   
                        </div><br>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('admin.reactivo.index') }}" class="btn btn-danger">Cancelar</a>
                    </form>                    
                    <!-- FIN codigo para AGREGAR, dena'a. UwU  --> 

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
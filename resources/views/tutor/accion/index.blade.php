
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
<div class="container"> <br><br><br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    PERFIL TUTOR
                    <a href="{{ route('admin.formulario.crear') }}" class="btn btn-success btn-sm float-right">Nuevo reactivo</a>
                </div>
                <div class="card-body">
                
                   @if(session('Formu'))
                   <div class="alert alert-success">
                        {{ session('Formu') }}
                   </div>                   
                   @endif
                   <table class="table table-hover table-sm">
                        <thead>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                        <!-- For para colocar varias filas -->
                            
                        </tbody>
                   </table>
                </div>
                <div class="card-footer">
                    Bienvenido 
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
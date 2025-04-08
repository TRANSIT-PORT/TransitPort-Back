<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Operador/notificaciones.css') }}">
</head>

<body>

    <div class="d-flex flex-column vh-100 col-9 col-xl-9 col-lg-9 col-md-9" id="cuerpo">

        <div class="d-flex flex-row" id="titulo">
            <h2>Notificaciones</h2>
          </div>

          <div class="d-flex flex-column align-items-center" id="body-notificaciones">

            <ul>

                @foreach($task as $t)

                    @if($t->visto == '0')

                        @if($t->tipo == 'carga')

                        <li class="carga">{{$t->user->name}} te ha asignado una nueva orden de {{$t->tipo}}</li>
                        @endif

                        @if($t->tipo == 'descarga')

                        <li class="descarga">{{$t->user->name}} te ha asignado una nueva orden de {{$t->tipo}}</li>
                        @endif

                    @endif

                @endforeach

            </ul>

          </div>


    </div>

</body>

</html>



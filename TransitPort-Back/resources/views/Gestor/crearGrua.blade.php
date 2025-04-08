<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Crear orden</title>
            <!-- <link rel="stylesheet" href="{{ asset('css/crearGrua.css') }}"> -->
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="{{ asset('css/Gestor/crearGrua.css') }}">


        </head>

        <body>

            <h1 id="titulo">Crear Grúa</h1>

                <form method="POST" action="{{route('guardarGrua')}}">
                @csrf

                    <div class="div1">

                        <h2 class="num">1</h2>
                        <h2>Datos</h2>

                        <label for="">Nombre</label>
                        <input name="nombre" id="nombre" type="text">

                        <label for="">Marca</label>
                        <input name="marca" id="marca" type="text">

                        <label for="">Modelo</label>
                        <input name="modelo" id="modelo" type="text">

                        <label for="">Capacidad de carga (tn)</label>
                        <input name="capacidad_carga" id="capacidad_carga" type="number" required>

                    </div>

                    <div class="div3">

                    <h2 class="num">2</h2>
                    <h2>Tipo</h2>

                        <label for="tipo">Selecciona</label>
                        <select id="tipo" name="tipo">

                            <option value=""></option>
                            <option value="SC">SC</option>
                            <option value="STS">STS</option>

                        </select>

                    </div>

                    <button class="crear btn btn-primary" type="submit">Crear grúa</button>

                </form>

            </div>

            <form action="" method="get">
                <button href="{{ url()->previous() }}" class="cancelar btn btn-warning" id="cancelar">Cancelar</button>
            </form>
        </body>
    </html>
</x-app-layout>

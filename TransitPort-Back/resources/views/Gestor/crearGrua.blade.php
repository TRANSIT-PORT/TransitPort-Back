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

            <style>

                h1 {
                    margin-top: 1%;
                    margin-left: 8%;
                }
                h2 {
                color: var(--Cinder-950, #040813);

                font-weight: bold;
                }
                p {
                margin-top: 3%;
                margin-bottom: 2px;
                }
                label{
                margin-top: 3%;
                margin-bottom: 2px;

                }
                .num {
                color: var(--Cinder-900, #152D65);
                background-image: url("assets/elipse.svg");
                background-size: contain;
                background-position: left;
                background-repeat: no-repeat;

                width: 40px;
                display: flex;
                justify-content: center;

                display: flex;
                position: relative;
                right: 10%;
                bottom: -45px;
                }

                select {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background: url('assets/flecha.svg') no-repeat calc(100% - 3%) var(--Cinder-100, #E3E9FB) !important;

                border: none;

                font-size: 1.2rem;

                display: flex;
                width: 457px;
                height: 49px;
                padding-left: 2%;
                justify-content: flex-end;
                align-items: center;
                flex-shrink: 0;
                }

                input{

                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background: var(--Cinder-100, #E3E9FB) !important;

                border: none;

                font-size: 1.2rem;

                display: flex;
                width: 457px;
                height: 49px;
                padding-left: 2%;
                justify-content: flex-end;
                align-items: center;
                flex-shrink: 0;

                }

                #email{

                margin-bottom: 30px;

                }

                .div1 {
                position: absolute;
                left: 10%;
                top: 10%;
                }

                .div3 {
                position: absolute;
                left: 70%;
                top: 10%;
                }

                .crear {
                color: var(--Cinder-50, #F1F5FE);
                font-size: 32px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
                border-radius: 4px;
                border: 2px solid var(--Cinder-900, #152D65);
                background: var(--Cinder-900, #152D65);
                box-shadow: 3px 4px 4px 0px rgba(0, 0, 0, 0.25);
                display: flex;
                width: 498px;
                padding: 10px 0px;
                justify-content: center;
                align-items: center;
                position: absolute;
                right: 22%;
                bottom: 5%;
                }
                .cancelar {
                color: var(--Cinder-800, #133379);

                font-size: 32px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;

                border-radius: 4px;
                border: 2px solid var(--Cinder-900, #152D65);
                background: var(--Amarillo, #E59506);
                box-shadow: 3px 4px 4px 0px rgba(0, 0, 0, 0.25);

                display: inline-flex;
                width: 15%;
                padding: 10px 0px;
                justify-content: center;
                align-items: center;

                position: absolute;
                right: 5%;
                bottom: 5%;
                }

            </style>

        </head>

        <body>

            <h1 id="titulo"><img src="assets/Administrativo/crearOrdenVer.svg">  Crear Grúa</h1>

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

<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Crear usuario</title>

            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
            <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

            <style>
                h1 {
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
                .div2 {
                    position: absolute;
                    left: 10%;
                    top: 15%;
                    margin-top:140px;
                }

                .div3 {
                    position: absolute;
                    left: 65%;
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
                .anyadirBoton {

                    border-radius: 0px;
                    color: #C0D2F7;
                    text-align: center;
                    font-size: 19px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;
                    display: inline-flex;
                    padding: 10px 54px 12px 54px;
                    justify-content: center;
                    align-items: center;
                    background: var(--Cinder-950, #040813);

                }

                #valores{
                    margin-top: 10px;
                    width: 100%;
                    margin-bottom: 20px;
                }

                #valores>label  {
                    margin-bottom: 40px;
                    margin-top: 10px;
                    width: 80px;
                    text-align: center;

                }

                #valores>div>input {
                    width: 80px;

                }



            </style>
        </head>

        <body>
            <h1><img src="assets/Gestor/crearPatioVer.png">  Crear Patio</h1>
             <form {{--action="{{ route('guardarPatio') }}"--}} method="post">
                @csrf

                <div class="div1">
                    <h2 class="num">1</h2>
                    <h2>Nombre</h2>
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name">

                </div>

                <div class="div2">
                    <h2 class="num">2</h2>
                    <h2>Dimensiones</h2>
                    <label for="valorX">Valor X:</label>
                    <input type="number" name="valorX" id="valorX">
                    <label for="valorY">Valor Y:</label>
                    <input type="number" name="valorY" id="valorY">
                    <label for="valorZ">Valor Z:</label>
                    <input type="number" name="valorZ" id="valorZ">

                </div>

                <div class="div3">
                    <h2 class="num">3</h2>
                    <h2>Zonas</h2>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">

                    <div class="flex-row d-flex justify-content-between" id="valores">
                        <div class="d-flex flex-column justify-content-center">
                            <label class="d-flex justify-content-center" for="valX">Valor X:</label>
                            <input type="number" class="valX" name="valX" id="valX">
                        </div>

                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-center" for="valY">Valor Y:</label>
                            <input type="number" name="valY" id="valY">
                        </div>
                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-center" for="valZ">Valor Z:</label>
                            <input type="number" name="valZ" id="valZ">
                        </div>
                    </div>

                    <button class="anyadirBoton btn btn-primary">Añadir</button>

                    <div class="container mt-5">
                        <table id="auditoria" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>X</th>
                                    <th>Y</th>
                                    <th>Z</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <button class="crear btn btn-primary">Crear</button>
            </form>

                <a href="{{ url()->previous() }}" class="cancelar btn btn-warning">Cancelar</a>

        </body>
    </html>
    </x-app-layout>

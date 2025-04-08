<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Crear patio y zona</title>

            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
            <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
            <link rel="stylesheet" href="{{ asset('css/Gestor/crearPatio.css') }}">


        </head>

        <body>
            <h1>Crear Patio | Zona</h1>
             <form action="{{ route('guardarPatio') }}" method="post">
                @csrf

                <div class="div1">
                    <h2 class="num">1</h2>
                    <h2>Nombre</h2>
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="nombre">

                </div>

                <div class="div2">
                    <h2 class="num">2</h2>
                    <h2>Dimensiones</h2>
                    <label for="valorX">Valor X:</label>
                    <input type="number" name="x" id="valorX">
                    <label for="valorY">Valor Y:</label>
                    <input type="number" name="y" id="valorY">
                    <label for="valorZ">Valor Z:</label>
                    <input type="number" name="z" id="valorZ" value="0" min="0" max="2">
                </div>

                {{-- es un input invisible que recoge el id del gestor, para asignarlo al patio --}}
                <input type="hidden" name="id_gestor" value="{{ Auth::user()->id }}">

                <button type="submit" class="anyadirPatio btn">Añadir</button>

            </form>

            <form action="{{ route('guardarZona') }}" method="post">
            @csrf
                <div class="div3">
                    <h2 class="num">3</h2>
                    <h2>Zonas</h2>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">

                    <div class="flex-row d-flex justify-content-between" id="valores">
                        <div class="d-flex flex-column justify-content-center">
                            <label class="d-flex justify-content-center" for="valX">Valor X:</label>
                            <input type="number" class="valX" name="X" id="valX">
                        </div>

                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-center" for="valY">Valor Y:</label>
                            <input type="number" name="Y" id="valY">
                        </div>

                        <div class="d-flex flex-column">
                            <label class="d-flex justify-content-center" id="labelZ" for="valZ">Valor Z:</label>
                            <input type="number" name="Z" id="valZ" value="1" min="1" max="1">
                        </div>
                </div>

                <input type="hidden" name="id_gestor" value="{{ Auth::user()->id }}">
                <input type="hidden" name="id_patio" value="{{ session('id_patio') }}">
                {{-- se pasa el ultimo id de patio creado en la sesion actual --}}

                    <button type="submit" class="anyadirBoton btn ">Añadir</button>
                </form>

                <div id="tabla">
                <table id="zona" class="table table-bordered">
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

                <a class="crear btn btn-primary">Aceptar</a>

                <a href="{{ url()->previous() }}" class="cancelar btn btn-warning">Cancelar</a>

        </body>
        <script type="text/javascript">
           $(document).ready(function () {
                let table = $('#zona').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route("verZona") }}',
                    columns: [
                        { data: 'nombre', name: 'nombre' },
                        { data: 'X', name: 'X' },
                        { data: 'Y', name: 'Y' },
                        { data: 'Z', name: 'Z' }
                    ],
                   "info": false,
                   "paging": false,
                   "searching": true,
                   "responsive": true,
                   "ordering": false,
                   "scrollY": "200px",

                });
            });
        </script>
    </html>
    </x-app-layout>

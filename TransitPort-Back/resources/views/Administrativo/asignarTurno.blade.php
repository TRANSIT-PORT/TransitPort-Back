<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Asignar turnos</title>

            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="{{ asset('css/Administrativo/asignarTurno.css') }}">

        </head>

        <body>
            <h1 class="titulo"> Asignar Turno</h1>
            <form action="{{ route('actualizarTurno') }}" method="post">
                @csrf

                <div class="div1">
                    <h2 class="num">1</h2>
                    <h2>Operador</h2>
                    <p>Seleccione al operador</p>
                    <select name="id_operador">
                        @forelse ($operadores as $operador)
                            <option value="{{$operador -> id}}">{{$operador -> nombre}}</option>
                        @empty
                            <p>No hay operadores actualmente</p>
                        @endforelse
                    </select>
                </div>
                

                <div class="div2">
                    <h2 class="num">2</h2>
                    <h2>Turno</h2>
                    <p>Seleccione el turno</p>
                    <select name="id_turno" id="id_turno">
                        <option value=""></option>
                        @forelse ($turnos as $turno)
                            <option value="{{$turno -> id}}">{{$turno -> fecha_inicio}}</option>
                        @empty
                            <p>No hay zonas actualmente</p>
                        @endforelse
                    </select>
                </div>

                <div class="div4" name="div4" style="display: none">
                    <h2 class="num"></h2>

                    <div class="turno_seleccionado">
                        <h5>Operadores del turno seleccionado</h5>
                        <select class="filtro" name="tipo_grua" id="tipo_grua">

                            <option value="">Filtrar</option>
                            <option value="STS">STS</option>
                            <option value="SC">SC</option>

                        </select>
                    </div>
                    <table id="operadoresTurno" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre del operador</th>
                                <th>Tipo de grua</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <button class="crear btn">Asignar</button>
            </form>
            <form action="" method="get">
                <button class="cancelar btn">Cancelar</button>
            </form>
        </body>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>

if (localStorage.getItem("modoOscuro") === "true") {
    document.body.classList.add("dark-mode");
}

</script>

        <script type="text/javascript">
    $(document).ready(function () {
        function cargarOperadores() {
            
            let turnoId = $('#id_turno').val();
            let tipoGrua = $('#tipo_grua').val();
            let url = '/recogerOperadoresTurno/' + turnoId + '?tipo_grua=' + tipoGrua;

            console.log(url);
            if (turnoId) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        let tbody = $('#operadoresTurno tbody');
                        tbody.empty(); // Limpiar la tabla antes de actualizar

                        if (data.length > 0) {
                            data.forEach(operador => {
                                tbody.append(`
                                    <tr>
                                        <td>${operador.nombre}</td>
                                        <td>${operador.tipo}</td>
                                    </tr>
                                `);
                            });
                        } else {
                            tbody.append('<tr><td colspan="2">No hay operadores en este turno con este tipo de grúa</td></tr>');
                        }
                    },
                    error: function () {
                        alert('Error al cargar los operadores del turno.');
                    }
                });
            } else {
                $('#operadoresTurno tbody').empty();
            }
        }

        // Configurar los eventos de cambio
        $('#id_turno').on('change', function () {

            if($(this).val()){
                $('.div4').fadeIn(); 
                cargarOperadores();
            } else {
                $('.div4').fadeOut(); 
                cargarOperadores();
            }
        });

        $('#tipo_grua').on('change', function () {
            cargarOperadores();
        });

    });
</script>

    </html>
</x-app-layout>

<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Crear orden</title>

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
                .titulo {
                    width: 290px;

                    display: flex;
                    align-items: center;
                    justify-content: space-between;
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

                .input-orden{

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

                .div1 {
                    position: absolute;
                    left: 12%;
                    top: 10%;
                }
                .div2 {
                    position: absolute;
                    left: 12%;
                    top: 40%;
                }
                .div3 {
                    position: absolute;
                    left: 52%;
                    top: 10%;
                }

                .tabla-parcelas {
                    position: absolute;
                    left: 52%;
                    top: 33%;
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
                    width: 435px;
                    padding: 10px 0px;
                    justify-content: center;
                    align-items: center;

                    position: absolute;
                    right: 22%;
                    bottom: 5%;
                }
                .crear:hover {
                    color: var(--Cinder-50, #F1F5FE);

                    border: 2px solid #0B5ED7;
                    background: #0B5ED7;
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
                .cancelar:hover {
                    color: black;

                    background: #FFCA2C;
                }

                .detalles-parcela{

                    display: flex,
                    flex-direction: row,

                }

                
            </style>
        </head>

        <body>
            <h1 class="titulo"><img src="assets/Administrativo/crearOrdenVer.svg">  Crear Orden</h1>
            <form action="{{ route('guardarOrden') }}" method="post">
                @csrf

                <div class="div1">
                    <h2 class="num">1</h2>
                    <h2>Categoría</h2>
                    <p>Tipo de acción</p>
                    <select name="tipo" id="tipo">
                        <option value=""></option>
                        <option value="carga">Carga</option>
                        <option value="descarga">Descarga</option>
                    </select>
                </div>

                <div class="div2">
                    <h2 class="num">2</h2>
                    <h2>Ubicación</h2>
                    <p>Zona</p>
                        <select name="id_zona" id="id_zona">
                        <option value=""></option>
                            @forelse ($zonas as $zona)
                                <option id="zona_actual" value="{{$zona -> id}}">{{$zona -> ubicacion}}</option>
                                
                            @empty
                                <p>No hay zonas actualmente</p>
                            @endforelse
                        </select>

                    <p>Tipo de transporte</p>

                    <select name="tipo_transporte" id="tipo_transporte">
                        
                            <option value=""></option>
                            <option value="buque">Buque</option>
                            <option value="train">Tren</option>
                            <option value="truck">Camion</option>

                    </select>

                    <p>Transporte</p>


                    <select name="id_transporte" id="id_transporte">
                        <option value=""></option>
                    </select>
                    
                </div>

                <div class="div3">
                    <h2 class="num">3</h2>
                    <h2>Operador</h2>
                    <p>Seleccionar operador</p>
                    <select name="operador">
                        @forelse ($operadores as $operador)
                            <option value="{{$operador -> id}}">{{$operador -> name}}</option>
                        @empty
                            <p>No hay turnos actualmente</p>
                        @endforelse
                    </select>
                </div> 
                
                <div class="tabla-parcelas">
                    <h2 class="num">4</h2>
                    <h2>Parcela</h2>
                    <p>Busca parcela, max: <span id="maximo-zona"></span> </p>
                    <input type="number" class="input-orden" name="parcela" id="buscar_parcela" min="1" max="0">
                    <p id="parcela-mensaje" style="margin-top: 10px; font-weight: bold;"></p>
                    <p>Altura, max: 2</p>
                    <input type="number" class="input-orden" name="altura" id="altura" min="0" max="2">

                </div> 
                </div>

                <button class="crear btn">Crear</button>
            </form>
            <form action="" method="get">
                <button class="cancelar btn">Cancelar</button>
            </form>
        </body>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!--Esto sirve para sacar el valor de tipo de transporte que tiene el select-->

        <script>
            $(document).ready(function() {
                $('#tipo_transporte').change(function() {
                    var tipo = $(this).val();
                    console.log('Tipo del select: ' + tipo)
                    $.ajax({
                        url: "{{ route('getTransporte') }}", // Ruta en Laravel
                        type: "GET",
                        data: { tipo: tipo },
                        success: function(response) {
                            console.log('Respuesta del servidor:', response);
                            $('#id_transporte').empty();
                            if (response.length > 0) {

                                if(tipo == 'buque' || tipo == 'train'){

                                    response.forEach(function(transporte) {
                                        $('#id_transporte').append('<option value="' + transporte.id + '">' + transporte.nombre + '</option>');
                                    });

                                } else {

                                    response.forEach(function(transporte) {
                                        $('#id_transporte').append('<option value="' + transporte.id + '">' + transporte.matricula + '</option>');
                                    });

                                }
                            } else {
                                $('#id_transporte').append('<option value="">No hay transportes disponibles</option>');
                            }
                        }
                    });
                });
            });
        </script>

        <!--Esto sirve para sacar el valor de zona que tiene el select-->

        <script>
           $('#id_zona').change(function() {
            var zonaId = $(this).val(); // Obtenemos el ID de la zona seleccionada
            console.log('Zona seleccionada: ' + zonaId);
            
            $.ajax({
                url: "{{ route('getParcelasByZona') }}", // Ruta que procesará la solicitud
                type: "GET",
                data: { zona_id: zonaId }, // Enviamos el ID de la zona seleccionada
                success: function(response) {
                    // Accede a los valores X e Y de la zona directamente
                    var zonaX = response.x; // Coordenada X
                    var zonaY = response.y; // Coordenada Y
                    var max = response.max; // El valor máximo calculado (X * Y)
                    console.log('X de la zona:', zonaX);
                    console.log('Y de la zona:', zonaY);
                    console.log('Valor máximo (X * Y):', max);
                    
                    // Actualizar el texto con las coordenadas de la zona
                    $('#zona-coordinates').text('X: ' + zonaX + ', Y: ' + zonaY);

                    $('#maximo-zona').text(max);
                    
                    // Establecer el máximo permitido en el input
                    $('#buscar_parcela').attr('max', max);

                    // Limpiamos las opciones anteriores del select de parcelas
                    $('#parcela').empty();

                    // Verificamos si hay parcelas para la zona seleccionada
                    if (response.parcelas && response.parcelas.length > 0) {
                        response.parcelas.forEach(function(parcela) {
                            $('#parcela').append('<option value="' + parcela.id + '">' + parcela.id + '</option>');
                        });
                    } else {
                        // Si no hay parcelas disponibles
                        $('#parcela').append('<option value="">No hay parcelas disponibles</option>');
                    }
                },
                error: function() {
                    alert('Error al obtener las coordenadas de la zona.');
                }
            });
        });


        </script>

        <!--Esto sirve para comprobar si la parcela que se ha ingresado tiene algun hueco libre-->

        <script>
            $('#buscar_parcela').on('input', function() {
                var parcela = $(this).val(); // Número ingresado
                var mensaje = $('#parcela-mensaje'); // Elemento para mostrar mensajes
                var id_zona = $('#id_zona').val();

                console.log('Parcela ingresada ' + parcela + '\nZona: ' + id_zona);

                if (parcela) {
                    $.ajax({
                        url: "{{ route('comprobarParcela') }}", // Ruta en Laravel
                        type: "GET",
                        data: { parcela: parcela , id_zona: id_zona}, // Enviamos la parcela al backend
                        success: function(response) {

                            console.log('max: ' + response.max + '\naltura cero: ' + response.altura_cero + '\naltura uno: ' + response.altura_uno + '\naltura uno: ' + response.altura_uno);

                            if (response.ocupada ) {
                                mensaje.text('X Esta parcela ya está completa.').css('color', 'orange');
                            } else if(parcela > response.max){

                                mensaje.text('X La parcela supera la cantidad posible.').css('color', 'orange');

                            }else {
                                mensaje.html('✔ Parcela disponible.').css('color', '#152D65');
                            }
                        },
                        error: function() {
                            mensaje.text('⚠ Error al comprobar la parcela.').css('color', 'red');
                        }
                    });
                } else {
                    mensaje.text(''); // Limpiar el mensaje si no hay input
                }
            });
        </script>

        <script>
            $('#tipo').change(function() {
                var tipo = $(this).val();

                console.log('Tipo de orden: ' + tipo);

                if (tipo === 'carga') {
                    $('#parcela-mensaje').hide();
                } else {
                    $('#parcela-mensaje').show();
                }

                if (tipo) {
                    $.ajax({
                        url: "{{ route('comprobarTipo') }}", // Ruta en Laravel
                        type: "GET",
                        data: { tipo: tipo}, // Enviamos la parcela al backend
                        success: function(response) {

                            console.log('Tipo que has seleccionado: ' + response.tipo);
                        },
                            error: function() {
                            console.log('Tipo incorrecto.');
                            }
                    });
                }
            });
        </script>



    </html>
</x-app-layout>

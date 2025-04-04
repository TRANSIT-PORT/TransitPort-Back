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
            <link rel="stylesheet" href="{{ asset('css/Administrativo/crearOrden.css') }}">
        </head>

        <body>
            <h1 class="titulo"> Crear Orden</h1>
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

                <div class="contenedor">

                    <div class="div4" id="div4">
                        <h2 class="num">4</h2>
                        <h2>Contenedor</h2>
                        <p>Tipo de contenedor </p>
                        <select name="tipo_contenedor" id="tipo_contenedor">

                            <option value=""></option>
                            <option value="Dry Van">Dry Van</option>
                            <option value="High Cube">High Cube</option>
                            <option value="Reefer ">Reefer</option>
                            <option value="Open Top">Open Top</option>
                            <option value="Flat Rack">Flat Rack</option>

                        </select>
                        <p>Dimensiones</p>
                        <select name="dimensiones_contenedor" id="dimensiones_contenedor"></select>

                    </div>
                
                    <div class="div5">
                        <h2 class="num" id="num_div5">4</h2>
                        <h2>Parcela</h2>
                        <p>Busca parcela, max: <span id="maximo-zona"></span> </p>
                        <input type="number" class="input-orden" name="parcela" id="buscar_parcela" min="1" max="0">
                        <p id="parcela-mensaje" class="disponibilidad_parcela" style="margin-top: 10px; font-weight: bold;"></p>
                        <p>Altura, max: 2</p>
                        <select name="altura" id="altura"></select>

                    </div>
                    </div>
                
                
                </div>

                <button id="botonCrearOrden"class="crear btn">Crear</button>
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

        <script>
            $('#tipo_contenedor').change(function() {
                var tipo_contenedor = $(this).val();
                var tipo_orden = $('#tipo').val();

                console.log('Tipo de contenedor: ' + tipo_contenedor, 'Tipo orden' + tipo_orden);

                if(tipo_contenedor){

                    $.ajax({
                        url: "{{ route('sacarDimensiones') }}", // Ruta en Laravel
                        type: "GET",
                        data: { tipo_contenedor: tipo_contenedor}, // Enviamos la parcela al backend
                        success: function(response) {

                            if(response.length > 0){

                                $('#dimensiones_contenedor').empty();

                                $('#dimensiones_contenedor').append('<option value=""></option>')

                                response.forEach(function(dimensiones){

                                    $('#dimensiones_contenedor').append('<option value="' + dimensiones + '">' + dimensiones + ' ft</option>')

                                });

                            }
                            
                        }
                    });

                }
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
                },
                error: function() {
                    alert('Error al obtener las coordenadas de la zona.');
                }
            });
        });


        </script>

        <!--Esto sirve para comprobar si la parcela que se ha ingresado tiene algun hueco libre-->

        <script>
            function buscarParcela() {
                var parcela = $('#buscar_parcela').val();
                var id_zona = $('#id_zona').val();
                var tipo_orden = $('#tipo').val();
                var tipo_contenedor = $('#tipo_contenedor').val();
                var dimensiones_contenedor = $('#dimensiones_contenedor').val();
                var altura = $('#altura').val();

                console.log('Parcela ingresada ' + parcela + '\nZona: ' + id_zona + '\naltura: ' + altura + '\nTipo_contenedor: ' + tipo_contenedor + '\ndimensiones_contenedor: ' + dimensiones_contenedor);

                if (tipo_orden) {
                    $.ajax({
                        url: "{{ route('comprobarParcela') }}", 
                        type: "GET",
                        data: { parcela: parcela , id_zona: id_zona, tipo_orden: tipo_orden, tipo_contenedor: tipo_contenedor, dimensiones_contenedor: dimensiones_contenedor, altura: altura}, 
                        success: function(response) {

                            console.log(response);

                            if(tipo_orden == 'descarga'){

                                $('#altura').empty();

                                if (response.ocupada==true || response.ocupado == true) {
                                    $('#altura').append('<option value="">La parcela está completa</option>')
                                    $('#botonCrearOrden').prop('disabled', true)
                                } else {

                                    $('#botonCrearOrden').prop('disabled', false)

                                    response.opcionesAlturas.forEach(function(opcionesAlturas){

                                        $('#altura').append('<option value="' + opcionesAlturas + '">' + opcionesAlturas + '</option>')

                                    });
                                    
                                }
                            }
                            
                        },
                        error: function() {
                            console.log('Error al buscar la parcela', error)
                        }
                        
                    });
                } else {
                    altura.empty();
                }
            }

            function comprobarContenedor() {
                var parcela = $('#buscar_parcela').val();
                var id_zona = $('#id_zona').val();
                var tipo_orden = $('#tipo').val();
                var altura = $('#altura').val();

                if (parcela) {
                    $.ajax({
                        url: "{{ route('comprobarContenedor') }}", 
                        type: "GET",
                        data: { parcela: parcela , id_zona: id_zona, tipo_orden: tipo_orden}, 
                        success: function(response) {
                            

                            console.log(response)

                            if(tipo_orden == 'carga'){

                                $('#altura').empty();

                                if(response.opcionesAlturas.length > 0){

                                    $('#botonCrearOrden').prop('disabled', false)
                                    
                                    response.opcionesAlturas.forEach(function(opcionesAlturas){

                                            $('#altura').append('<option value="' + opcionesAlturas + '">' + opcionesAlturas + '</option>')

                                    }); 
                                } else {

                                    $('#altura').append('<option value="">En esta parcela no hay contenedores</option>')

                                    $('#botonCrearOrden').prop('disabled', false)

                                }
                            }

                        },
                        error: function() {
                            console.log('Error al buscar la parcela', error)
                        }
                        
                    });
                } else {
                    altura.empty();
                }
            }

            $('#buscar_parcela, #id_zona, #tipo, #dimensiones_contenedor').on('input change change change change', buscarParcela);

            $('#buscar_parcela').on('input', comprobarContenedor);
            
        </script>

        <script>
            $('#tipo').change(function() {
                var tipo = $(this).val();
                var div4 = $('#div4');
                var div5 = $('#div5');

                console.log('Tipo de orden: ' + tipo);

                if (tipo === 'carga' || !tipo) {
                    $('#parcela-mensaje').fadeOut();
                    div4.fadeOut();
                    div5.css('top', '10%')
                    $('#num_div5').text('4');
                } else if(tipo === 'descarga'){
                    $('#parcela-mensaje').fadeIn();
                    div4.fadeIn()
                    div5.css('top', '37%')
                    $('#num_div5').text('5');
                }
            });
        </script>
    </html>
</x-app-layout>

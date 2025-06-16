<x-app-layout>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Crear usuario</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/Gestor/crearTransporte.css') }}">

    </head>

    <body>
        <h1> Crear Transporte</h1>

            <div class="div1">
                <h2 class="num">1</h2>
                <h2>Datos</h2>

                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value=""></option>
                    <option value="buque">Buque</option>
                    <option value="tren">Tren</option>
                    <option value="camion">Camión</option>
                </select>
                <input type="hidden" id="tipoTransporte" name="tipoTransporte" value="">


                <label for="">Ubicación</label>
                <select name="ubicacion" id="ubicacion">

                </select>

                <label for="name">Nombre</label>
                <input type="text" id="name" name="name">

                <div id="bloqueMatricula" style="display: none">
                    <label for="matricula">Matrícula</label>
                    <input type="text" id="matricula" name="matricula" maxlength="7">
                </div>

                <label for="procedencia">Procedencia</label>
                <input type="text" id="procedencia" name="procedencia">

                <label for="destino">Destino</label>
                <input type="text" id="destino" name="destino">
            </div>

            <div class="div2">
                <table id="tablaTransportes" style="display: none">

                    <thead>
                        <th>Ubicacion</th>
                        <th>Nombre</th>
                        <th>Procedencia</th>
                        <th>Destino</th>
                        <th>#</th>
                    </thead>
                    <tbody id="tablaTransportesBody">
                    </tbody>

                </table>

            </div>
            <button class="crear btn btn-primary" id="crear">Crear</button>

            <a href="{{ url()->previous() }}" class="cancelar btn btn-warning">Cancelar</a>

    </body>
</html>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#crear').click(function(){

    $.ajax({

        url: '/guardarTransporte',
        method: 'POST',
        data: {

            tipo: $('#tipo').val(),
            ubicacion: $('#ubicacion').val(),
            name: $('#name').val(),
            matricula: $('#matricula').val(),
            procedencia: $('#procedencia').val(),
            destino: $('#destino').val(),

        },
        success: function(response){

            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: response.message,
                confirmButtonColor: '#3085d6'
            });

            let tipo = $('#tipo').val()

            cargarTabla(tipo)

        },
        error: function(xhr) {
            let res = JSON.parse(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: res.message,
                confirmButtonColor: '#d33'
            });
        }

    });

})

$('#tipo').on('change', function(){

    let tipo = $(this).val();
    let palabra;

    $('#tipoTransporte').val(tipo)

    switch(tipo){

        case 'buque':

            $('#bloqueMatricula').fadeOut();
            palabra = 'Amarre'
            break;

        case 'tren':

            $('#bloqueMatricula').fadeOut();
            palabra = 'Estación'
            break;

        case 'camion':

            $('#bloqueMatricula').fadeIn();
            palabra = 'Aparcamiento';
            break;

    }

    $('#ubicacion').empty();

    for(let i = 1; i <= 8; i++){
        $('#ubicacion').append('<option value="' + i + '">' + palabra + ' ' + i + '</option>')
    }

    cargarTabla(tipo);

    let valorTipo = $('#tipo').val();
    if(valorTipo == ''){
        $('#tablaTransportes').fadeOut();
        $('#ubicacion').empty();
    } else{
        $('#tablaTransportes').fadeIn();
    }

})

function cargarTabla(tipo){

    $.ajax({

        url: '/buscarTransportes/' + tipo,
        method: 'GET',
        success: function(response){

            $('#tablaTransportesBody').empty();
            response.forEach(function(item){
                if(tipo == 'buque'){
                    $('#tablaTransportesBody').append(
                        '<tr>' +
                            '<td class="text-center">' + item.amarre + '</td>' +
                            '<td class="text-center">' + item.nombre + '</td>' +
                            '<td class="text-center">' + item.procedencia + '</td>' +
                            '<td class="text-center">' + item.destino + '</td>' +
                            '<td>'+
                                '<form method="POST" action="/borrarTransporte" onsubmit="return confirm(\'¿Estás seguro?\')">' +
                                    '<input type="hidden" name="tipoTransporte" value="' + tipo + '">' +
                                    '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
                                    '<input type="hidden" name="id" value="' + item.id + '">' +
                                    '<button type="submit" class="btnBlue"><p><i class="fa-solid fa-trash"></i></p></button>' +
                                '</form>' +
                            '</td>' +
                        '</tr>'
                    );
                } else if(tipo == 'tren'){
                    $('#tablaTransportesBody').append(
                        '<tr>' +
                            '<td class="text-center">' + item.parada + '</td>' +
                            '<td class="text-center">' + item.nombre + '</td>' +
                            '<td class="text-center">' + item.procedencia + '</td>' +
                            '<td class="text-center">' + item.destino + '</td>' +
                            '<td>'+
                                '<form method="POST" action="/borrarTransporte" onsubmit="return confirm(\'¿Estás seguro?\')">' +
                                    '<input type="hidden" name="tipoTransporte" value="' + tipo + '">' +
                                    '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
                                    '<input type="hidden" name="id" value="' + item.id + '">' +
                                    '<button type="submit" class="btnBlue"><p><i class="fa-solid fa-trash"></i></p></button>' +
                                '</form>' +
                            '</td>' +
                        '</tr>'
                    );
                } else{
                    $('#tablaTransportesBody').append(
                        '<tr>' +
                            '<td class="text-center">' + item.aparcamiento + '</td>' +
                            '<td class="text-center">' + item.nombre + '</td>' +
                            '<td class="text-center">' + item.procedencia + '</td>' +
                            '<td class="text-center">' + item.destino + '</td>' +
                            '<td>'+
                                '<form method="POST" action="/borrarTransporte" onsubmit="return confirm(\'¿Estás seguro?\')">' +
                                    '<input type="hidden" name="tipoTransporte" value="' + tipo + '">' +
                                    '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
                                    '<input type="hidden" name="id" value="' + item.id + '">' +
                                    '<button type="submit" class="btnBlue"><p><i class="fa-solid fa-trash"></i></p></button>' +
                                '</form>' +
                            '</td>' +
                        '</tr>'
                    );
                }

            })

        }

    });

}

</script>
</x-app-layout>

<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Crear turno</title>

            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Calendario -->
            <link rel="stylesheet" href="{{ asset('css/Administrativo/crearTurno.css') }}">
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
            <script>
                window.addEventListener('load', inicio);

                function inicio() {
                    document.getElementById('icono').addEventListener('click', mostrarCalendario);
                }

                function mostrarCalendario() {
                    let calendario = document.getElementById('calendario');

                    if (calendario.style.visibility != 'hidden') {
                        calendario.style.visibility = 'hidden';
                    } else {
                        calendario.style.visibility = 'visible';
                    }
                }

                document.addEventListener('DOMContentLoaded', function() {
                    let calendar = document.getElementById('calendario');
                    let calendario = new FullCalendar.Calendar(calendar, {
                        initialView: 'dayGridMonth', //Vista del calendario. (Mes fraccionado por dias).
                        locale: 'es', //Cambiamos al Castellano.

                        /**
                        * Funcion para actualizar el "input date" al seleccionar un dia en el calendario.
                        * info: Dia seleccionado.
                        */
                        dateClick: function(info) {
                            let fechaSeleccionada = info.dateStr; //Convertimos la fecha a formato YYYY-MM-DD.

                            /**
                            * Primero comprobamos que las celdas no esten seleccionadas. Y si lo estan, las deseleccionamos.
                            * En principio solo hay una fecha seleccionada, pero por si fallase indicamos que coja todas las celdas "seleccionadas".
                            */
                            let celdas = document.querySelectorAll('.fc-day.selected');
                            celdas.forEach(function(celda) {
                                celda.classList.remove('selected');

                                //A partir de la celda que hayamos cogido, le cambiamos el color del numero de la celda.
                                let numSelected = celda.querySelector('.fc-daygrid-day-number');
                                if (numSelected) {
                                    numSelected.style.color = '';
                                }
                            });

                            //Ahora pillamos la celda con la fecha actual y le agregamos la calse "selected".
                            let celda = document.querySelector(`[data-date="${fechaSeleccionada}"`);
                            if (celda) {
                                celda.classList.add('selected');

                                //Al igual que antes, le cambiamos el color del numero de la celda para que sea más legible.
                                let num = celda.querySelector('.fc-daygrid-day-number');
                                if (num) {
                                    num.style.color = 'white';
                                }
                            }

                            //Cogemos el input y le actualizamos el valor.
                            let input = document.getElementById('fecha');
                            input.value = fechaSeleccionada;
                        }
                    });

                    //Generamos el calendario.
                    calendario.render();
                });
            </script>
        </head>

        <body>
            <h1 class="titulo">  Crear Turno</h1>
            <form action="{{ route('guardarTurno') }}" method="post">
                @csrf

                <div id='calendario' style="visibility: hidden;"></div>

                <div class="div1">
                    <h2 class="num">1</h2>
                    <h2>Fecha</h2>
                    <p>Seleccionar fecha</p>
                    <input class="date" type="date" name="fecha" id="fecha" readonly><img src="" id="icono">
                </div>
                
                <div class="div2">
                    <h2 class="num">2</h2>
                    <h2>Horario</h2>
                    <div class="fecha">
                        <label for="hora_inicio">Hora inicio</label>

                        <p>Tipo</p>
                    </div>
                    <div class="fecha">
                        <input class="hora" type="time" name="hora_inicio">

                        <select class="hora" name="horas">
                            <option value="8">8 horas</option>
                            <option value="10">10 horas</option>
                            <option value="12">12 horas</option>
                        </select>
                    </div>
                </div>

                <button class="crear btn">Crear</button>
            </form>
            <form action="" method="get">
                <button class="cancelar btn">Cancelar</button>
            </form>
        </body>

        <script>

        if (localStorage.getItem("modoOscuro") === "true") {
            document.body.classList.add("dark-mode");
        }

        </script>
    </html>
</x-app-layout>
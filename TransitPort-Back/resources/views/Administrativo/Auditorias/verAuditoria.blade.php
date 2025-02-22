<x-app-layout>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Ver auditoria</title>
            <meta charset="utf-8">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
            <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
            <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

            <style>
                #auditoria tbody tr {
                    cursor: pointer;
                }
                #auditoria th {
                    background: var(--Cinder-900, #152D65);
                    color: white;
                }
            </style>
        </head>
        <body>
            
        <div class="container mt-5">
            <h2 class="mb-4">Visualizar Auditoria</h2>
            <table id="auditoria" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Codigo orden</th>
                        <th>Orden asociada</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        
        </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                let table = $('#auditoria').DataTable({
                    pageLength: 10, //Limitamos las consultas a 10.
                    lengthMenu: [10, 15, 20, 25], //Agregamos opciones de aumentar o dismiuir opciones de menu.
                    ajax: '{{ route("recogerAuditoria") }}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'tipo', name: 'tipo' },
                        { data: 'estado', name: 'estado' },
                    ]
                });

                //Agregamos la funcion de que al hacer click en una columna, puedas ver en detalle la orden.
                $('#auditoria tbody').on('click', 'tr', function() {
                    let orden = table.row(this).data(); //Consigue la informacion de la columna.
                    window.location.href = "/verAuditoria/" + orden.id; //Navegamos a la id de la orden.
                });
            });
        </script>
    </html>
</x-app-layout>
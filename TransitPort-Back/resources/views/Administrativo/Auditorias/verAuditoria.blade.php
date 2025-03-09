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
                #auditoria th {
                    background: var(--Cinder-900, #152D65);
                    color: white;
                }
                #auditoria tbody tr {
                    cursor: pointer;
                }

                input.form-control.form-control-sm {

                    width: 70% !important;
                    padding: 8px !important;
                    border-radius: 4px !important;
                    font-size: 20px !important;
                    border: 2px solid #000 !important;
                    height: 36px !important;
                    font-weight: 700;
                    color: #000 !important;
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.5);
                    background-image: url('assets/lupa.svg') !important;
                    background-repeat: no-repeat !important;
                    background-position: left 10px center !important;
                    padding-left: 70px !important;

                }

                th.sorting_disabled {

                    background: var(--Cinder-900, #152D65) !important;
                    color: var(--Cinder-50, #F1F5FE);
                    width: 100px;
                    height: 54px;
                    padding-left: -70px;
                    border: none;
                    text-align: center;
                    position: sticky;
                    z-index: 10;

                }

                #auditoria tbody {
                    background: #F1F5FE;
                    border: none;

                }

                #auditoria td {
                    background: #FFF;
                    color: #000000;
                    border-top: 10px solid #F1F5FE;
                    border-right: none;
                    text-align: center;
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
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route("recogerAuditoria") }}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'tipo', name: 'tipo' },
                        { data: 'estado', name: 'estado' },
                    ]
                });

                $('#auditoria tbody').on('click', 'tr', function() {
                    let orden = table.row(this).data();
                    let id = orden.id;
                    window.location.href = "/verAuditoria/" + id;
                });
            });
        </script>
    </html>
</x-app-layout>
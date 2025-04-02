<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="{{ asset('css/Administrativo/exito.css') }}">
        <title>Exito</title>

        @if (session('mensaje') && session('cabecera'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {     
                    Swal.fire ({
                        title: "{{ session('cabecera') }}",
                        text: "{{ session('mensaje') }}",
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.history.back();
                        }
                    });
                });
            </script>
        @endif
    </head>
    <body>
    </body>
    </html>
</x-app-layout>

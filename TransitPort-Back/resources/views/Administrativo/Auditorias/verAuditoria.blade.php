<!DOCTYPE html>
    <html>
    <head>
        <title>DataTables en Laravel</title>
        <link href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css" rel="stylesheet">
    </head>
    <body>
        @yield('content')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
        @yield('scripts')
    </body>
</html>
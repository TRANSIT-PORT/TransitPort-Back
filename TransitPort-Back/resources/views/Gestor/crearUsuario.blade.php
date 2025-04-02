<x-app-layout>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Crear usuario</title>

        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/Gestor/crearUsuario.css') }}">


        <style>
            
        </style>
    </head>

    <body>
        <h1><img src="assets/Gestor/usuariosCrear.svg">  Crear Usuario</h1>
        <form action="{{ route('guardarUsuario') }}" method="post">
            @csrf

            <div class="div1">
                <h2 class="num">1</h2>
                <h2>Datos</h2>
                <label for="name">Nombre y apellidos</label>
                <input type="text" id="name" name="name">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario">
                <label for="ciudad">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email">

            </div>

            <div class="div4">

                <label for="telf">Número de teléfono</label>
                <input type="tel" id="telf" name="telefono">
                <label for="postal">Código Postal</label>
                <input type="text" id="postal" name="codigoPostal">

            </div>

            <div class="div3">
                <h2 class="num">2</h2>
                <h2>Contraseña</h2>
                <label for="contrasenya">Contraseña</label>
                <input type="password" name="password" id="contrasenya">
                <label for="contrasenya2">Confirma la contraseña</label>
                <input type="password" name="password_confirmation" id="contrasenya2">

            </div>

            <div class="div2">
                <h2 class="num">3</h2>
                <h2>Roles</h2>
                <p>Tipo de usuario</p>
                <select name="cargo">
                    <option value="gestor">Gestor</option>
                    <option value="administrativo">Administrativo</option>
                    <option value="operador">Operador</option>
                </select>
            </div>

            <button class="crear btn btn-primary">Crear</button>
        </form>

            <a href="{{ url()->previous() }}" class="cancelar btn btn-warning">Cancelar</a>

    </body>
</html>
</x-app-layout>

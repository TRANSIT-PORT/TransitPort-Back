<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Operador/perfil.css') }}">
</head>

<body>

    <div class="d-flex flex-column vh-100 col-9 col-xl-9 col-lg-9 col-md-9" id="cuerpo">

        <div class="d-flex flex-row" id="titulo">
            <h2>Mi perfil</h2>
          </div>

          <div class="d-flex flex-column align-items-center" id="body-perfil">

            <img src="{{ asset('assets/pruebaPerfilMenu.png') }}" alt="foto-perfil">

                <form>

                <div class="d-flex flex-row" id="info-perfil">

                    <div class="d-flex flex-column" id="input-perfil">

                        <label>Nombre</label>
                        <input type="text" class="form-control" value="{{ $usuario->name }}">

                    </div>

                    <div class="d-flex flex-column" id="input-perfil">

                        <label>Usuario</label>
                        <input type="text" class="form-control" value="{{ $usuario->usuario }}">

                    </div>

                    <div class="d-flex flex-column" id="input-perfil">

                        <label>Teléfono</label>
                        <input type="text" class="form-control" value="{{ $usuario->telefono }}">

                    </div>

                    <div class="d-flex flex-column" id="input-perfil">

                        <label>Ciudad</label>
                        <input type="text" class="form-control" value="{{ $usuario->ciudad }}">

                    </div>

                    <div class="d-flex flex-column" id="input-perfil">

                        <label>Código postal</label>
                        <input type="text" class="form-control" value="{{ $usuario->codigoPostal }}">

                    </div>

                    <div class="d-flex flex-column" id="input-perfil">

                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $usuario->email }}">

                    </div>

                </div>
            </div>
            <div class="d-flex" id="boton-container">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" id="boton-perfil" class="btn">Cerrar sesión</button>
                </form>
            </div>
            </form>
    </div>

</body>
</html>



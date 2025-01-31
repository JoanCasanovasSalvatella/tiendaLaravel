<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleGestor.css') }}"><!--Enlazar css-->
    <title>Gestion de usuarios</title>
</head>
<body>
    <h1>Gestion de usuarios</h1>
    <div>
        <!--Formulario de registro de usuarios-->
        <form action="{{ route('usersAdmin') }}" method="get">
            <input type="submit" value="Registrar un usuario" class="boton">
        </form>

        <form action="{{ route('usersModAdmin') }}" method="get">
            <input type="submit" value="Modificar un usuario" class="boton">
        </form>

        <form action="{{ route('usersDelAdmin') }}" method="get">
            <input type="submit" value="Eliminar un usuario" class="boton">
        </form>

        <form action="{{route('perfil')}}" method="get">
            <input type="submit" value="Cancelar" name="cancel" class="boton">
        </form>
    </div>
    <!--Formulario de registro de usuarios
    <form action="{{ route('usersAdmin') }}" method="get">
        <input type="submit" value="Registrar un usuario" class="boton">
    </form>

    <form action="{{ route('usersModAdmin') }}" method="get">
        <input type="submit" value="Modificar un usuario" class="boton">
    </form>

    <form action="{{ route('usersDelAdmin') }}" method="get">
        <input type="submit" value="Eliminar un usuario" class="boton">
    </form>

    <form action="{{route('perfil')}}" method="get">
        <input type="submit" value="Cancelar" name="cancel" class="boton">
    </form>-->
</body>
</html>
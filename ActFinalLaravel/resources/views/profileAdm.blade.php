<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleProf.css') }}"><!--Enlazar css-->
    <title>Perfil</title>
</head>
<body>
    <h1>Perfil de usuario</h1>
    <table >
        <thead>
            <tr>
                <th class="encabezado">Nombre de Usuario</th>
                <th class="encabezado">Correo Electrónico</th>
                <th class="encabezado">Nombre Completo</th>
                <th class="encabezado">DNI</th>
                <th class="encabezado">Fecha de Nacimiento</th>
                <th class="encabezado">Contraseña</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->nick }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nombre }} {{ $user->apellidos }}</td>
                <td>{{ $user->dni }}</td>
                <td>{{ $user->fecha_nacimiento }}</td>
                <td>{{ $user->password }}</td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <div class="admin">
        <form action="{{route('categorias')}}" method="get">
            <input type="submit" value="Ver las categorias">
        </form><br>

        <form action="{{route('catalogo')}}" method="get">
            <input type="submit" value="Nuestros productos">
        </form>
        <form action="{{route('usrGest')}}" method="get">
            <input type="submit" value="Gestionar Usuarios">
        </form>
        <form action="{{route('gestCategorias')}}" method="get">
            <input type="submit" value="Gestionar Categorias">
        </form>
        <form action="{{route('prodGest')}}" method="get">
            <input type="submit" value="Gestionar Productos">
        </form>
    </div>
    

    <!--Muestra un mensaje indicando que se ha logeado con exito-->
    @if(session('success'))
        <h3>{{ session('success') }}</h3>
    @endif

    <!--Boton de cerrar sessión-->
    <form novalidate action="{{route('confirm')}}" method="get">
        <input type="submit" value="Cerrar sessión">
    </form>
    <br>
</body>
</html>
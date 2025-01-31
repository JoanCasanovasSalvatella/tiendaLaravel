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
    <table><!--Tabla que muestra los datos del usuario logeado-->
        <p><b>Nombre de usuario: </b>{{ $user->nick }}</p><!--Username del cliente-->
        <p><b>Correo electrónico: </b>{{ $user->email }}</p><!--Correo del usuario-->
        <p><b>Nombre completo: </b>{{ $user->nombre }} {{$user->apellidos}}</p><!--Nombre y apellido del usuario-->
        <p><b>DNI: </b>{{ $user->dni }}</p><!--DNI del usuario-->
        <p><b>Fecha de nacimiento: </b>{{ $user->fecha_nacimiento }}</p><!--fecha de nacimiento del usuario-->
        <p><b>Contraseña: </b>{{ $user->password }}</p><!--Nombre y apellido del usuario-->
    </table>
    <form action="{{route('categorias')}}" method="get">
        <input type="submit" value="Ver las categorias">
    </form><br>

    <form action="{{route('catalogo')}}" method="get">
        <input type="submit" value="Nuestros productos">
    </form>

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
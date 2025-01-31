<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Actualiza tus datos</h1>

    <!--Formulario que actualizar datos de usuarios-->
    <form novalidate action="{{ route('updUser') }}" method="POST">
    @csrf 
    <!--Campos del formulario con su correspondiente nombre-->
    <label for="nick">Dni del usuario a actualizar</label><br>
    <input type="text" name="dni"><br><br>

    <label for="nick">Nuevo nickname</label><br>
    <input type="text" name="nick"><br><br>

    <label for="nick">Nuevo nombre</label><br>
    <input type="text" name="name"><br><br>

    <label for="lastName">Nuevo apellido</label><br>
    <input type="text" name="lastName"><br><br>

    <label for="mail">Nuevo Correo electrónico</label><br>
    <input type="text" name="mail"><br><br>

    <label for="date">Nueva fecha de nacimiento</label><br>
    <input type="text" name="date"><br><br>

    <label for="password">Nueva Contraseña</label><br>
    <input type="text" name="password"><br><br>

    <label for="rol">Rol</label><br>
    <select name="role"><!--Menú desplegable con las dos opciones de rol-->
        <option value="Administrador">Administrador</option>
        <option value="Cliente">Cliente</option>
    </select><br><br>

    <!--Boton para enviar-->
    <button type="submit">Enviar</button>
    </form>

    <!--Muestra un mensaje indicando que se ha registrado con exito-->
    @if(session('success'))
        <h3>{{ session('success') }}</h3>
    @endif
    <br>

    <!--Boton que lleva al menu de gestion de usuarios-->
    <a href="{{ route('usrGest') }}">
    <button type="button">Volver atras</button>
    </a>
 
</body>
</html>
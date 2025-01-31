<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de categorias</title>
</head>
<body>
    <h1>Registro de categorias</h1>

    <!--Formulario que inserta datos en la bd-->
    <form novalidate action="{{ route('addUser') }}" method="POST">
    @csrf 
    <!--Campos del formulario con su correspondiente nombre-->
    <label for="nick">Nick</label><br>
    <input type="text" name="nick"><br><br>

    <label for="mail">Correo electrónico</label><br>
    <input type="text" name="mail"><br><br>

    <label for="name">Nombre</label><br>
    <input type="text" name="name"><br><br>

    <label for="lastName">Apellido</label><br>
    <input type="text" name="lastName"><br><br>

    <label for="dni">Dni</label><br>
    <input type="text" name="dni"><br><br>

    <label for="date">Fecha de nacimiento</label><br>
    <input type="text" name="date"><br><br>

    <label for="password">Contraseña</label><br>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar session</title>
</head>
<body>
    <h1>Iniciar session</h1>

    <!--Formulario de inicio de session que envia los datos-->
    <form novalidate action="{{route('inicia_session')}}" method="post">
        @csrf <!--Protege contra ataques al programa-->
        <label for="nickname">Nombre de usuario</label>
        <input type="text" name="nickname"><br><br>

        <label for="contraseña">Contraseña</label>
        <input type="text" name="password"><br><br>

        <input type="submit" value="Iniciar sessión"><!--Input que envia los datos-->
    </form> 

    <!--Alerta para credenciales correctas-->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!--Alerta para credenciales incorrectas-->
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</body>
</html>
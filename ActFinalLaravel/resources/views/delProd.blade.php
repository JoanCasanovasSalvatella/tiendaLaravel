<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar producto</title>
</head>
<body>
    <h1>Eliminar un producto</h1>

    <!--Formulario que eliminar datos de usuarios-->
    <form novalidate action="{{ route('delProd') }}" method="POST">
    @csrf 
    <!--Campos del formulario con su correspondiente nombre-->
    <label for="nick">Nombre del producto a eliminar</label><br>
    <input type="text" name="nombre"><br><br>

    <!--Boton para enviar-->
    <button type="submit">Enviar</button>
    </form>

    <!--Muestra un mensaje indicando que se ha registrado con exito-->
    @if(session('success'))
        <h3>{{ session('success') }}</h3>
    @endif
    <br>

    <!--Boton que lleva al menu de gestion de usuarios-->
    <a href="{{ route('prodGest') }}">
    <button type="button">Volver atras</button>
    </a>
 
</body>
</html>
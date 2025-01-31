<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update producto</title>
</head>
<body>
    <h1>Actualiza un producto</h1>

    <!--Formulario que actualizar datos de usuarios-->
    <form novalidate action="{{ route('updCat') }}" method="POST">
    @csrf 
    <!--Campos del formulario con su correspondiente nombre-->
    <label for="nick">Nombre de la categoria a actualizar</label><br>
    <input type="text" name="id"><br><br>

    <label for="nombre">Nuevo nombre</label><br>
    <input type="text" name="name"><br><br>

    <label for="description">Nueva descripción</label><br>
    <input type="text" name="desc"><br><br>

    <!--Boton para enviar-->
    <button type="submit">Enviar</button>
    </form>

    <!--Muestra un mensaje indicando que se ha registrado con exito-->
    @if(session('success'))
        <h3>{{ session('success') }}</h3>
    @endif
    <br>

    <!--Boton que lleva al menu de gestion de usuarios-->
    <a href="{{ route('gestCategorias') }}">
    <button type="button">Volver atras</button>
    </a>
 
</body>
</html>
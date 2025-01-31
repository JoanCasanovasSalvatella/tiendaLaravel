<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de categorias</title>
</head>
<body>
    <h1>Registrar una categoria</h1>

    <!--Formulario que inserta datos en la bd-->
    <form novalidate action="{{ route('addCat') }}" method="post">
    @csrf 
    <label for="name">Nombre</label><br>
    <input type="text" name="name"><br><br>

    <label for="desc">Descripcion</label><br>
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
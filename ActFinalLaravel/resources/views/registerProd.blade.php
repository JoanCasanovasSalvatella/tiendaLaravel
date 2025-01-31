<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>

    <!--Formulario que inserta datos en la bd-->
    <form novalidate action="{{ route('addProd') }}" method="post">
    @csrf 
    <label for="name">Nombre</label><br>
    <input type="text" name="name"><br><br>

    <label for="desc">Descripcion</label><br>
    <input type="text" name="desc"><br><br>

    <label for="units">Unidades</label><br>
    <input type="text" name="units"><br><br>

    <label for="prun">Precio Unidad</label><br>
    <input type="text" name="prun"><br><br>

    <label for="category">Categoria</label><br>
        <select name="cat">
            @foreach($categories as $categories)
            <option>{{ $categories->nombre }}</option> <!-- Muestra el nombre y usa el id como valor -->
            @endforeach
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
    <a href="{{ route('prodGest') }}">
    <button type="button">Volver atras</button>
    </a>
 
</body>
</html>
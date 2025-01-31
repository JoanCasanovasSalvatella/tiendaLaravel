<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar un producto</title>
</head>
<body>
    <h1>Actualiza un producto</h1>

    <!--Formulario que actualizar datos de usuarios-->
    <form novalidate action="{{ route('updProd') }}" method="POST">
    @csrf 
    <!--Campos del formulario con su correspondiente nombre-->
    <label for="nick">Nombre del producto a actualizar</label><br>
    <input type="text" name="id"><br><br>

    <label for="nick">Nuevo nombre</label><br>
    <input type="text" name="name"><br><br>

    <label for="nick">Nuevo descripcion</label><br>
    <input type="text" name="desc"><br><br>

    <label for="lastName">Numero de unidades</label><br>
    <input type="text" name="units"><br><br>

    <label for="mail">Precio por unidad</label><br>
    <input type="text" name="price"><br><br>

    <label for="date">Categoria</label><br>
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
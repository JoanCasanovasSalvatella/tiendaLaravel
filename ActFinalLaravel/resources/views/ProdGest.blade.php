<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de usuarios</title>
</head>
<body>
    <h1>Gestion de productos</h1>
    <!--Formulario de registro de usuarios-->
    <form action="{{ route('productos') }}" method="get">
        <!--@csrf-->
        <input type="submit" value="Agregar un producto">
    </form>

    <form action="{{ route('productos2') }}" method="get">
        <input type="submit" value="Modificar un producto">
    </form>

    <form action="{{ route('prodDelAdmin') }}" method="get">
        <input type="submit" value="Eliminar un producto">
    </form>

    <form action="{{route('perfil')}}" method="get">
        <input type="submit" value="Cancelar" name="cancel">
    </form>
</body>
</html>
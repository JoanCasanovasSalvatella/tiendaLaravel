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
    <form action="{{ route('catAdmin') }}" method="get">
        <input type="submit" value="Agregar una categoria">
    </form>

    <form action="{{ route('updateCatAdmin') }}" method="get">
        <input type="submit" value="Modificar una categoria">
    </form>

    <form action="{{ route('deleteCatAdmin') }}" method="get">
        <input type="submit" value="Eliminar una categoria">
    </form>

    <form action="{{route('perfil')}}" method="get">
        <input type="submit" value="Cancelar" name="cancel">
    </form>
</body>
</html>
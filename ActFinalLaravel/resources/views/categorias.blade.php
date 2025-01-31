<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styleCategory.css') }}"><!--Enlazar css-->
    <title>Nuestras categorias</title>
</head>
<body>
    <h1>Nuestras categorias</h1>
<table>
        <th class="encabezado">Nombre</th>
        <th class="encabezado">Descripción</th>   
    <td>
    <!--Bucle que muestra todas las categorias-->
        @foreach($category as $item) <!-- Recorre cada registro de la colección -->
        <tr class="filas">
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->descripcion }}</td>
        </tr>
        @endforeach
    </td>
</table><br>
    <div class="footer">
        <form action="{{route('perfil')}}" method="get">
            <input type="submit" value="Volver a mi perfil">
        </form>
    </div>
</body>
</html>
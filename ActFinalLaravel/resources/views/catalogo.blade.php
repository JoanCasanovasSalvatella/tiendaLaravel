<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"><!--Enlazar css-->
    <title>Nuestros productos</title>
</head>
<body>
    <h1>NUESTROS PRODUCTOS</h1>
<table>
    <th>
        <tr>
            <th class="encabezado">Nombre</th>
            <th class="encabezado">Descripción</th>
            <th class="encabezado">Unidades</th>
            <th class="encabezado">Precio por unidad</th>
            <th class="encabezado">Categoría</th>
        </tr>
    </th>
    <td>
    <!--Bucle que muestra todos los productos-->
        @foreach($catalog as $item) <!-- Recorre cada registro de la colección -->
        <tr class="filas">
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->descripcion }}</td>
            <td>{{ $item->unidades }}</td>
            <td>{{ $item->precio_unidad }}€</td>
            <td>{{ $item->categoria }}</td>
        </tr>
        @endforeach
    </td>
</table>
    <div class="footer">
        <form action="{{route('perfil')}}" method="get">
            <input type="submit" value="Volver a mi perfil">
        </form>
    </div>
    
</body>
</html>
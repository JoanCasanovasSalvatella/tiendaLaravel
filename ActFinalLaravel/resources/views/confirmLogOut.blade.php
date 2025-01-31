<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="formulario">
    <h3>Estas seguro que quieres cerrar sessión?</h3>
        <form action="{{route('inicio')}}" method="get">
            <input type="submit" value="Cerrar sessión" name="logout">
        </form>
        <form action="{{route('perfil')}}" method="get">
            <input type="submit" value="Cancelar" name="cancel">
        </form>
    </div>        
</body>
</html>
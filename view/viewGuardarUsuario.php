<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Inserción de Familias</h1>
        <hr>
        <form action="index.php?accion=guardarusuario" method="post">
            <input type="text" name="txtCor" placeHolder="Correo">
            <input type="text" name="txtNom" placeHolder="Nombre">
            <input type="text" name="txtCon" placeHolder="Contrasena">
            <select name="estado" required>
                <option value="0">Activo</option>
                <option value="1">No Activo</option>
            </select>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
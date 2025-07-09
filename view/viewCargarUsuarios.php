<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php 
            include 'menu.php';
        ?>
        <h1>LISTA Usuarios</h1>
        <hr>
        <a href="index.php?accion=guardarusuario">Crear Nuevo</a>
        <table>
            <thead>
                <tr>
                    <th>Id Usuario</th>
                    <th>Correo Electronico</th>
                    <th>Nombre Usuario</th>
                    <th>Contrasena</th>
                    <th>Estado</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($usuarios as $cli){
                ?>
                <tr>
                    <td><?=$cli->getIdUsuario()?></td>
                    <td><?=$cli->getCorreoElectronico()?></td>
                    <td><?=$cli->getNombreusuario()?></td>
                    <td><?=$cli->getContrasena()?></td>
                    <td>
                        <?php
                        if(($cli->getEstado())==0){
                            echo "Activo";
                        }
                        else{
                            echo "No activo";
                        }
                        ?>
                    </td>
                    <td><a href="index.php?accion=borrarusuario&idusu=<?=$cli->getIdUsuario()?>">Borrar</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

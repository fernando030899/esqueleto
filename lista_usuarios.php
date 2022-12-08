<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <?php
                    include_once("db.php");
                ?>
            <section>
                <h1>Lista de usuarios</h1>
                <a href="registro_usuarios.php">Crear usuarios nuevos</a>
                <table>
                    <tr>
                        <th>id</th>
                        <th>usuario</th>
                        <th>nombre</th>
                        <th>apellido</th>
                        <th>edad</th>
                        <th>telefono</th>
                        <th>cargo</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    $query = mysqli_query(conn(), "SELECT u.id, u.nombre, u.usuario , u.apellido, u.correo, u.edad, u.telefono, c.cargo, u.fecha_actual FROM usuarios u INNER JOIN cargo c ON u.id_cargo = c.id;");
                    $result = mysqli_num_rows($query);
                    if($result > 0){
                        while($data = mysqli_fetch_array($query)){
                         ?>
                             <tr>
                                <th><?php echo $data["id"]?></th>
                                <th><?php echo $data["usuario"]?></th>
                                <th><?php echo $data["nombre"]?></th>
                                <th><?php echo $data["apellido"]?></th>
                                <th><?php echo $data["correo"]?></th>
                                <th><?php echo $data["edad"]?></th>
                                <th><?php echo $data["telefono"]?></th>
                                <th><?php echo $data["cargo"]?></th>
                                <th><?php echo $data["fecha_actual"]?></th>
                                <th>
                                    <a href="editar_usuario.php?id=<?php echo $data["id"]?>">Editar</a>
                                    <a href="#">Eliminar</a>
                                </th>
                            </tr>
                        <?php
                        }
                    }
                    ?>
              
                </table>
            </section>

            
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" method="POST">
            <h2>Editar Usuarios</h2>

            <?php
                include_once("db.php");
                include("controlador_editar_usuarios.php");
            ?>

            <div>
                <input type="hidden" name="id" value="<?php echo $iduser; ?>">
                <div>
                    <label for="">Usuario</label>
                    <input type="text" name="usuario" value="<?php echo $usuario; ?>">
                </div>
                <div>
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div>
                    <label for="">Apellido</label>
                    <input type="text" name="apellido" value="<?php echo $apellido; ?>">
                </div>
                <div>
                    <label for="">Correo</label>
                    <input type="email" name="correo" value="<?php echo $correo; ?>">
                </div>
                <div>
                    <label for="">Contraseña</label>
                    <input type="password" name="clave">
                </div>
                <div>
                    <label for="">Edad</label>
                    <input type="tex" name="edad" value="<?php echo $edad; ?>">
                </div>
                <div>
                    <label for="">Telefono</label>
                    <input type="tex" name="telefono" value="<?php echo $telefono; ?>">
                </div>
                <div>
                    <label for="">Localidad</label>
                    <input type="text" name="localidad"  value="<?php echo $localidad; ?>">
                </div>
                <div>
                    <label for="cargo" >Tipos de usuario</label>
                    <?php
                        $query_cargo = mysqli_query(conn(),"SELECT * FROM cargo");
                        $result_cargo = mysqli_num_rows($query_cargo);
                    ?>
                    <!-- Actualizar Usuarios con PHP y MySql - 19
                    se arregla con css, se explica en el minuto 25:13 -->
                    <select name="cargo" class="notItemOne" > 
                    <?php
                    echo $opcion;
                     if($result_cargo > 0)
                     {
                         while($cargo = mysqli_fetch_array($query_cargo)){
                 
                         
                     
                    ?>
                    <option value="<?php echo $cargo["id"];?>"><?php echo $cargo["cargo"]?></option>
                    <?php
                    }
                }
                ?>
                </select>
                </div>
                <div>
                <?php
                    date_default_timezone_set('America/Mexico_City');
                    $fecha_actual=date("Y-m-d H:i:s");
                    ?>
                    <label for="">Fecha</label>
                    <input type="datetime" name="fecha" value="<?=$fecha_actual?>" readonly onmousedown="return false;">
                </div>
                <div>
                    <input type="submit" value="actualizar" name="actualizar">
                    <a href="lista_usuarios.php">regresar</a>
                </div>

            </div>
        </form>
    </div>
    
</body>
</html>
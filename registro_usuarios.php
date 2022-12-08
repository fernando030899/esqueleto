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
            <h2>Registrar</h2>

            <?php
                include_once("db.php");
                include("controlador_registrar_usuarios.php");
            ?>

            <div>
                <div>
                    <label for="">Usuario</label>
                    <input type="text" name="usuario">
                </div>
                <div>
                    <label for="">Nombre</label>
                    <input type="text" name="nombre">
                </div>
                <div>
                    <label for="">Apellido</label>
                    <input type="text" name="apellido">
                </div>
                <div>
                    <label for="">Correo</label>
                    <input type="email" name="correo">
                </div>
                <div>
                    <label for="">Contraseña</label>
                    <input type="password" name="clave">
                </div>
                <div>
                    <label for="">Edad</label>
                    <input type="tex" name="edad">
                </div>
                <div>
                    <label for="">Telefono</label>
                    <input type="tex" name="telefono">
                </div>
                <div>
                    <label for="">Localidad</label>
                    <input type="text" name="localidad">
                </div>
                <div>
                    <label for="cargo" >Tipos de usuario</label>
                    <?php
                        $query_cargo = mysqli_query(conn(),"SELECT * FROM cargo");
                        $result_cargo = mysqli_num_rows($query_cargo);
                    ?>
                    <select name="cargo"> 
                    <?php
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
                    <input type="submit" value="Registrar" name="registrar">
                    <a href="login.php">Salir</a>
                    <a href="lista_usuarios.php">lista</a>
                </div>

            </div>
        </form>
    </div>
    
</body>
</html>
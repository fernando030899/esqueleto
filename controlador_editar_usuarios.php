<?php
include_once("db.php");

if(empty($_GET['id']))
{
    header('location:lista_usuarios.php');
}
$iduser = $_GET['id'];
$sql = mysqli_query(conn(),"SELECT u.id, u.nombre, u.usuario , u.apellido, u.correo, u.edad, u.telefono, u.localidad, u.fecha_actual,(c.id) AS id_cargo , (c.cargo) AS cargo
                             FROM usuarios u 
                             INNER JOIN cargo c 
                             on u.id_cargo = c.id 
                             WHERE u.id = $iduser");
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('location: lista_usuarios.php');
}else{
    $opcion = '';
    while($data = mysqli_fetch_array($sql)){
        $id =$data['id'];
        $nombre =$data['nombre'];
        $usuario =$data['usuario'];
        $apellido =$data['apellido'];
        $correo =$data['correo'];
        $edad =$data['edad'];
        $telefono =$data['telefono'];
        $localidad =$data['localidad'];
        $fecha_actual =$data['fecha_actual'];
        $id =$data['id_cargo'];
        $cargo =$data['cargo'];

        if($id == 1){
           $opcion = '<option value="'.$id.'"select>'.$cargo.'</option>';
        }else if ($id == 2){
            $opcion = '<option value="'.$id.'"select>'.$cargo.'</option>';
         }else if ($id == 3){
            $opcion = '<option value="'.$id.'"select>'.$cargo.'</option>';
         }
    }
}


if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['usuario']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo'])
    || empty($_POST['edad']) || empty($_POST['telefono']) || empty($_POST['localidad']) || empty($_POST['cargo'])) 
{
    echo '<script language="javascript">alert("Todos los campos son obligatorios");</script>';

}else{
    include_once("db.php");
    
    
    $id = $_POST["id"];
    $usuario=$_POST["usuario"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $email=$_POST["correo"];
    $clave= md5($_POST["clave"]);
    $edad=$_POST["edad"];
    $telefono=$_POST["telefono"];
    $localidad=$_POST["localidad"];
    $puesto=$_POST["cargo"];
    $fecha=$_POST['fecha'];
    
        // echo "SELECT * FROM usuarios 
        // WHERE (usuario = '$usuario' AND $id != $id)  
        // OR    (correo = '$email' AND $id != $id)
        // OR    (telefono = '$telefono' AND $id != $id)";

        // exit;

//    echo "SELECT * FROM usuarios WHERE usuario = '$usuario'  OR correo = '$email' OR telefono = '$telefono'";
            $query = mysqli_query(conn(),"SELECT * FROM usuarios 
                                            WHERE (usuario = '$usuario' AND $id != $id)  
                                            OR    (correo = '$email' AND $id != $id)
                                            OR    (telefono = '$telefono' AND $id != $id)");
    $resul = mysqli_fetch_array($query);

    if($resul > 0){
        echo '<script language="javascript">alert("El correo o el usuario o el numero ya eexisten");</script>';
    }else{

        if(empty($_POST['clave'])){
                $sql_update = mysqli_query(conn(),"UPDATE usuarios
                                                SET usuario = '$usuario', nombre = '$nombre', apellido = '$apellido', correo ='$email', 
                                                edad = '$edad', telefono = '$telefono', localidad = '$localidad', id_cargo = '$puesto', fecha_actual = '$fecha'
                                                WHERE $id = $iduser");
                                                
        }else{
            $sql_update = mysqli_query(conn(),"UPDATE usuarios
                                                SET usuario = $usuario', nombre = '$nombre', apellido = '$apellido', correo ='$email', clave = '$clave', 
                                                edad = '$edad', telefono = '$telefono', localidad = '$localidad', id_cargo = '$puesto', fecha_actual = '$fecha'
                                                WHERE $id = $iduser");


        }

    $conexion=conn();
    // $sql="INSERT INTO usuarios (usuario, nombre, apellido, correo, clave, edad, telefono, localidad, id_cargo,fecha_actual) 
    // VALUES ('$usuario', '$nombre', '$apellido', '$email', '$clave', '$edad', '$telefono', '$localidad', '$puesto' , '$fecha')";
    // $resul = mysqli_query($conexion,$sql) or trigger_error("Error:",mysqli_error($conexion));

}if($sql_update){
    echo '<script language="javascript">alert("Usuario se actualizo correctamnete");</script>';
}else {
    echo '<script language="javascript">alert("Usuario no se actualizo correctamnete");</script>';
}
}
}

?>
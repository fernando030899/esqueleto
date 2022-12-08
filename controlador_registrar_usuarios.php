<?php
include_once("db.php");
if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['usuario']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo'])
     || empty($_POST['clave']) || empty($_POST['edad']) || empty($_POST['telefono']) || empty($_POST['localidad']) || empty($_POST['cargo'])) 
{
    echo '<script language="javascript">alert("Todos los campos son obligatorios");</script>';

}else{
    include_once("db.php");
    
    

    $usuario=$_POST["usuario"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $email=$_POST["correo"];
    $clave= md5($_POST["clave"]);
    $edad=$_POST["edad"];
    $telefono=$_POST["telefono"];
    $localidad=$_POST["localidad"];
    $puesto=$_POST["cargo"];
    
//    echo "SELECT * FROM usuarios WHERE usuario = '$usuario'  OR correo = '$email' OR telefono = '$telefono'";
    $query = mysqli_query(conn(),"SELECT * FROM usuarios WHERE usuario = '$usuario'  OR correo = '$email' OR telefono = '$telefono'");
    $resul = mysqli_fetch_array($query);

    if($resul > 0){
        echo '<script language="javascript">alert("El correo o el usuario o el numero ya eexisten");</script>';
    }else{

    $conexion=conn();
    $sql="INSERT INTO usuarios (usuario, nombre, apellido, correo, clave, edad, telefono, localidad, id_cargo,fecha_actual) 
    VALUES ('$usuario', '$nombre', '$apellido', '$email', '$clave', '$edad', '$telefono', '$localidad', '$puesto' , now())";
    $resul = mysqli_query($conexion,$sql) or trigger_error("Error:",mysqli_error($conexion));

}if($sql){
    echo '<script language="javascript">alert("Usuario se creo correctamnete");</script>';
}else {
    echo '<script language="javascript">alert("Usuario no se creo correctamnete");</script>';
}


}

}


?>
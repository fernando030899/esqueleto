<?php
function conn(){
$hostname = "localhost";
$usuairodb = "root";
$password = "";
$dbname = "rol";

$conexion=mysqli_connect("$hostname","$usuairodb","$password","$dbname");
return $conexion;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<style>
    
    .bajo{
        font-family: sans-serif;
        font-size: 20px;
        color:black;
    }
    .bajo div{
        width: 30%;
        height: 35%;
        padding:0;
        margin:0;
        background-color:red;
        border-radius:50%;
	    text-decoration: none;
    }
    .medio{
        font-family: sans-serif;
        color:black;
        font-size: 20px;
    }
    .medio div{
        width: 30%;
        height: 35%;
        padding:0;
        margin:0;
        background-color:yellow;
        border-radius:50%;
	    text-decoration: none;
    }
    .alto{
        font-family: sans-serif;
        font-size: 20px;
    }
    .alto div{
        width: 30%;
        height: 35%;
        padding:0;
        margin:0;
        color:white;
        background-color: green;
        border-radius:50%;
	    text-decoration: none;
    }

</style>

	

<?php
 include_once("db.php");


$fecha1 = $_POST['fecha1']; 
$fecha2	= $_POST['fecha2'];

?>
<html>
<head>    
		<title>pag</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../style.css">
</head>
<body>
    <table>
	<!-- <img src="../img/iconosh2.png"> -->
			<!-- <div id="barrabuscar">
		<form method="POST">
		<a onclick="location.href='../login/log.php'">Logout</a>
        <a onclick="location.href='../admi/lis_emp.php'">Empleados</a>
        <a onclick="location.href='../admi/admi.php'">Usuarios</a>
	    <input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		</form>
		</div> -->
		
		<tr><th colspan="9"><h1>Usuarios</h1><th colspan="2"><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Filtrar</a></th></tr>
			<tr>
			<th>id</th>
			<th>usuarios registrados</th>
			<th>riesgo</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{

}
else
{
$queryusuarios = mysqli_query(conn(), "SELECT count(*) from usuarios where fecha_actual between '$fecha1' and '$fecha2'");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['count(*)']."</td>";

			switch ($mostrar['count(*)']) {
				case ($mostrar['count(*)']<=1):
					echo "<td class=bajo><div>".$mostrar['count(*)']."</div></td>";
					break;
				case  ($mostrar['count(*)']<=4):
					echo "<td  class=medio><div>".$mostrar['count(*)']."</div></td>";
					break;
				case ($mostrar['count(*)']>=5):
					echo "<td class=alto><div>".$mostrar['count(*)']."</div></td>";
					break;
			};
}

        ?>
    </table>

</body>
</html>

</body>
</html>
<?php
include_once("db.php");
?>
<html>
<head>    
		<title>holis</title>
		<meta charset="UTF-8">
</head>
<body>
    <table>
	<!-- <img src="#"> -->
		
		<tr><th colspan="9"><h1>Usuarios</h1><th colspan="2"><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Filtrar</a></th></tr>
			<tr>
			<th>id</th>
			<th>usuario</th>
			<th>nombre</th>
            <th>apellido</th>
            <th>clave</th>
            <th>edad</th>
            <th>telefono</th>
            <th>cargo</th>
            <th>Fecha</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query(conn(), "SELECT id_venta FROM ventas where id_venta like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query(conn(), "SELECT * FROM usuarios ORDER BY id asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id']."</td>";
            echo "<td>".$mostrar['usuario']."</td>";
            echo "<td>".$mostrar['apellido']."</td>";    
			echo "<td>".$mostrar['clave']."</td>";  
			echo "<td>".$mostrar['edad']."</td>";  
			echo "<td>".$mostrar['localidad']."</td>";  
			echo "<td>".$mostrar['id_cargo']."</td>";  
			echo "<td>".$mostrar['fecha_actual']."</td>";  


}
        ?>
    </table>

	<script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>
<div class="caja_popup" id="formregistrar">
  <form action="filtro_fecha.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Filtrar por fechas</th></tr>
            <tr> 
                <td>Fecha 1</td>
                <td><input type="text" name="fecha1" required></td>
            </tr>
            <tr> 
                <td>Fecha 2</td>
                <td><input type="text" name="fecha2" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Buscar" >
			</td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>

<!-- onClick="javascript: return confirm('¿Deseas registrar este empleado?');" -->
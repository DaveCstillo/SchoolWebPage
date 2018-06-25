<!--
*************************************************************************************************
*************************************************************************************************
********************************Developed by: David Castillo*************************************
********************************For: Vidal.GT Enterprise*****************************************
******************************************2018*******************************************************
*************************************************************************************************
-->
</!DOCTYPE html>
<html>
<head>
	<title>Colegio Waldorf Guatemala</title>

	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link href="https://fonts.googleapis.com/css?family=Cagliostro" rel="stylesheet">
</head>
<body class="cuerpo">


	<ul class="menuu">

		<li class="account">
			<img src="res/drawable-xhdpi/ic_account_circle.png">
			<span><?php session_start();
						echo $_SESSION['user'];
					?>
			</span>
			<a href="logout.php">Log Out</a>
		</li>
		<li><a href="homeC.php"><img src="res/drawable-xhdpi/ic_home.png"><span>HOME</span></a></li>

		<li><a href="#"><img src="res/drawable-xhdpi/ic_students.png"><span>Alumnos</span></a></li>

		<li><a href="reportes.php"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>


		<li><a href="cafeteria.php" class="special"><img src="res/drawable-xhdpi/ic_date_range.png"><span>Menu de la Cafeter&iacute;a</span></a></li>

		<li><a href="avisos.php" class="speciallink"><img src="res/drawable-xhdpi/ic_date_range.png"><span>Avisos Importantes</span></a></li>
		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

	<div>

<form action="" method="get" >
		<select name="clases" class="selectable">
			<option value="nada">Seleccione clase</option>
			<option value="prepa">Preparatoria</option>
			<option value="unoprimaria">Primero Primaria</option>
			<option value="dosprimaria">Segundo Primaria</option>
			<option value="tresprimaria">Tercero Primaria</option>
			<option value="cuatroprimaria">Cuarto Primaria</option>
			<option value="cincoprimaria">Quinto Primaria</option>
			<option value="seisprimaria">Sexto Primaria</option>
			<option value="unobasico">Primero Basico</option>
			<option value="dosbasico">Segundo Basico</option>
			<option value="tresbasico">Tercero Basico</option>
		</select>

		<input type="submit" class="bttns codbtn" title="Aceptar">
</form>

	</div>
		</div>
	<?php
			$host = "localhost";
 			$user = "id5209742_davecstillo";
 			$pw = "holahahaz";
 			$db = "id5209742_servertestdata";

 	//	$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");


 		
if(isset($_GET["clases"])){
		$clase = $_GET["clases"];
		
		
		if($clase=="nada"){
			echo "Ingrese algo valido";
		}else{
 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 		//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");
//session_start();
 		$queryAlm = "SELECT * FROM Estudiantes WHERE Grado='{$clase}'";


 		$result = $con->query($queryAlm);
?>
 		<br/> <table class="tablilla">
 				<tr>
 					<td><span class="tit" >Codigo_alumno:</span></td>
 					<td><span class="tit" >Nombres:</span> </td>
 					<td><span class="tit" >Apellidos:</span></td>
 					<td><span class="tit" >Grado:</span></td>
 					<td><span class="tit" >Edad:</span></td>
 					<td><span class="tit" >Codigo_tutor:</span></td>
 					<td><span class="tit" >Apellidos_tutor:</span></td>

 				</tr>




<?php
 		while($fila = mysqli_fetch_array($result)){

 			$CodTutor = $fila['Codigo_tutor'];

 		$queryTut = "SELECT * FROM Padres WHERE Codigo_padres='{$CodTutor}'";
 		$qresult = $con->query($queryTut);
 			echo"<form action='EditAlm.php' method='get' class='tablilla'>";
 		while($res = mysqli_fetch_array($qresult)){
 			echo "<tr>";
 			echo "<td><span> $fila[Codigo_alumno] </span> </td>";
 			echo "<td><span> $fila[Nombres] </span> </td>";
 			echo "<td><span> $fila[Apellidos]</span> </td> ";
 			echo "<td><span> $fila[Grado]</span> </td> ";
 			echo "<td><span> $fila[Edad]</span> </td> ";
 			echo "<td><span> $res[Codigo_padres]</span> </td> ";
 			echo "<td><span> $res[Apellidos]</span> </td> ";
 			echo "<td><input type='submit' value='Editar' class='bttns'></td>";
 			echo "<input type='hidden' name='codAlm' value='$fila[Codigo_alumno]'>";
 			echo "</tr>";
 		}
 			echo '</form>';
 		}
 		echo "</table>";
 	}
 }

		?>

		<p>

		</p>

		

</body>
</html>
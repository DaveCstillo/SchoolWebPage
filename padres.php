<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){

}else{
	echo "La pagina es solo para usuarios.";
	echo "<a href='index.php'>Login</a>";
	exit;

}

$now = time();

if($now > $_SESSION['expire']){
	session_destroy();
	echo "su session ha expirado";
	echo "<a href='index.php'>Login</a>";
	exit;
}

?>
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

		<li><a href="alumnos.php"><img src="res/drawable-xhdpi/ic_student_face.png"><span>Alumnos</span></a></li>
		<li><a href="profesores.php"><img src="res/drawable-xhdpi/ic_teachers.png"><span>Profesores</span></a></li>
		<li><a href="#"><img src="res/drawable-xhdpi/ic_supervisor.png"><span>Padres</span></a></li>

		<li><a href="reportes.php"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>


		<li><a href="cafeteria.php" class="special"><img src="res/drawable-xhdpi/ic_cafeteria.png"><span>Menu de la Cafeter&iacute;a</span></a></li>

		<li><a href="avisos.php" class="speciallink"><img src="res/drawable-xhdpi/ic_date_range.png"><span>Avisos Importantes</span></a></li>
		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

	
		</div>
	<?php
			$host = "localhost";
 			$user = "id5209742_davecstillo";
 			$pw = "holahahaz";
 			$db = "id5209742_servertestdata";

 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 
  		$queryPadre = "SELECT * FROM Padres";


 		$result = $con->query($queryPadre);
?>
<br/>
<h1 class="tittle tablilla">Padres de Familia</h1>
<br/>
<br/>
 		<br/> <table class="tablilla">
 				<tr>
 					<td><span class="tit" >Codigo:</span></td>
 					<!-- <td><span class="tit" >Nombres:</span> </td> -->
 					<td><span class="tit" >Apellidos:</span></td>
 					<td><span class="tit" >Usuario:</span></td>

 				</tr>




<?php
 		while($fila = mysqli_fetch_array($result)){

 		
 		// echo"<form action='EditProfe.php' method='get' class='tablilla'>";
 	
 			echo "<tr>";
 			echo "<td><span> $fila[Codigo_padres] </span> </td>";
 			// echo "<td><span> $fila[Nombres] </span> </td>";
 			echo "<td><span> $fila[Apellidos]</span> </td> ";
 			echo "<td><span> $fila[User]</span> </td> ";
 			// echo "<td><input type='submit' value='Editar' class='bttns'></td>";
 			// echo "<input type='hidden' name='codProfe' value='$fila[Codigo_catedratico]'>";
 			echo "</tr>";
 			// echo '</form>';
 		}
 		
 		echo "</table>";
 		

		?>

		<p class="tablilla">
			<a href="newPadre.php" class="bttns">Nuevo Padre</a>
		</p>

		

</body>
</html>
<!--
*************************************************************************************************
*************************************************************************************************
********************************Developed by: David Castillo*************************************
********************************For: Vidal.GT Enterprise*****************************************
******************************************2018*******************************************************
*************************************************************************************************
-->
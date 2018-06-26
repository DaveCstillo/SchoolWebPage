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
		<li><a href="home.php"><img src="res/drawable-xhdpi/ic_home.png"><span>HOME</span></a></li>

		<li><a href="notas.php"><img src="res/drawable-xhdpi/ic_book.png"><span>Notas</span></a></li>

		<li><a href="#"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>

		<li><a href="tareas.php"><img src="res/drawable-xhdpi/ic_create.png"><span>Tareas</span></a></li>
		
		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

<div class="frm">
	<b>
		Nuevo Reporte
	</b>
	<div>
</div>

	<!-- <h4>Reporte:</h4>
	 -->
</div>
		
		</div>

<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

 		
if(isset($_GET["codAlm"])){
		$codigoAlumno = $_GET["codAlm"];
		
 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 		//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");
//session_start();
 		$queryAlm = "SELECT * FROM Estudiantes WHERE Codigo_alumno='{$codigoAlumno}'";


 		$result = $con->query($queryAlm);
 		echo "<br/> <div class='tablilla'>";
 		while($fila = mysqli_fetch_array($result)){

 			echo"<form action='Report.php' method='post'>";
 			echo "<h4>Reporte</h4>";
 					echo "<span class='tit' >Codigo_alumno: </span>";
 					echo "<span> $fila[Codigo_alumno] </span> </br>";
 					echo "<span class='tit' >Nombres: </span> ";
 					echo "<span> $fila[Nombres] </span> ";

 			echo "</br></br>";
 			echo "<span class='tit'>Causa del Reporte: </span></br>";
 			echo "<input type='text' name='RTitle' class='inpt'></br>";
 			echo "<span class='tit'>Descripcion del Reporte: </span></br>";
 			echo "<textarea name='repTxt' cols='40' rows='5'></textarea></br>";
 			echo "<span class='tit'>Fecha del Reporte: </span></br>";
 			echo "<input type='date' name='fecha' class='inpt'></br>";
 			echo "</br></br>";
 			echo "<input type='submit' value='Reporte' class='bttns'>";
 			echo "<input type='hidden' name='codAlm' value='$fila[Codigo_alumno]'>";
 		
 			echo '</form>';
 		}
 		echo "</div>";
 	
 }

		?>



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
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
		<li><a href="padres.php"><img src="res/drawable-xhdpi/ic_supervisor.png"><span>Padres</span></a></li>
		<li><a href="clases.php"><img src="res/drawable-xhdpi/ic_book.png"><span>Clases</span></a></li>

		<li><a href="reportes.php"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>

		<li><a href="cafeteria.php" class="special"><img src="res/drawable-xhdpi/ic_cafeteria.png"><span>Menu de la Cafeter&iacute;a</span></a></li>


		<li><a href="avisos.php" class="speciallink"><img src="res/drawable-xhdpi/ic_date_range.png"><span>Avisos Importantes</span></a></li>

		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

		
	<?php
			$host = "localhost";
 			$user = "id5209742_davecstillo";
 			$pw = "holahahaz";
 			$db = "id5209742_servertestdata";

 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");


 		
if(isset($_GET["codProfe"])){
		$codProfe = $_GET["codProfe"];
		
 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 		//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");
//session_start();
 		$queryProfe = "SELECT * FROM Personal WHERE Codigo_catedratico='{$codProfe}'";


 		$result = $con->query($queryProfe);

 		while($fila = mysqli_fetch_array($result)){


 		echo "<form action='updtProfe.php' method='post'>";
 		echo "<br/> <div class='notasTabla'>";
 				echo "<ul class='listprof'>";
 				
 				echo 	"<li><span class='tittle' >Codigo Catedratico:</span></li>";
 				echo 	"<li><span class='conttnt inpts'>$fila[Codigo_catedratico]</span> </li>";
 				echo 	"<li><input type='hidden' value='$fila[Codigo_catedratico]' class='editnpt'name='codProfesor' /> </li>";
 				
 				echo 	"<li><span class='tittle' >Nombres:</span> </li>";
 				echo "<li><input type='text' value='$fila[Nombres]' class='conttnt inpts'name='ProfeName' /> </li>";
 				
 				echo 	"<li><span class='tittle' >Apellidos:</span></li>";
 				echo "<li><input type='text' value='$fila[Apellidos]' class='conttnt inpts'name='ProfeLName' /> </li> ";
 				
 				echo 	"<li><span class='tittle' >Puesto:</span></li>";
 				echo "<li><input type='text' value='$fila[Puesto]' class='conttnt inpts'name='ProfePuesto' /> </li> ";
 				echo 	"<li><span class='tittle' >Cargo:</span></li>";
 				echo "<li><input type='text' value='$fila[Cargo]' class='conttnt inpts'name='ProfeCargo' /> </li> ";
 				
 				echo 	"<li><span class='tittle' >Mail:</span></li>";
 				echo "<li><input type='text' value='$fila[Mail]' class='conttnt inpts'name='ProfeMail' /> </li> ";
 				
 				echo 	"<li><span class='tittle' >Telefono:</span></li>";
 				echo "<li><input type='text' value='$fila[Telefono]' class='conttnt inpts'name='ProfeTelefono' /> </li> ";

 				echo "</ul>";


 			}
			
 		echo "</div>";
 		echo "<input type='submit' class='bttns codbtn' title='Modificar Profesor' value='Aceptar'>";
 		echo "</form>";
 		}
 	
 

		?>
</div>
		<p>

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
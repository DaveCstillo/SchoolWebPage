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

		<li><a href="reportes.html"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>

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


 		
if(isset($_GET["codClase"])){
		$codClase = $_GET["codClase"];
		
 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 		//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");
//session_start();
 		$queryClass = "SELECT * FROM Clases WHERE Codigo_clase='{$codClase}'";


 		$result = $con->query($queryClass);

 		while($fila = mysqli_fetch_array($result)){

 		$queryProf = "SELECT * FROM Personal";
 		$qresult = $con->query($queryProf);



 		echo "<form action='updtClass.php' method='post'>";
 		echo "<br/> <div class='notasTabla'>";
 				echo "<ul class='list'>";
 				
 				echo 	"<li><span class='tittle' >Codigo clase:</span></li>";
 				echo 	"<li><span class='conttnt inpts'>$fila[Codigo_clase]</span> </li>";
 				echo 	"<li><input type='hidden' value='$fila[Codigo_clase]' class='editnpt'name='codClase' /> </li>";
 				
 				echo 	"<li><span class='tittle' >Nombre:</span> </li>";
 				echo "<li><input type='text' value='$fila[Nombre_Clase]' class='conttnt inpts'name='ClassName' /> </li>";
 				
 			
 				echo 	"<li><span class='tittle' >Catedratico asignado:</span></li>";
			echo "<li><select name='codigoC'class='selectable'>";

 			while($res = mysqli_fetch_array($qresult)){
 				$codego = $res['Codigo_catedratico'] . " - " . $res['Nombres'];
				
			echo "<option value='$res[Codigo_catedratico]'>$codego</option>";
 			}
			echo "</select></li>";

 				echo "</ul>";


 			}
			
 		echo "</div>";
 		echo "<input type='submit' class='bttns codbtn' title='Modificar Clase' value='Aceptar'>";
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
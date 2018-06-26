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


 		
if(isset($_GET["codAlm"])){
		$codAlm = $_GET["codAlm"];
		
 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 		//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");
//session_start();
 		$queryAlm = "SELECT * FROM Estudiantes WHERE Codigo_alumno='{$codAlm}'";


 		$result = $con->query($queryAlm);

 		while($fila = mysqli_fetch_array($result)){

 		$queryTut = "SELECT * FROM Padres";
 		$qresult = $con->query($queryTut);



 		echo "<form action='updtAlm.php' method='post'>";
 		echo "<br/> <div class='notasTabla'>";
 				echo "<ul class='list'>";
 				
 				echo 	"<li><span class='tittle' >Codigo_alumno:</span></li>";
 				echo 	"<li><span class='conttnt inpts'>$fila[Codigo_alumno]</span> </li>";
 				echo 	"<li><input type='hidden' value='$fila[Codigo_alumno]' class='editnpt'name='codAlumno' /> </li>";
 				
 				echo 	"<li><span class='tittle' >Nombres:</span> </li>";
 				echo "<li><input type='text' value='$fila[Nombres]' class='conttnt inpts'name='AlumnoName' /> </li>";
 				
 				echo 	"<li><span class='tittle' >Apellidos:</span></li>";
 				echo "<li><input type='text' value='$fila[Apellidos]' class='conttnt inpts'name='AlumnoLName' /> </li> ";
 				
 				echo 	"<li><span class='tittle' >Grado:</span></li>";
 				 		echo "<select name='clases' class='selectable'>";
							echo "<option value='nada'>Seleccione clase</option>";
							echo "<option value='prepa'>Preparatoria</option>";
							echo "<option value='unoprimaria'>Primero Primaria</option>";
							echo "<option value='dosprimaria'>Segundo Primaria</option>";
							echo "<option value='tresprimaria'>Tercero Primaria</option>";
							echo "<option value='cuatroprimaria'>Cuarto Primaria</option>";
							echo "<option value='cincoprimaria'>Quinto Primaria</option>";
							echo "<option value='seisprimaria'>Sexto Primaria</option>";
							echo "<option value='unobasico'>Primero Basico</option>";
							echo "<option value='dosbasico'>Segundo Basico</option>";
							echo "<option value='tresbasico'>Tercero Basico</option>";
						echo "</select>";
 				
 				echo 	"<li><span class='tittle' >Edad:</span></li>";
 				echo "<li><input type='text' value='$fila[Edad]' class='conttnt inpts'name='AlumnoEdad' /> </li> ";
 				
 				echo 	"<li><span class='tittle' >Codigo_tutor:</span></li>";
			echo "<li><select name='codTutor' class='selectable'>";

 			while($res = mysqli_fetch_array($qresult)){
				
			echo "<option value='$res[Codigo_padres]' name='codigoP'>$res[Codigo_padres]</option>";
 			}
			echo "</select></li>";

 				echo "</ul>";


//TODO:: Arreglarlo para que sea una lista y no una tabla
 			}
			
 		echo "</div>";
 		echo "<input type='submit' class='bttns codbtn' title='Ingresar Notas' value='Aceptar'>";
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
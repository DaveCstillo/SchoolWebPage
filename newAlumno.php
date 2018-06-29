<?php
session_start();

			$host = "localhost";
 			$user = "id5209742_davecstillo";
 			$pw = "holahahaz";
 			$db = "id5209742_servertestdata";

 			$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");

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

		<li><a href="reportesC.php"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>

		<li><a href="cafeteria.php" class="special"><img src="res/drawable-xhdpi/ic_cafeteria.png"><span>Menu de la Cafeter&iacute;a</span></a></li>


		<li><a href="avisos.php" class="speciallink"><img src="res/drawable-xhdpi/ic_date_range.png"><span>Avisos Importantes</span></a></li>

		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

	<div>
		<form action="" method='post'>
		<br/> <div class='notasTabla'>
			<ul class='list'>
				<li><span class='tittle' >Codigo del Alumno:</span></li>
				<li><input type='text' class='conttnt inpts'name='codAlm' /> </li>
				<li><span class='tittle' >Nombres:</span></li>
				<li><input type='text' class='conttnt inpts'name='AlmName' /> </li>
				<li><span class='tittle' >Apellidos:</span></li>
				<li><input type='text' class='conttnt inpts'name='AlmLName' /> </li>
				<li><span class='tittle' >Grado:</span></li>
 				 		<li><select name='Almclase' class='selectable'>
							<option value='nada'>Seleccione clase</option>
							<option value='prepa'>Preparatoria</option>
							<option value='unoprimaria'>Primero Primaria</option>
							<option value='dosprimaria'>Segundo Primaria</option>
							<option value='tresprimaria'>Tercero Primaria</option>
							<option value='cuatroprimaria'>Cuarto Primaria</option>
							<option value='cincoprimaria'>Quinto Primaria</option>
							<option value='seisprimaria'>Sexto Primaria</option>
							<option value='unobasico'>Primero Basico</option>
							<option value='dosbasico'>Segundo Basico</option>
							<option value='tresbasico'>Tercero Basico</option>
						</select></li>
				<li><span class='tittle' >Edad:</span></li>
				<li><input type='text' class='conttnt inpts'name='AlmEdad' /> </li>
 				<li><span class='tittle' >Tutor:</span></li>
				<li><select name='codTutor' class='selectable'>
				<?php 
					$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");

					$queryTut = "SELECT * FROM Padres";
 					$qresult = $con->query($queryTut);

 					while($fila = mysqli_fetch_array($qresult)){
					$tutor = $fila['Codigo_padres'] . " - " . $fila['Apellidos'];
				
					echo "<option value='$fila[Codigo_padres]' name='codA'>$tutor</option>";
 					}

				?>
			</select></li>
			</ul>
		</div>
				<input type='submit' class='bttns codbtn' title='Ingresar Alumno' value='Aceptar'>
	</form>
	</div>
	<?php
 			$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");

			
	if(isset($_POST["codAlm"])&& isset($_POST["AlmName"]) && isset($_POST["AlmLName"]) && isset($_POST["Almclase"]) && isset($_POST["AlmEdad"]) && isset($_POST["codTutor"])){
		if($_POST["codAlm"] == "" || $_POST["AlmName"] == "" || $_POST["AlmLName"] == "" || $_POST["Almclase"] == "nada"|| $_POST["AlmEdad"] == "" || $_POST["codTutor"] == ""){
			echo "Faltan algunos datos";
		}else{

		$codigo = $_POST["codAlm"];
		$nombres = $_POST["AlmName"];
		$apellidos = $_POST["AlmLName"];
		$clase = $_POST["Almclase"];
		$edad = $_POST["AlmEdad"];
		$tutor = $_POST["codTutor"];		


 		$queryAlmn = "INSERT INTO `Estudiantes` (`Codigo_alumno`, `Codigo_tutor`, `Nombres`, `Apellidos`, `Grado`, `Edad`) VALUES ('{$codigo}','{$tutor}','{$nombres}','{$apellidos}','{$clase}','{$edad}')";


 		$result = $con->query($queryAlmn);

 		if($result){
 			echo "ingresado";
 			//header('Location: /alumnos.php');die();
 		}else{
 			echo "No se ingreso";
 		}
 	
 	 }
	}else if(isset($_GET['new']) && $_GET['new'] == 1) {
		echo "No deje ningun espacio sin llenar";
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
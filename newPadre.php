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
			<ul class='listtut'>
				<li><span class='tittle' >Codigo Padre:</span></li>
				<li><input type='text' class='conttnt inpts'name='codPadre' /> </li>
				<li><span class='tittle' >Apellidos:</span></li>
				<li><input type='text' class='conttnt inpts'name='PadreLName' /> </li>
				<li><span class='tittle' >Usuario:</span></li>
				<li><input type='text' class='conttnt inpts'name='PadreUser' /> </li>
				<li><span class='tittle' >Contraseña:</span></li>
				<li><input type='text' class='conttnt inpts'name='PadrePass' /> </li>

			</ul>
		</div>
				<input type='submit' class='bttns codbtn' title='Ingresar Padre' value='Aceptar'>
	</form>
	</div>
	<?php
			$host = "localhost";
 			$user = "id5209742_davecstillo";
 			$pw = "holahahaz";
 			$db = "id5209742_servertestdata";
	
	if(isset($_POST["codPadre"]) && isset($_POST["PadreLName"]) && isset($_POST["PadreUser"]) && isset($_POST["PadrePass"])){
		if($_POST["codPadre"] == "" || $_POST["PadreLName"] == "" || $_POST["PadreUser"] == "" || $_POST["PadrePass"] == ""){
			echo "Faltan algunos datos";
		}else{

		$codigo = $_POST["codPadre"];
		$apellidos = $_POST["PadreLName"];
		$usuario = $_POST["PadreUser"];
		$password = $_POST["PadrePass"];


 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");

 		$queryPadre = "INSERT INTO `Padres` (`Codigo_padres`, `Apellidos`, `User`, `Pass`) VALUES ('{$codigo}', '{$apellidos}', '{$usuario}', '{$password}');'";


 		$result = $con->query($queryPadre);

 		if($result){
 			header('Location: /padres.php');die();
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
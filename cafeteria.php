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



			$host = "localhost";
 			$user = "id5209742_davecstillo";
 			$pw = "holahahaz";
 			$db = "id5209742_servertestdata";

 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
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

		<li><a href="reportes.php"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>


		<li><a href="#" class="special"><img src="res/drawable-xhdpi/ic_cafeteria.png"><span>Menu de la Cafeter&iacute;a</span></a></li>

		<li><a href="avisos.php" class="speciallink"><img src="res/drawable-xhdpi/ic_date_range.png"><span>Avisos Importantes</span></a></li>
		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

	<div>
		<form enctype="multipart/form-data" action="setMenu.php" method="POST">
			<div>
				<b>
					Menu de la Cafeteria
				</b>
				<h4>Nuevo Menu:</h4>
				<p>
					<h2>Imagen del Menu</h2>	
					<input name="uploadedfile" type="file" /><br/><br/>
					<input type="submit" value="Subir contenido" class="bttns" />
				</p>
			</div>
		</form>
	</div>
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
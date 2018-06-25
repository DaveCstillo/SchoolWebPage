	<?php
			$host = "localhost";
 			$user = "id5209742_davecstillo";
 			$pw = "holahahaz";
 			$db = "id5209742_servertestdata";

 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
 		// if(isset($_GET["uss"])){
 		// 	$usser=$_GET['uss'];
 		// }

 		// $usser

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
		<li><a href="#"><img src="res/drawable-xhdpi/ic_home.png"><span>HOME</span></a></li>

		<li><a href="alumnos.php"><img src="res/drawable-xhdpi/ic_students.png"><span>Alumnos</span></a></li>

		<li><a href="reportes.php"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>

		<li><a href="cafeteria.php" class="special"><img src="res/drawable-xhdpi/ic_date_range.png"><span>Menu de la Cafeter&iacute;a</span></a></li>


		<li><a href="avisos.php" class="speciallink"><img src="res/drawable-xhdpi/ic_date_range.png"><span>Avisos Importantes</span></a></li>
		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

	<div>
		<form enctype="multipart/form-data" action="uploader.php" method="POST">
			<div>
				<b>
					Bolet&iacute;n Informativo
				</b>
				<h4>28 de mayo al 1 de junio 2018</h4>
				<p>
					<h2>Titulo</h2>
					<input type="text" name="titulo"/>
					<h2>Descripcion</h2>
					<textarea cols="40" rows="5" type="text" name="descripcion"></textarea>
				</p>
				<input name="uploadedfile" type="file"/><br/>
				<input type="submit" value="Subir contenido" class="bttns" />
			</div>
		</form>
	</div>
		</div>

		<p>

		</p>

		

</body>
</html>
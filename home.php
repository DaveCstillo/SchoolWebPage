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

		<li><a href="notas.php"><img src="res/drawable-xhdpi/ic_book.png"><span>Notas</span></a></li>

		<li><a href="reportes.php"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>

		<li><a href="tareas.php"><img src="res/drawable-xhdpi/ic_create.png"><span>Tareas</span></a></li>

		<!-- <li><a href="horarios.html"><img src="res/drawable-xhdpi/ic_date_range.png"><span>Horarios</span></a></li> -->
		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

	<div>
			<div>
				<b>
					Bolet&iacute;n Informativo
				</b>
				<h4>28 de mayo al 1 de junio 2018</h4>
				<p>
	<?php
			$host = "localhost";
 			$user = "id5209742_davecstillo";
 			$pw = "holahahaz";
 			$db = "id5209742_servertestdata";

 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		

 		$query = "SELECT * FROM `FeedInformativo`";

 		$result = $con->query($query);
 			while($fila = mysqli_fetch_array($result)){

 				$titulo = $fila['Titulo'];
 				$desc = $fila['Descripcion'];
 				$imagen = $fila['Imagen'];


				echo "<div>";
				echo "<span>$titulo</span><br/>";
				echo "<span>$desc</span><br/>";
				echo "<br/>";
				echo "<img src='uploads/$imagen'>"; 				
				echo "";
				echo "</div>";

 			}




		?>
			</div>
		
	</div>
		</div>

		<p>

		</p>

		

</body>
</html>
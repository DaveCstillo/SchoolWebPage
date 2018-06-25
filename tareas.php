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

		<li><a href="reportes.php"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>

		<li><a href="#"><img src="res/drawable-xhdpi/ic_create.png"><span>Tareas</span></a></li>

		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

<div class="frm">
	<b>
		Nueva Tarea
	</b>
	<div>
	
<form action="" method="get" >
		<select name="clases" class="selectable">
			<option value="nada">Seleccione clase</option>
			<option value="prepa">Preparatoria</option>
			<option value="unoprimaria">Primero Primaria</option>
			<option value="dosprimaria">Segundo Primaria</option>
			<option value="tresprimaria">Tercero Primaria</option>
			<option value="cuatroprimaria">Cuarto Primaria</option>
			<option value="cincoprimaria">Quinto Primaria</option>
			<option value="seisprimaria">Sexto Primaria</option>
			<option value="unobasico">Primero Basico</option>
			<option value="dosbasico">Segundo Basico</option>
			<option value="tresbasico">Tercero Basico</option>
		</select>

	<input type="submit" value="Aceptar" class="bttns" title="Aceptar">	
</form>
</div>

</div>
		
		</div>

<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

 		
if(isset($_GET["clases"])){
		$clase = $_GET["clases"];
		
		session_start();

		if($clase=="nada"){
			echo "Ingrese algo valido";
		}else{
 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 		//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");
//session_start();

 	//	$MaestroQuery = "SELECT * FROM "

$today = date("d-m-Y");
 		echo "<form action='setTareas.php' method='post' class='tablilla homework'>";
 		echo "<br/> <div>";
 				echo "<ul class='list'>";
 				
 				echo "<li><span class='tittle' >Codigo_catedratico:</span></li>";
 				echo "<li><span class='conttnt inpts'>{$_SESSION['codMaestro']}</span> </li>";
 				echo "<li><input type='hidden' value='{$_SESSION['codMaestro']}' name='codMaestro'/></li>";
 				echo "<li><span class='tittle' >Clase:</span></li>";
 				echo "<li><span class='conttnt inpts'>{$_SESSION['cargo']}</span> </li>";
 				echo "<li><input type='hidden' value='{$_SESSION['cargo']}' name='materia'/></li>";
 		

 				echo "<li><span class='tittle' >Tarea:</span> </li>";
 				echo "<li><textarea name='tarea' cols='40' rows='5'></textarea></li>";

 				echo "<li><input type='hidden' value='{$clase}' name='grado'/></li>";
 				echo "<li><span class='tittle' >Fecha de Asignacion:</span></li>";
 	 			echo "<li><input type='text' name='fechaEmision' class='inpt' readonly value='{$today}'></li>";
 	 			echo "<li><span class='tittle' >Fecha de entrega:</span></li>";
 	 			echo "<li><input type='date' name='fechaEntrega' class='inpt'></li>";

 	 			echo "<li><input type='submit' class='bttns' value='Subir Tarea'";
 	 			echo "</ul>";
 	 			echo "</div>";
 	 			echo "</form>";



 		}
}

		?>



</body>
</html>
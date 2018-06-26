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

		<li><a href="#"><img src="res/drawable-xhdpi/ic_book.png"><span>Notas</span></a></li>

		<li><a href="reportes.php"><img src="res/drawable-xhdpi/ic_assignment.png"><span>Reportes</span></a></li>

		<li><a href="tareas.php"><img src="res/drawable-xhdpi/ic_create.png"><span>Tareas</span></a></li>

		<li><a href="#" class="speciallink"><img src="res/drawable-xhdpi/ic_message.png"><span>Mensajes de padres</span></a></li>
	</ul>


	<div class="contenido">
		
	<img src="LogoWaldorf.png" class="logo">

	<div class="frm">
		<b> Seleccione la clase a evaluar: </b>

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

		<select name="notas" class="selectable">
			<option value="nota1" selected>Nota 1</option>
			<option value="nota2">Nota 2</option>
			<option value="parcial1">Parcial 1</option>
			<option value="nota3">Nota 3</option>
			<option value="nota4">Nota 4</option>
			<option value="parcial2">Parcial 2</option>
			<option value="zona">Zona</option>
			<option value="final">Final</option>
		</select>

		<input type="submit" class="bttns codbtn" title="Enviar" value="Aceptar">
</form>

	</div>
<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

 		
if(isset($_GET["clases"]) && isset($_GET["notas"])){
		$clase = $_GET["clases"];
		$nota = $_GET["notas"];
		
		if($clase=="nada"){
			echo "Ingrese algo valido";
		}else{
 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 		//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");
//session_start();
 		$query = "SELECT * FROM Estudiantes WHERE Grado='{$clase}'";
 		$result = $con->query($query);
?>
 		<form action="subgrades.php" method="post">
 		<br/> <table class="notasTabla">
 				<tr>
 					<td><span class="tit" >Codigo_alumno:</span></td>
 					<td><span class="tit" >Nombres:</span> </td>
 					<td><span class="tit" >Apellidos:</span></td>
 					<td><span class="tit" ><?= $nota; ?></span></td>
 				</tr>
<?php
 		while($fila = mysqli_fetch_array($result)){


 			echo "<tr>";
 			echo "<td><span> $fila[Codigo_alumno] </span> </td>";
 			echo "<td><span> $fila[Nombres] </span> </td>";
 			echo "<td><span> $fila[Apellidos]</span> </td> ";
 			echo "<input type='hidden' name='codalumno[]' value='$fila[Codigo_alumno]'>";
 			echo "<input type='hidden' name='casilla' value='$nota'>";
 			echo "<input type='hidden' name='grado' value='$clase'>";
 			echo "<td> <input type='text' class='inpts gradeinpt' name='nota[]'>";
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "<input type='submit' class='bttns codbtn' value='Ingresar Notas' title='Enviar'>";
 		echo "</form>";
 	}
 }

?>


</div>
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
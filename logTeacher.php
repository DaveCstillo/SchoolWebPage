<?php

 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";
$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
session_start();
$errorMsg="";
$validUser = false;
	if(isset($_POST["user"]) && isset($_POST["pass"])){

		
		$User = $con->real_escape_string($_POST['user']);
		$Pass = $con->real_escape_string($_POST['pass']);

		
		$query = "SELECT * FROM Personal WHERE USER='{$User}' and PASS='{$Pass}'";

		

		if($result = $con->query($query)){

			if($registro = mysqli_fetch_array($result)){
 				$validUser=true;
 				$_SESSION['cargo'] = $registro['Cargo'];
 				$_SESSION['user'] = $User;
 				$_SESSION['codMaestro'] = $registro['Codigo_catedratico'];
 				$puesto = $registro['Puesto'];

			}else{
				$validUser = false;
			}	
			mysqli_close($con);
			

		}else{
 			$errorMsg="Base de datos no encontrada";
		}
	}else{
			$errorMsg="Datos incompletos";
	}
//?uss={$_SESSION['user']}
		$cat = "Catedratico";;
		$dir = "Director";
		$comp1 = strcmp($puesto,$cat);
		$comp2 = strcmp($puesto, $dir);
	if($validUser){
 			if($comp1==0){
 				//	echo "home";
 					header("Location: /home.php");die();
 				}
 				if(comp2==0){
 			//		echo "homeC";
 					header("Location: /homeC.php");die();
 	 			}
 			}else{
 				$errorMsg="Usuario o Contraseña incorrecto";
 			}
		?>
</!DOCTYPE html>
<html>
<head>
	<title>Colegio Waldorf Guatemala</title>

	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link href="https://fonts.googleapis.com/css?family=Cagliostro" rel="stylesheet">
</head>
<body class="cuerpo" style="background-color: #F1FAEF">

	<div class="login">
		
	<img src="LogoWaldorf.png" class="logo">
	
		<div class="error"><?= $errorMsg ?></div>
	</div>
</body>
</html>
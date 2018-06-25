<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
	session_start();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		
	if(!empty($_POST["codalumno"]) && is_array($_POST["codalumno"]) && !empty($_POST["nota"]) && is_array($_POST["nota"])){
			$casilla = $_POST["casilla"];
			$grado = $_POST["grado"];
		foreach ($_POST["codalumno"] as $codalumno) {
			$codalmn[]=$codalumno;
			//echo "$apellidos";
				
			}
		foreach ($_POST["nota"] as $nota) {	
				$notas[]=$nota;
				//echo "$nota";
			}

		echo $_SESSION['cargo'];

		for($i=0;$i<count($codalmn);$i++){

			$queryisrt = "INSERT INTO `Notas_{$grado}_{$_SESSION['cargo']}`(`Codigo_alumno`, `{$casilla}`) VALUES ('{$codalmn[$i]}','{$notas[$i]}')";
			$queryupdt = "UPDATE `Notas_{$grado}_{$_SESSION['cargo']}` SET `{$casilla}` = '{$notas[$i]}' WHERE `Codigo_alumno` = '{$codalmn[$i]}'";

			//UPDATE `Notas_tresbasico_matematicas` SET `nota2`="" WHERE `Codigo_alumno` 

			if($result = $con->query($queryisrt)){
				echo "Notas ingresadas correctamente";
			}else if($result = $con->query($queryupdt)){
				echo "Notas ingresadas correctamente";
			}else{
				echo "Error";
			}
		}

		echo $_SESSION['user'];

	}




		
		
		// $apellidos = $_GET["apellidos"];
		// $nota = $_GET["nota"];
 		
 	// 	//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");

 	// 	$query = "SELECT * FROM Estudiantes WHERE Apellidos='{$apellidos}'";
 	// 	$result = $con->query($query);

 	// 	echo "Listado... <br/> <table>";
 	// 	echo "<tr><td><span class='tit' >Nombres:</span> </td><td><span class='tit' >Apellidos:</span></td></tr>";

 	// 	if($fila = mysqli_fetch_array($result)){


 	// 		echo "<tr>";
 	// 		echo "<td> $fila[Nombres] </td>";
 	// 		echo "<td> $fila[Apellidos] </td> ";
 	// 		echo "</tr>";
 	// 	}
 	


?>

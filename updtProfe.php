<?php

 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
	session_start();

	if(isset($_POST['codProfesor']) && isset($_POST['ProfeName']) && isset($_POST['ProfeLName']) && isset($_POST['clases']) && isset($_POST['ProfePuesto']) && isset($_POST['ProfeCargo']) && isset($_POST['ProfeMail']) && isset($_POST['ProfeTelefono'])){

			$codProfe = $_POST['codProfesor'];
			$ProfeName = $_POST['ProfeName'];
			$ProfeLName = $_POST['ProfeLName'];
			$ProfePuesto = $_POST['ProfePuesto'];
			$ProfeCargo = $_POST['ProfeCargo'];
			$ProfeMail = $_POST['ProfeMail'];
			$ProfeTelefono = $_POST['ProfeTelefono'];


			$queryupdt = "UPDATE `Personal` SET `Codigo_catedratico` = '{$codProfe}', `Nombres` = '{$ProfeName}', `Apellidos` = '{$ProfeLName}', `Puesto` = '{$ProfePuesto}', `Cargo` = '{$ProfeCargo}', `Mail` = '{$ProfeMail}', `Telefono` = '{$ProfeTelefono}' WHERE `Codigo_catedratico` = '{$codProfe}'";


			if($result = $con->query($queryupdt)){
				// echo "Profe actualizado correctamente";
				header("Location: /profesores.php");die();
			}else{
				echo "Error";
			}
		
		
	}

?>
<!--
*************************************************************************************************
*************************************************************************************************
********************************Developed by: David Castillo*************************************
********************************For: Vidal.GT Enterprise*****************************************
******************************************2018*******************************************************
*************************************************************************************************
-->
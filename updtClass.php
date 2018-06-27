<?php

 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
	session_start();

		
	if(isset($_POST['codClase']) && isset($_POST['ClassName']) && isset($_POST['codigoC'])){


			$codClase = $_POST['codClase'];
			$className = $_POST['ClassName'];
			$codigoC = $_POST['codigoC'];



			$queryupdt = "UPDATE `Clases` SET `Nombre_Clase`='{$className}',`catedratico_asignado`= '{$codigoC}' WHERE `Codigo_clase` = '{$codClase}'";

			if($result = $con->query($queryupdt)){
				// echo "Clase actualizada correctamente";
				header("Location: /clases.php");die();
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
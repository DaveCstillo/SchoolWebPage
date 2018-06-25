<?php

 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
	session_start();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		
	if(isset($_POST['RTitle']) && isset($_POST['repTxt']) && isset($_POST['codAlm']) && isset($_POST['fecha'])){
			
			

			$codAlm = $_POST['codAlm'];
			$rTit = $_POST['RTitle'];
			$reportTxt = $_POST['repTxt'];
			$fechaRep= $_POST['fecha'];

			$queryupdt = "INSERT INTO `Reportes` (`Codigo_alumno`, `Titulo`, `Descripcion`, `Fecha_reporte`) VALUES ('{$codAlm}','{$rTit}','{$reportTxt}', '{$fechaRep}')";




			//UPDATE `Notas_tresbasico_matematicas` SET `nota2`="" WHERE `Codigo_alumno` 

			if($result = $con->query($queryupdt)){
				// echo "Reporte ingresado correctamente";
				header("Location: /ReportAlm.php"); die();
			}else{
				echo "Error";
			}
		
		}else{
			echo "Ingrese algo valido";
}






?>
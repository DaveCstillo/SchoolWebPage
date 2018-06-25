<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
		$json = array();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		
	if(isset($_GET['codAlm'])){
			$codigoAlumno = $_GET['codAlm'];

			$queryReports = "SELECT * FROM `Reportes` WHERE `Codigo_alumno` = '{$codigoAlumno}'";
			$res = $con->query($queryReports);
			if($res){
				while($fila = mysqli_fetch_array($res)){
				
 					$alm["ID"]=$fila["ID"];
 					$alm["Codigo_alumno"]=$fila["Codigo_alumno"];
 					$alm["Causal"]=$fila["Titulo"];
 					$alm["Descripcion"]=$fila["Descripcion"];
 					$alm["Fecha_reporte"]=$fila["Fecha_reporte"];
 					$json["Reporte"][]=$alm;

 				}
 			
 			}
 			else{
					$alm["Result"]=$fila["No Encontrado"];
 					$json["Reporte_Alumno"][]=$alm;
 					//echo json_encode($json);
				}
 			}
 			mysqli_close($con);
 			echo json_encode($json);

		
	

?>
<!--
*************************************************************************************************
*************************************************************************************************
********************************Developed by: David Castillo*************************************
********************************For: Vidal.GT Enterprise*****************************************
******************************************2018*******************************************************
*************************************************************************************************
-->
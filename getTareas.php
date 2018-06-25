<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
		$json = array();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		
	if(isset($_GET['grado'])){
			$Grado = $_GET['grado'];

			$queryReports = "SELECT * FROM `tareas_{$Grado}`";
			$res = $con->query($queryReports);
			if($res){
				while($fila = mysqli_fetch_array($res)){
				
 					$hmwk["ID"]=$fila["ID"];
 					$hmwk["codigo_Catedratico"]=$fila["codigo_Catedratico"];
 					$hmwk["Materia"]=$fila["Materia"];
 					$hmwk["Tarea"]=$fila["Tarea"];
 					$hmwk["Fecha_Emision"]=$fila["FechaEmision"];
 					$hmwk["Fecha_Entrega"]=$fila["FechaEntrega"];
 					$json["Tarea"][]=$hmwk;

 				}
 			
 			}
 			else{
					$alm["Result"]=$fila["No Encontrado"];
 					$json["Tarea_Alumno"][]=$alm;
 					//echo json_encode($json);
				}
 			}
 			mysqli_close($con);
 			echo json_encode($json);

		
	

?>
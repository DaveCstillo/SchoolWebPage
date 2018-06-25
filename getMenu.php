<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
		$json = array();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])

			$queryReports = "SELECT * FROM `menuCafeteria`";
			$res = $con->query($queryReports);
			if($res){
				while($fila = mysqli_fetch_array($res)){
				
 					$menuC["ID"]=$fila["ID"];
 					$menuC["Imagen"]=$fila["Imagen"];
 					
 					$json["Menu"][]=$menuC;

 				}
 			
 			}
 			else{
					$menuC["Result"]=$fila["No Encontrado"];
 					$json["Menu Cafeteria"][]=$menuC;
 					//echo json_encode($json);
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
<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
		$json = array();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		
		

			$query = "SELECT * FROM `FeedInformativo`";
			$res = $con->query($query);
			if($res){
 				while($fila = mysqli_fetch_array($res)){
 					$feed["ID"]=$fila["ID"];
 					$feed["Titulo"]=$fila["Titulo"];
 					$feed["Descripcion"]=$fila["Descripcion"];
 					$feed["Imagen"]=$fila["Imagen"];
 					
 					$json["feed"][]=$feed;

 				}
 			}
 			
 			else{
					$feed["Result"]=["No Encontrado"];
 					$json["feed"][]=$feed;
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
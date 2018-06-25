<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
		$json = array();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		

			$queryReports = "SELECT * FROM `avisos_Importantes`";
			$res = $con->query($queryReports);
			if($res){
				while($fila = mysqli_fetch_array($res)){
				
 					$avImp["ID"]=$fila["ID"];
 					$avImp["Titulo"]=$fila["Titulo"];
 					$avImp["Descripcion"]=$fila["Descripcion"];
 					$json["Aviso"][]=$avImp;

 				}
 			
 			}
 			else{
					$avImp["Result"]=$fila["No Encontrado"];
 					$json["Aviso_Missing"][]=$avImp;
 					//echo json_encode($json);
				}
 		
 			mysqli_close($con);
 			echo json_encode($json);

		
	

?>
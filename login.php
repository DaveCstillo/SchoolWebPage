<?php

 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

	$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");

$json=array();

	if(isset($_GET["user"]) && isset($_GET["pass"])){

		
		$User = $con->real_escape_string($_GET['user']);
		$Pass = $con->real_escape_string($_GET['pass']);

		
		$query = "SELECT * FROM Padres WHERE USER='{$User}' and PASS='{$Pass}'";
		

		if($result = $con->query($query)){

			if($registro = mysqli_fetch_array($result)){
 				$alm["ID"]=$registro["ID"];
 				$alm["Apellidos"]=$registro["Apellidos"];
 				$alm["USER"]=$registro["User"];
 				$alm["PASS"]=$registro["Pass"];
 				$json['usuario'][]=$alm;
			}else{
				$alm['Result']="Error";
				$json['usuario'][]=$alm;
			}	

			/*if($registro=mysqli_fetch_array($result)){
				$json['usuario'][]=$registro;
			}*/
			mysqli_close($con);
 			echo json_encode($json);

		}else{
 			$reslt["ID"]="No Encontrado";
 			$reslt["Apellidos"]="No Encontrado";
 			$reslt["USER"]="No Encontrado";
 			$reslt["PASS"]="No Encontrado";
 			$json['usuario'][]=$reslt;
 			echo json_encode($json);
		}
	}else{
			$reslt["ID"]="No Valido";
 			$reslt["Apellidos"]="No Valido";
 			$reslt["USER"]="No Valido";
 			$reslt["PASS"]="No Valido";
 			$json['usuario'][]=$reslt;
 			echo json_encode($json);	
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
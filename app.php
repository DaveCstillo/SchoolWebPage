<?php
	
	$json=array();


 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 		//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");

if(isset($_GET['usser'])){
	$usuario=$_GET['usser'];
	//echo $usuario;
		$queryP = "SELECT * FROM `Padres` WHERE `User` = '{$usuario}'";
	//	echo $queryP;
		$Presultado = $con->query($queryP);
		if($Presultado){
		while($tutorData = mysqli_fetch_array($Presultado)){

	//		echo $tutorData['Codigo_padres'];
			$codTutor = $tutorData['Codigo_padres'];
		}
	}else{
		echo "No se puede leer la tabla de padres";
	}
	 		$queryE = "SELECT * FROM Estudiantes WHERE Codigo_tutor='{$codTutor}'";
	 //		echo $queryE;
 		$result = $con->query($queryE);

 		if($result){
 		//if($rest=mysqlif_etch_array($result)){
 			while($fila = mysqli_fetch_array($result)){
 			$alm["ID"]=$fila["ID"];
 			$alm["Codigo_alumno"]=$fila["Codigo_alumno"];
 			$alm["Nombres"]=$fila["Nombres"];
 			$alm["Apellidos"]=$fila["Apellidos"];
 			$alm["Grado"]=$fila["Grado"];
 			$alm["Edad"]=$fila["Edad"];
 			$json["Alumnos"][]=$alm;
 		//}
 		}
 		mysqli_close($con);
 		echo json_encode($json);
 	}else{
 		$reslt["Nombres"]="No Encontrado";
 		$reslt["Apellidos"]="No Encontrado";
 		$json['Alumno'][]=$reslt;
 		echo json_encode($json);

 	}
			
 }else{
 	$reslt["Nombres"]="No Valido";
 		$reslt["Apellidos"]="No Valido";
 		$json['Alumno'][]=$reslt;
 		echo json_encode($json);
 }
 		// while($fila = mysqli_fetch_array($result)){
 			
 		// 	echo "$fila[Nombres] <br/>";
 		// 	echo "$fila[Apellidos] <br/>";
 			
 		// }
 	


	// if(isset($_GET["Nombres"]) && isset($_GET["Apellidos"])){
	// 	$nombres=$_GET['Nombres'];
	// 	$apellidos=$_GET['Apellidos'];
	// }

		?>
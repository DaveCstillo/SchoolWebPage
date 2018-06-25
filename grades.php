<?php
 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
		$json = array();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		
	if(isset($_GET['alumno']) && isset($_GET['grado'])){
			$alumno = $_GET['alumno'];
			$grado = $_GET['grado'];

			$queryClases = "SELECT `Nombre_Clase` FROM `Clases`";
			$res = $con->query($queryClases);
			if($res){
				while($fila = mysqli_fetch_array($res)){
					$noclase[] = $fila['Nombre_Clase'];
					/*foreach ($noclase as $class) {
						# code...
						$clase[] = $class;
						echo $class;
					}*/

				}
			}


for($i = 0; $i<count($noclase);$i++){

			//echo $noclase[$i];
			$query = "SELECT * FROM `Notas_{$grado}_{$noclase[$i]}` WHERE `Codigo_alumno` = '{$alumno}'";
			//echo $query;
			$result = $con->query($query);

			//UPDATE `Notas_tresbasico_matematicas` SET `nota2`="" WHERE `Codigo_alumno` 

			if($result){
 				while($fila = mysqli_fetch_array($result)){
 					$alm["ID"]=$fila["ID"];
 					$alm["Codigo_alumno"]=$fila["Codigo_alumno"];
 					$alm["Nota1"]=$fila["nota1"];
 					$alm["Nota2"]=$fila["nota2"];
 					$alm["Parcial1"]=$fila["parcial1"];
 					$alm["Nota3"]=$fila["nota3"];
 					$alm["Nota4"]=$fila["nota4"];
 					$alm["Parcial2"]=$fila["parcial2"];
 					$alm["Zona"]=$fila["zona"];
 					$alm["Final"]=$fila["final"];
 					$json[$noclase[$i]][]=$alm;

 				}
 			
 			}
 			else{
					$alm["Result"]=$fila["No Encontrado"];
 					$json["Notas_Alumno"][]=$alm;
 					//echo json_encode($json);
				}
 			}
 			mysqli_close($con);
 			echo json_encode($json);

		}
	

?>
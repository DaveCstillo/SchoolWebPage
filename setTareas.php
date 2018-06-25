<?php

 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
	session_start();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		
	if(isset($_POST['codMaestro']) && isset($_POST['materia']) && isset($_POST['tarea']) && isset($_POST['fechaEmision']) && isset($_POST['fechaEntrega']) && isset($_POST['grado'])){
			
	
			$codMaestro = $_POST['codMaestro'];
			$Materia = $_POST['materia'];
			$Tarea = $_POST['tarea'];
			$FechaEm = $_POST['fechaEmision'];
			$FechaEn = $_POST['fechaEntrega'];
			$Grado = $_POST['grado'];


		 $queryinsrt = "INSERT INTO `tareas_{$Grado}`(`codigo_Catedratico`, `Materia`, `Tarea`, `FechaEmision`, `FechaEntrega`) VALUES ('{$codMaestro}','{$Materia}','{$Tarea}','{$FechaEm}','{$FechaEn}')";



			$queryupdt = "UPDATE `tareas_{$Grado}` SET `Tarea` = '{$Tarea}', `FechaEmision` = '{$FechaEm}', `FechaEntrega` = '{$FechaEn}' WHERE `codigo_Catedratico` = '{$codMaestro}')";

			//UPDATE `Notas_tresbasico_matematicas` SET `nota2`="" WHERE `Codigo_alumno` 

			if($result = $con->query($queryinsrt)){
				echo "Tarea ingresada correctamente";
			}
			else if($result = $con->query($queryupdt)){
				echo "Tarea modificada correctamente";
			}
			else{
				echo "Error";
			}
		
		}else{
			echo "Ingrese algo valido";
		}
	







?>
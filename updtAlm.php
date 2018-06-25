<?php

 
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
	session_start();
//isset($_GET["apellidos"]) && isset($_GET["nota"])
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		
	if(isset($_POST['codAlumno']) && isset($_POST['AlumnoName']) && isset($_POST['AlumnoLName']) && isset($_POST['clases']) && isset($_POST['AlumnoEdad']) && isset($_POST['codTutor'])){
			$clase = $_POST['clases'];
			
		if($clase=="nada"){
			echo "Ingrese algo valido";
		}else{

			$codAlm = $_POST['codAlumno'];
			$AlmName = $_POST['AlumnoName'];
			$AlmLName = $_POST['AlumnoLName'];
			$AlmEdad = $_POST['AlumnoEdad'];
			$codTut = $_POST['codTutor'];


			$queryupdt = "UPDATE `Estudiantes` SET `Codigo_tutor` = '{$codTut}', `Nombres` = '{$AlmName}', `Apellidos` = '{$AlmLName}', `Grado` = '{$clase}', `Edad` = '{$AlmEdad}' WHERE `Codigo_alumno` = '{$codAlm}'";

			//UPDATE `Notas_tresbasico_matematicas` SET `nota2`="" WHERE `Codigo_alumno` 

			if($result = $con->query($queryupdt)){
				// echo "Alumno actualizado correctamente";
				header("Location: /alumnos.php");die();
			}else{
				echo "Error";
			}
		
		}
	}







?>
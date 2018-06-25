<?php
 
 class conection{
 	function recuperarDatos(){
 		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

 		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
 		//mysql_select_db($db, $con) or die ("No se encuentra la base de datos");

 		$query = "SELECT * FROM Estudiantes";
 		$result = $con->query($query);

 		echo "Listado... <br/> <table>";
 		echo "<tr><td><span class='tit' >Codigo del Alumno:</span> </td><td><tr><td><span class='tit' >Nombres:</span> </td><td><span class='tit' >Apellidos:</span></td></tr>";

 		while($fila = mysqli_fetch_array($result)){


 			echo "<tr>";
 			echo "<td> $fila[Codigo_alumno] </td>";
 			echo "<td> $fila[Nombres] </td>";
 			echo "<td> $fila[Apellidos] </td> ";
 			echo "</tr>";
 		}
 	}

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
<?php
		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");

		
if(isset($_POST['titulo']) && isset($_POST['descripcion'])){

	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];



		$query = "INSERT INTO `avisos_Importantes`(`Titulo`, `Descripcion`) VALUES ('{$titulo}','{$descripcion}')";
 		$result = $con->query($query);

 if($result){
 	header("Location: /avisos.php");die();
 	//$msg=$msg."Feed actualizado correctamente";
 	//echo $msg;
 }else{
 	$msg=$msg."Error al insertar el contenido";
 	echo $msg;}

}
else{echo $msg;}
?>
<!--
*************************************************************************************************
*************************************************************************************************
********************************Developed by: David Castillo*************************************
********************************For: Vidal.GT Enterprise*****************************************
******************************************2018*******************************************************
*************************************************************************************************
-->

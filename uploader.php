<?php
		$host = "localhost";
 		$user = "id5209742_davecstillo";
 		$pw = "holahahaz";
 		$db = "id5209742_servertestdata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");

		
if(isset($_POST['titulo']) && isset($_POST['descripcion'])){

	$target_path = "uploads/";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
	 if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { 
	 	echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
	} else{
	echo "Ha ocurrido un error, trate de nuevo!";
	}

	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];

$uploadedfileload="true";
$uploadedfile_size=$_FILES['uploadedfile'][size];
echo $_FILES[uploadedfile][name];



if ($_FILES[uploadedfile][size]>200000)
{$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
$uploadedfileload="false";}

if (!($_FILES[uploadedfile][type] =="image/png" OR $_FILES[uploadedfile][type] =="image/gif"))
{$msg=$msg." Tu archivo tiene que ser PNG o GIF. Otros archivos no son permitidos<BR>";
$uploadedfileload="false";}

$file_name=$_FILES[uploadedfile][name];
$add="uploads/$file_name";
if($uploadedfileload=="true"){

if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
echo " Ha sido subido satisfactoriamente";
}else{echo "Error al subir el archivo";}


 }
		$query = "INSERT INTO `FeedInformativo`(`Titulo`, `Descripcion`, `Imagen`) VALUES ('{$titulo}','{$descripcion}','{$file_name}')";
 		$result = $con->query($query);

 if($result){
 	header("Location: /homeC.php");die();
 	//$msg=$msg."Feed actualizado correctamente";
 	//echo $msg;
 }else{
 	$msg=$msg."Error al insertar el contenido";
 	echo $msg;}

}
else{echo $msg;}
?>

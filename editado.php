<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php

 $e_ideditar3 = $_SESSION['ideditar']; 
 //echo $ideditar3;
/*Infomación USUARIO*/
$e_pass = $_POST['epass1'];
/*Infomación Datos Personales*/
$e_nombre = $_POST['enombre'];
$e_apellido1 = $_POST['eapellido1'];
$e_apellido2 = $_POST['eapellido2'];
$e_direccion = $_POST['edireccion'];
$e_cel = $_POST['ecel'];
$e_phone = $_POST['ephone'];
$e_email = $_POST['eemail'];
$e_departamento = $_POST['edepartamento'];
$e_municipio = $_POST['emunicipio'];
$e_nacimiento = $_POST['enacimiento'];

$e_banco = $_POST['ebanco'];
$e_salud = $_POST['esalud'];
$e_clase = $_POST['eclase'];
$e_tipo = $_POST['etipo'];
$e_activo = $_POST['eactivo'];

//echo $e_ideditar3." Pass:".$e_pass.", Nombre:".$e_nombre." , Apellido:".$e_apellido1.", Segundo Apellido:".$e_apellido2.", Dirección:".$e_direccion.", Celular:".$e_cel.", Telefono Fijo:".$e_phone.", Email".$e_email.", 
 
//echo "Departamento".$e_departamento.", MUnicipio".$e_municipio.", Fecha de Nacimiento".$e_nacimiento.", Banco:".$e_banco.", Salud".$e_salud.", Clase".$e_clase.", Tipo".$e_tipo.", Activo".$e_activo;  

$e_consultiduser = "SELECT afiliados.idCedula FROM afiliados WHERE afiliados.idCedula =  '$e_ideditar3'" or die("Error in the consult.." . mysqli_error($link)); 
$e_result = mysqli_query($link, $e_consultiduser); 
while($e_row = mysqli_fetch_array($e_result , MYSQLI_ASSOC)) { 
  $e_usert = $e_row["idCedula"];

  if ($e_ideditar3 != $e_usert) {
	echo "<script>alert('El usuario No se encuentra en base de datos')</script>";
    echo "<script>location.href='ingreso.php'</script>";
}
}

$e_upquery = "UPDATE `amapento_bd`.`afiliados` SET `idCedula` = '$e_ideditar3', `Apellido` = '$e_apellido1', `segApellido` = '$e_apellido2', `FNacimiento` = '$e_nacimiento', `Nombre` = '$e_nombre', `Direccion` = '$e_direccion', `Telefonofijo` = '$e_phone', `TelCelular` = '$e_cel', `email` = '$e_email', `idCategoriasuser` = '$e_tipo', `departamentos_id` = '$e_departamento' WHERE `afiliados`.`idCedula` = $e_ideditar3;"; mysqli_query($link, $e_upquery);
$f_upquery = "UPDATE `amapento_bd`.`afiliados` SET `Municipio` = '$e_municipio', `Bancos_idBancos` = '$e_banco', `Salud_idSalud` = '$e_salud', `Clase_idClase` = '$e_clase', `activo_idactivo` = '$e_activo', `nicename` = '1233', `contrasenia` = '1235' WHERE `afiliados`.`idCedula` = 1231;"; mysqli_query($link, $f_upquery);
   /*$e_upquery ="UPDATE `amapentol`.`afiliados` SET `idCedula` = '$e_ideditar3', `Apellido` = '$e_apellido1', `segApellido` = '$e_apellido2', `FNacimiento` = '$e_nacimiento', `Nombre` = '$e_nombre', `Direccion` = '$e_direccion', `Telefonofijo` = '$e_phone', `TelCelular` = '$e_cel', `email` = '$e_email' WHERE `afiliados`.`idCedula` = $e_ideditar3;"; mysqli_query($link, $e_upquery);
   $f_upquery ="UPDATE `amapentol`.`afiliados` SET `idCategoriasuser` = '$e_tipo', `departamentos_id` = '$e_departamento', `Municipio` = '$e_municipio' WHERE `afiliados`.`idCedula` = $e_ideditar3;"; mysqli_query($link, $f_upquery);
   $g_upquery ="UPDATE `amapentol`.`afiliados` SET `Bancos_idBancos` = '$e_banco', `Salud_idSalud` = '$e_salud', `Clase_idClase` = '$e_clase', `activo_idactivo` = '$e_activo', `nicename` = '$e_ideditar3', `contrasenia` = '$e_pass' WHERE `afiliados`.`idCedula` = $e_ideditar3;"; mysqli_query($link, $g_upquery);
*/


   if($e_upquery == true) {
echo "<script>alert('el usuario "."$e_ideditar3"." ha sido Modificado exitosamente!!')</script>";
    echo "<script>location.href='editsearch.php'</script>";}
	else {
	echo "<script>alert('el usuario no ha sido modificado a causa de un problema inesperado!!')</script>";
	echo "<script>window.history.go(-1)</script>";}
	
?>

 	

<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php

 $er_ideditar3 = $_SESSION['editarreporte']; 
// echo $er_ideditar3;
/*Infomación USUARIO*/
$er_pass = $_POST['er_pass1'];
/*Infomación Datos Personales*/
$er_nombre = $_POST['er_nombre'];
$er_apellido1 = $_POST['er_apellido1'];
$er_apellido2 = $_POST['er_apellido2'];
$er_direccion = $_POST['er_direccion'];
$er_cel = $_POST['er_cel'];
$er_phone = $_POST['er_phone'];
$er_email = $_POST['er_email'];
$er_departamento = $_POST['er_departamento'];
$er_municipio = $_POST['er_municipio'];
$er_nacimiento = $_POST['er_nacimiento'];
$er_tipo = $_POST['er_tipo'];
$er_banco = $_POST['er_banco'];
$er_salud = $_POST['er_salud'];
$er_clase = $_POST['er_clase'];
$er_activo = $_POST['er_activo'];

//echo $er_ideditar3." Pass:".$er_pass.", Nombre:".$er_nombre." , Apellido:".$er_apellido1.", Segundo Apellido:".$er_apellido2.", Dirección:".$er_direccion.", Celular:".$er_cel.", Telefono Fijo:".$er_phone.", Email".$er_email.", Departamento".$er_departamento.", MUnicipio".$er_municipio.", Fecha de Nacimiento".$er_nacimiento.", Banco:".$er_banco.", Salud".$er_salud.", Clase".$er_clase.", Activo".$er_activo;  

$er_consultiduser = "SELECT afiliados.idCedula FROM afiliados WHERE afiliados.idCedula =  '$er_ideditar3'" or die("Error in the consult.." . mysqli_error($link)); 
$er_result = mysqli_query($link, $er_consultiduser); 
while($er_row = mysqli_fetch_array($er_result , MYSQLI_ASSOC)) { 
  $er_usert = $er_row["idCedula"];

  if ($er_ideditar3 != $er_usert) {
	echo "<script>alert('El usuario No se encuentra en base de datos')</script>";
    echo "<script>location.href='ingreso.php'</script>";
}
}//while cierra

   $er_upquery = "UPDATE `amapentol`.`afiliados` SET `idCedula` = '$er_ideditar3', `Apellido` = '$er_apellido1', `segApellido` = '$er_apellido2', `FNacimiento` = '$er_nacimiento', `Nombre` = '$er_nombre', `Direccion` = '$er_direccion', `Telefonofijo` = '$er_phone', `TelCelular` = '$er_cel', `email` = '$er_email' WHERE `afiliados`.`idCedula` = $er_ideditar3;"; mysqli_query($link, $er_upquery);

   $fr_upquery ="UPDATE `amapentol`.`afiliados` SET `idCategoriasuser` = '$er_tipo', `departamentos_id` = '$er_departamento', `Municipio` = '$er_municipio' WHERE `afiliados`.`idCedula` = $er_ideditar3;"; mysqli_query($link, $fr_upquery);

   $gr_upquery ="UPDATE `amapentol`.`afiliados` SET `Bancos_idBancos` = '$er_banco', `Salud_idSalud` = '$er_salud', `Clase_idClase` = '$er_clase', `activo_idactivo` = '$er_activo', `nicename` = '$er_ideditar3', `contrasenia` = '$er_pass' WHERE `afiliados`.`idCedula` = $er_ideditar3;"; mysqli_query($link, $gr_upquery);

if ($er_upquery == true && $fr_upquery == true && $gr_upquery && $gr_upquery == true) {
	echo "<script>alert('el usuario ha sido Modificado exitosamente!!')</script>";
 

} else {
	echo "<script>alert('problemas para cargar el usuario!!')</script>";

}

 echo "<script>location.href='editsearch.php'</script>";
?>

 	

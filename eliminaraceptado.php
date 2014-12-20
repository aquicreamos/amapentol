<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php

$idcedula = $_SESSION['eliminar'];

$qinusere = "DELETE FROM `amapentol`.`afiliados` WHERE `afiliados`.`idCedula` = '$idcedula'"; mysqli_query($link, $qinusere);

echo "<script>alert('El usuario ha sido eliminado satisfactoriamente')</script>";
 echo "<script>location.href='delsearch.php'</script>";

 ?>
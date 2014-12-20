<?php 
$link = mysqli_connect("localhost","amapento_dark",":amapentol!","amapento_bd") or die("Error " . mysqli_error($link)); 

if (!$link) {
	echo "<script>alert('el usuario no ha sido modificado a causa de un problema inesperado!!')</script>";
    exit();
}
?>
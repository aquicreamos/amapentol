<?php require_once('conexion.php');?>
<?php
session_start(); ob_start();
if(empty($_SESSION['tiempo'])) {
    echo "<script>alert('Pasados 15 min de Inactividad Por seguridad se ha cerrado la session')</script>";
}

session_destroy();
mysqli_close($link);
echo "<script>location.href='index.php'</script>";

?>
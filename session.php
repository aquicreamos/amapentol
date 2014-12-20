<?php
session_start(); ob_start();
if (empty($_SESSION['id'])) {
   echo "<script>location.href='index.php'</script>";
}
  $inactivo = 900;

  if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo)
        {
            session_destroy();

            header("Location: sessionClose.php");

        }
    }

    $_SESSION['tiempo'] = time();
?>
<?php require_once('conexion.php');?>

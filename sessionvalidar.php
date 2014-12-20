<?php
session_start(); ob_start();
$user = $_POST['user'];
$contrasenia = $_POST['contrasenia'];

//echo $user.$contrasenia;

if (empty($user) or empty($contrasenia)) {
	echo "<script>alert('Campos Vacios')</script>";
  echo "<script>location.href='index.php'</script>";
}
require_once('conexion.php');
include 'template/head.php';


$consulta = "SELECT afiliados.idCedula, afiliados.nicename, afiliados.contrasenia, activo.tipo, categoriasuser.Ncategoria FROM afiliados , activo , categoriasuser WHERE afiliados.idCedula = '$user' AND activo.idactivo = afiliados.activo_idactivo AND categoriasuser.idCategoriasuser = afiliados.idCategoriasuser" or die("Error in the consult.." . mysqli_error($link)); 

$result = mysqli_query($link, $consulta); 
while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) { 
 $usuario = $row["nicename"];
 $password = $row["contrasenia"];
 $celula = $row["idCedula"];
 $activado = $row["tipo"];
 $categoriatuser = $row["Ncategoria"];


 //echo "  Esto es de la base de datos".$celula." ".$password ;
 if ($user == $usuario && $contrasenia == $password) {
	if ($activado == 'Activo') {
		$_SESSION['id'] = $celula;
		$_SESSION['Ncategoria'] = $categoriatuser;
		
		echo "<script>location.href='entrada.php'</script>";
	}else {
	echo "<script>alert('El usuario se encuentra desactivado')</script>";
   echo "<script>location.href='index.php'</script>";
	}
	
    //echo "<script>location.href='sessionvalidar.php'</script>";
  }  
if ($user != $usuario or $contrasenia != $password) {
  echo "<script>alert('Verificar usuario y contraseña / Error al Encontrar el usuario')</script>";
   echo "<script>location.href='index.php'</script>";
} 

}

//echo "<script>location.href='editsearch.php'</script>";
//Validación de Usuario para ingreso a la plataforma

?>

<?php include 'template/footer.php';?>

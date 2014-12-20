<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php
/*Infomación USUARIO*/
$cedulac = $_POST['ncedula'];
$passc = $_POST['npass1'];
/*Infomación Datos Personales*/
$nombrec = $_POST['nnombre'];
$apellido1c = $_POST['napellido1'];
$apellido2c = $_POST['napellido2'];
$direccionc = $_POST['ndireccion'];
$celc = $_POST['ncel'];
$phonec = $_POST['nphone'];
$emailc = $_POST['nemail'];
$departamentoc = $_POST['ndepartamento'];
$municipioc = $_POST['nmunicipio'];
$nacimientoc = $_POST['nnacimiento'];

$bancoc = $_POST['nbanco'];
$saludc = $_POST['nsalud'];
$clasec = $_POST['nclase'];
$tipoc = $_POST['ntipo'];
$activoc = $_POST['nactivo'];

echo $cedulac.", ".$passc.", ".$nombrec.", ".$apellido1c.", ".$apellido2c.", ".$direccionc.", ".$celc.", ".$phonec.", ".$emailc.", ".$departamentoc.", ".$municipioc.", ".$nacimientoc.", ".$bancoc.", ".$saludc.", ".$clasec.", ".$tipoc.", ".$activoc;  
echo "<br/>";
/*Consulta y valida el usuario*/
$consultiduser = "SELECT afiliados.idCedula FROM afiliados WHERE afiliados.idCedula =  '$cedulac'" or die("Error in the consult.." . mysqli_error($link)); 
$result = mysqli_query($link, $consultiduser); 
while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) { 
  $usert = $row["idCedula"];

  if ($cedulac == $usert) {
	echo "<script>alert('El usuario ya se encuentra en base de datos')</script>";
    echo "<script>location.href='ingreso.php'</script>";
}
}



/*Registro de Usuario*/
   $qinuserc = "INSERT INTO `amapentol`.`afiliados` (`idCedula`, `Apellido`, `segApellido`, `FNacimiento`, `Nombre`, `Direccion`, `Telefonofijo`, `TelCelular`, `email`, `idCategoriasuser`, `municipios_id`, `departamentos_id`, `Municipio`, `Bancos_idBancos`, `Salud_idSalud`, `Clase_idClase`, `activo_idactivo`, `nicename`, `contrasenia`) VALUES ('$cedulac', '$apellido1c', '$apellido2c', '$nacimientoc', '$nombrec', '$direccionc', '$phonec', '$celc', '$emailc', '$tipoc', '1028', '$departamentoc', '$municipioc','$bancoc', '$saludc', '$clasec', '$activoc', '$cedulac', '$passc');"; mysqli_query($link, $qinuserc);


//echo "<script>alert('el usuario ha sido vinculado exitosamente!!')</script>";
    //echo "<script>location.href='ingreso.php'</script>";


?>



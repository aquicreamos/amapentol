<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>

<?php
/*Infomación USUARIO*/
$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : null ;
//echo $cedula; 
$_SESSION['eliminar'] = $cedula;
$consultiduser = "SELECT afiliados.idCedula FROM afiliados WHERE afiliados.idCedula =  '$cedula'
" or die("Error in the consult.." . mysqli_error($link)); 
$result = mysqli_query($link, $consultiduser); 
while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) { 
 $celula = $row["idCedula"];

if ($cedula == $celula){
  	echo "<script>location.href='eliminar.php'</script>";
  } else {
  echo "<script>alert('El usuario no ha sido encontrado en la base de datos')</script>";
 echo "<script>location.href='ingreso.php'</script>";
}
}
?>

<div class="container">
	<div class="col-lg-12">
		<div class="row" style="width: 500px; margin:60px auto 0 auto; background-color: #E9967A; color:#FFF; padding: 20px;">
<form action="delsearch.php" method="POST" name="form1">
  <fieldset>
    <legend>Eliminar Usuario <small style="color:#fff;">(Escriba el Numero de Cedula)</small></legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Cedula de Ciudadanía</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputEmail" placeholder="No de Identificación" name="cedula">
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-danger">Buscar y Eliminar</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
	</div>
</div>
<?php include 'template/footer.php'; ?>


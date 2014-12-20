<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>	

<?php $salud = isset($_POST['formsalud']) ? $_POST['formsalud'] : null ;?>

<div class="container">
	<div class="row" style="margin:0 auto; ">
		<div class="col-lg-12">
			<form class="form-inline" action="reportesalud.php" method="POST">

<!--Input ComboBOx Salud-->
<?php $querysl = "SELECT `salud`.* FROM `salud` " or die("Error in the consult.." . mysqli_error($link)); $resultsl = mysqli_query($link, $querysl); ?>
          <div class="form-group">
	       <div class="input-group">
			      <div class="input-group-addon"><span class="glyphicon glyphicon glyphicon-plus-sign"></span></div>
	<select id="inputSalud" name="formsalud">
	        <option value="Todos" style="color:676767"></option>
	         <?php
				while($rowsl = mysqli_fetch_array($resultsl , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$rowsl["idSalud"])."\">".$rowsl["SaludName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>

<?php
$badget = 0;
$countr = "SELECT Count(afiliados.idCedula), afiliados.Salud_idSalud FROM afiliados WHERE afiliados.Salud_idSalud =  '$salud' GROUP BY afiliados.Salud_idSalud;"; 
$total = mysqli_query($link, $countr);
while($rowtotal = mysqli_fetch_array($total , MYSQLI_ASSOC)) { 
     $badget = $rowtotal["Count(afiliados.idCedula)"];
	}
?>
			   <div class="form-group">
			  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Generar Reporte <span class="badge"><?php echo $badget; ?></span></button>
	 </div></form>
		</div>
	</div>
</div>
<?php

//echo $banco."=Banco ".$salud."=Salud ".$clase."=Clase ".$categoriat."=Categoria ";
?>
<div class="container">
	<div class="row" style="margin:0 auto; ">
		<div class="col-lg-12">
<div class="table-responsive">
<table class="table table-hover table-bordered" style="font-size:10px;">
  <thead>
    <tr style="text-align:center; background-color:#55f; color:#FFF;">
      <th>N°</th>
      <th>Identificación</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Apellido 2</th>
      <th>Fecha Nacimiento</th>
      <th>Dirección</th>
      <th>Telefóno</th>
      <th>Celular</th>
      <th>Email</th>
      <th>Centro de Salud</th>
      <th>Departamento</th>
      <th>Municipio</th>
     <th>Editar</th>
     </tr>
  </thead>
  <tbody>
  <?php

  


$query = "SELECT afiliados.contrasenia, afiliados.nicename, afiliados.idCedula, afiliados.Apellido, afiliados.segApellido, afiliados.FNacimiento, afiliados.Nombre, afiliados.Telefonofijo, afiliados.Direccion, afiliados.TelCelular, afiliados.email, afiliados.Bancos_idBancos, activo.tipo, bancos.BancoName, categoriasuser.Ncategoria, clase.ClaseName, departamentos.nombre_departamento, salud.SaludName, afiliados.Municipio FROM afiliados , activo , bancos , categoriasuser , clase , departamentos , salud WHERE activo.idactivo = afiliados.activo_idactivo AND bancos.idBancos = afiliados.Bancos_idBancos AND categoriasuser.idCategoriasuser = afiliados.idCategoriasuser AND clase.idClase = afiliados.Clase_idClase AND departamentos.id_dep = afiliados.departamentos_id AND salud.idSalud = afiliados.Salud_idSalud AND afiliados.Salud_idSalud = '$salud'";
     $result = mysqli_query($link, $query); 
$f=1;
while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) { 
    $identifica = $row["idCedula"];
  echo '<tr>
     <th>'.$f.'</th>
     <th>'.$row["idCedula"].'</th>
      <th>'.$row["Nombre"].'</th>
      <th>'.$row["Apellido"].'</th>
      <th>'.$row["segApellido"].'</th>
      <th>'.$row["FNacimiento"].'</th>
      <th>'.$row["Direccion"].'</th>
      <th>'.$row["Telefonofijo"].'</th>
      <th>'.$row["TelCelular"].'</th>
      <th>'.$row["email"].'</th>
      <th>'.$row["SaludName"].'</th>
      <th>'.$row["nombre_departamento"].'</th>
     <th>'.$row["Municipio"].'</th>';
      echo '<th><a href="editareporte.php?value='.$identifica.'"><img src="images/editar.png" /></a></th>
     </tr>';
     $f++;
 }
?> 

   
      </tbody>
</table> </div></div></div></div>
  <?php include 'template/footer.php'; ?>

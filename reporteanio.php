<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php $anio = isset($_POST['anio']) ? $_POST['anio'] : null ;  //echo $anio;?>
<div class="container">
	<div class="row" style="margin:0 auto; ">
		<div class="col-lg-12">
   
			<form class="form-inline" action="reporteanio.php" method="POST">


			  <!--Tipo de Usuario-->
			  <div class="form-group">
			    <div class="input-group">
			      <div class="input-group-addon"><span class="glyphicon glyphicon glyphicon-time"></span></div>
		<select id="inputTipo" name="anio">
		<option value="" style="color:676767"></option>
	   <?php
    
    $Y = date ("Y");
    for ($i=1900; $i <= $Y ; $i++) {
    echo '<option value="'.$i.'" style="color:676767">'.$i.'</option>';
    }
    ?>
    <option value="2024" style="color:676767">2024</option>
    </select>
			    </div>
			  </div>
			
<?php
$badget = 0;
$countr = "SELECT Count(afiliados.idCedula), afiliados.FNacimiento FROM afiliados WHERE date_format(afiliados.FNacimiento, '%Y') = '$anio'"; 
$total = mysqli_query($link, $countr);
while($rowtotal = mysqli_fetch_array($total , MYSQLI_ASSOC)) { 
     $badget = $rowtotal["Count(afiliados.idCedula)"];
	}
?>
			   <div class="form-group">
			  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon glyphicon-time"></span> Generar Reporte <span class="badge"><?php echo $badget; ?></span></button>
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
      <th>Departamento</th>
      <th>Municipio</th>
      <th>Editar</th>
     </tr>
  </thead>
  <tbody>
  <?php

  


$query = "SELECT afiliados.idCedula, afiliados.Apellido, afiliados.segApellido, afiliados.FNacimiento, afiliados.Nombre, afiliados.Direccion, afiliados.Telefonofijo, afiliados.TelCelular, afiliados.email, afiliados.Municipio, departamentos.nombre_departamento FROM afiliados , departamentos WHERE departamentos.id_dep = afiliados.departamentos_id AND date_format(afiliados.FNacimiento, '%Y') = '$anio' ORDER BY date_format(afiliados.FNacimiento, '%d') ASC";
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
      <th style="color:#66F;">'.$row["FNacimiento"].'</th>
      <th>'.$row["Direccion"].'</th>
      <th>'.$row["Telefonofijo"].'</th>
      <th>'.$row["TelCelular"].'</th>
      <th>'.$row["email"].'</th>
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
<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php

$ideditar = $_SESSION['ideditar'];

$query = "SELECT afiliados.idCedula, afiliados.Apellido, afiliados.segApellido, afiliados.FNacimiento, afiliados.Nombre, afiliados.Direccion, afiliados.Telefonofijo, afiliados.TelCelular, afiliados.email, afiliados.nicename, afiliados.contrasenia, bancos.BancoName, categoriasuser.Ncategoria, clase.ClaseName, departamentos.nombre_departamento, municipios.nombre_municipio, salud.SaludName, activo.tipo FROM afiliados , bancos , categoriasuser , clase , departamentos , municipios , salud , activo WHERE afiliados.idCedula = '$ideditar' AND municipios.id = afiliados.municipios_id AND departamentos.id_dep = afiliados.departamentos_id AND salud.idSalud = afiliados.Salud_idSalud AND bancos.idBancos = afiliados.Bancos_idBancos AND categoriasuser.idCategoriasuser = afiliados.idCategoriasuser AND clase.idClase = afiliados.Clase_idClase AND activo.idactivo = afiliados.activo_idactivo" or die("Error in the consult.." . mysqli_error($link)); 


$result = mysqli_query($link, $query); 

while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) { 
  $idcedula = $row["idCedula"]; 
  $name = $row["Nombre"]; 
  $lastname1 = $row["Apellido"]; 
  $lastname2 = $row["segApellido"]; 
  $fage = $row["FNacimiento"]; 
  $locality = $row["Direccion"]; 
  $tel = $row["Telefonofijo"]; 
  $cel = $row["TelCelular"];
  $email = $row["email"];
/*Datos adicionales*/
  $bancoName = $row["BancoName"];
  $claseName = $row["ClaseName"];
  $saludName = $row["SaludName"];
  $NombreDepartamento = $row["nombre_departamento"];
  $NombreMunicipio = $row["nombre_municipio"];
  $tipoName= $row["tipo"];
  $categoria = $row["Ncategoria"];
/*Datos Usuario*/
  $Nicename = $row["nicename"];
  $contrasenia = $row["contrasenia"];
 } 
?> 


<div class="container">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                    <!-- Apartir de este espacio se genera los contenidos -->
                        <h2>
                           Información encontrada de:</h2>
                           <h3>
                           Usuario: <small> <?php echo $name; ?>  <?php echo $lastname1; ?> <?php echo $lastname2; ?> </small></h3>
                           <h3>
                           Identificación: <small> <?php echo $idcedula; ?> </small></h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> En este espacio se describe la información encontrada en la base de datos del Usuario <strong><?php echo $Nicename; ?></strong> 
                            </li>
                        </ol>
                    </div>
                </div>




<div class="row">
    <div class="col-lg-12">
      <form class="form-horizontal" action="cargar.php" method="POST" name="form1">
		<fieldset>
		
                  <div class="panel-body">
                		<div class="panel-group" id="panel-130338">
							<div class="panel panel-default">
<!--Inicio del Formulario-->
			<div class="panel-heading panel-success">
				<a class="panel-title" data-toggle="collapse" data-parent="#panel-130338" href="#panel-element-482979">Datos de Usuario</a>
					</div>
				<div id="panel-element-482979" class="panel-collapse in">
					<div class="panel-body">
	<legend>Datos Principales de Contacto</legend>
<!--Ingreso de Cedula-->
					<div class="form-group">
						<label for="inputCedula" class="col-lg-2 control-label">Cedula</label>
						<div class="col-lg-10" >
						<input type="text" class="form-control" id="inputCedula" placeholder="<?php echo $ideditar;?>" name="fcedula" disabled>
						<p class="form-control-static"></p></div>
					</div>
<!--Ingreso de Nombre de Usuario-->
					<div class="form-group">
						<label for="inputCedula" class="col-lg-2 control-label">Usuario</label>
						<div class="col-lg-10" >
						<input type="text" class="form-control" id="inputCedula" placeholder="<?php echo $Nicename; ?>" name="fcedula" disabled>
						<p class="form-control-static"></p></div>
					</div>

<!--Ingreso de contraseña-->
					<div class="form-group">
				      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
				      <div class="col-lg-10">
					<input type="password" class="form-control" id="inputPassword" placeholder="<?php echo $contrasenia; ?>" name="fpass1" disabled>
				      </div>
				    </div>
<!--Final Bloque Usuario--></div> </div> </div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-130338" href="#panel-element-368927">Datos Personales</a>
		</div>
		<div id="panel-element-368927" class="panel-collapse collapse">
			<div class="panel-body">
<!-- + Opciones - Nombre Apellido segApellido Direccion Telefonofijo Numero de CEL FNacimiento nombre_departamento  nombre_municipio -->
<legend>Datos Personales </legend>
<!--Ingreso de Nombres-->
  		<div class="form-group">
	      <label for="inputNombres" class="col-lg-2 control-label">Nombres</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputNombres" placeholder="<?php echo $name; ?> " name="fnombre" disabled>
	      </div>
	    </div>
<!--Ingreso de Primer Apellido-->
	    <div class="form-group">
	      <label for="inputApellido" class="col-lg-2 control-label">Primer Apellido</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputApellido" placeholder="<?php echo $lastname1; ?>" name="fapellido1" disabled>
	      </div>
	    </div>
<!--Ingreso de Apellido 2-->
	    <div class="form-group">
	      <label for="inputApellido2" class="col-lg-2 control-label">Segundo Apellido</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputApellido2" placeholder="<?php echo $lastname2; ?>" name="fapellido2" disabled>
	      </div>
	    </div>
<!--Ingreso de Dirección-->
	    <div class="form-group">
	      <label for="inputDireccion" class="col-lg-2 control-label">Dirección</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputDireccion" placeholder="<?php echo $locality; ?>" name="fdireccion" disabled>
	      </div>
	    </div>
<!--Ingreso de Email Address-->
		<div class="form-group">
		   <label class="col-lg-3 control-label">Email</label>
        <div class="col-lg-7"><div class="input-group">
		      <input class="form-control" type="email" placeholder="<?php echo $email; ?>" name="femail" disabled>
		    </div></div>
		</div>
<!--Ingreso de Telefono-->
	     <div class="form-group">
	      <label for="inputTel" class="col-lg-2 control-label">Telefóno</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputTel" placeholder="<?php echo $tel; ?>" name="fphone" disabled>
	      </div>
	    </div>
<!--Ingreso de Numero de Celular-->
	    <div class="form-group">
	      <label for="inputCel" class="col-lg-2 control-label">Número de Celular</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputCel" placeholder="<?php echo $cel; ?>" name="fcel" disabled>
	      </div>
	    </div>

	    <!--Ingreso de Fecha de Nacimiento-->
	    <div class="form-group">
	      <label for="inputCel" class="col-lg-2 control-label">Fecha de Nacimiento</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputCel" placeholder="<?php echo $fage; ?> " name="fcel" disabled>
	      </div>
	    </div>

<!--Ingreso de Departamento-->
	    <?php $query = "SELECT departamentos.id_dep, departamentos.nombre_departamento FROM departamentos" or die("Error in the consult.." . mysqli_error($link)); $result = mysqli_query($link, $query); ?>
          <div class="form-group">
	      <label for="intDepartamento" class="col-lg-2 control-label">Departamento</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputDepartamento" name="fdepartamento" disabled>
	    <option><?php echo $NombreDepartamento; ?> </option>
	    <?php while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$row["id_dep"])."\">".$row["nombre_departamento"]."</option>\n"; }?> 
	        </select></div></div>


<!--Ingreso de Municipio-->
<div class="form-group">
	      <label for="inputMunicipio" class="col-lg-2 control-label">Municipio</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputMuni" placeholder="<?php echo $NombreMunicipio; ?>" name="fmunicipio" disabled>
	      </div>
	    </div>


<div class="form-group">
	      <label for="inputTel" class="col-lg-2 control-label">Telefóno</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputTel" placeholder="<?php echo $tel; ?>" name="fmunicipio" disabled>
	      </div>
	    </div>

<!--Ingreso de Fecha Nacimiento
	<div class="form-group">
	      <label for="inputTel" class="col-lg-2 control-label">Fecha <small>de Nacimiento Año/Mes/Dia</small></label>
	      <div class="col-lg-10 input-append date" id="datetimepicker">
      <input type="text" name="fnacimiento"></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div></div>-->
<!--Final Bloque 2-->
</div></div></div>


<!-- BancoName  ClaseName    SaludName  tipo -->
<div class="panel panel-default">
<div class="panel-heading">
<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-130338" href="#panel-element-368922">Información Adicional</a>
</div>
	<div id="panel-element-368922" class="panel-collapse collapse">
		<div class="panel-body">
  
  
 

<!--Ingreso de Banco-->
    <?php $querybk = "SELECT `bancos`.* FROM `bancos`" or die("Error in the consult.." . mysqli_error($link)); $resultbk = mysqli_query($link, $querybk); ?>
          <div class="form-group">
	       <label for="inputBanco" class="col-lg-2 control-label">Entidad Bancaria</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputBanco" name="fbanco" disabled>
	        <option><?php echo $bancoName; ?></option>
	         <?php
				while($rowbk = mysqli_fetch_array($resultbk , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$rowbk["idBancos"])."\">".$rowbk["BancoName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>


<!--COMBO BOX SALUD-->
	    <?php $querysl = "SELECT `salud`.* FROM `salud` " or die("Error in the consult.." . mysqli_error($link)); $resultsl = mysqli_query($link, $querysl); ?>
          <div class="form-group">
	       <label for="inputSalud" class="col-lg-2 control-label">Entidad de Salud</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputSalud" name="fsalud" disabled>
	        <option><?php echo $saludName; ?></option>
	         <?php
				while($rowsl = mysqli_fetch_array($resultsl , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$rowsl["idSalud"])."\">".$rowsl["SaludName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>

<!--COMBO BOX CLASE-->
	    <?php $querysl = "SELECT `clase`.* FROM `clase`" or die("Error in the consult.." . mysqli_error($link)); $resultsl = mysqli_query($link, $querysl); ?>
          <div class="form-group">
	       <label for="inputClase" class="col-lg-2 control-label">Clase</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputClase" name="fclase" disabled>
	        <option><?php echo $claseName; ?></option>
	         <?php
				while($rowsl = mysqli_fetch_array($resultsl , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$rowsl["idClase"])."\">".$rowsl["ClaseName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>



<!--COMBO BOX CATEGORIA-->
	    <?php $querysl = "SELECT `categoriasuser`.* FROM `categoriasuser`" or die("Error in the consult.." . mysqli_error($link)); $resultsl = mysqli_query($link, $querysl); ?>
          <div class="form-group">
	       <label for="inputTipo" class="col-lg-2 control-label">Tipo de Usuario</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputTipo" name="ftipo" disabled>
	        <option><?php echo $categoria;?></option>
	         <?php
				while($rowsl = mysqli_fetch_array($resultsl , MYSQLI_ASSOC)) { 

				  echo "<option value=\"".str_replace(" ","_",$rowsl["idCategoriasuser"])."\">".$rowsl["Ncategoria"]."</option>\n";
				 
					 }?> 
	        </select></div></div>



<!--COMBO BOX CATEGORIA-->
	    <?php $querysl = "SELECT `activo`.* FROM `activo`" or die("Error in the consult.." . mysqli_error($link)); $resultsl = mysqli_query($link, $querysl); ?>
          <div class="form-group">
	       <label for="inputActivo" class="col-lg-2 control-label">Activo/inactivo</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputActivo" name="factivo" disabled>
	        <option><?php echo $tipoName; ?></option>
	         <?php
				while($rowsl = mysqli_fetch_array($resultsl , MYSQLI_ASSOC)) { 
					
				  echo "<option style='text-transform:uppercase;' value=\"".str_replace(" ","_",$rowsl["idactivo"])."\">".$rowsl["tipo"]."</option>\n";
				 
					 }?> 
	        </select></div></div>


														</div>
													</div>
												</div>
											</div>
							</fieldset>
						</form>


						<!--"Fin del Formulario"-->
</div></div>
<form role="form" action="editarfin.php">
    <button type="submit" class="btn btn-success" aling="center"><h5>Editar Usuario</h5></button>
</form>
</div></div>

  <?php include 'template/footer.php'; ?>

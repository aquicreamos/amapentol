<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>
<?php $ideditar2 = $_SESSION['ideditar']; 

$query = "SELECT afiliados.idCedula, afiliados.Apellido, afiliados.segApellido, afiliados.FNacimiento, afiliados.Nombre, afiliados.Direccion, afiliados.Telefonofijo, afiliados.TelCelular, afiliados.email, afiliados.nicename, afiliados.contrasenia, bancos.BancoName, categoriasuser.Ncategoria, clase.ClaseName, departamentos.nombre_departamento, municipios.nombre_municipio, afiliados.Municipio, salud.SaludName, activo.tipo, bancos.idBancos, categoriasuser.idCategoriasuser, clase.idClase, departamentos.id_dep, salud.idSalud, activo.idactivo FROM afiliados , bancos ,  categoriasuser , clase , departamentos , municipios , salud , activo WHERE afiliados.idCedula = '$ideditar2' AND municipios.id = afiliados.municipios_id AND departamentos.id_dep = afiliados.departamentos_id AND salud.idSalud = afiliados.Salud_idSalud AND bancos.idBancos = afiliados.Bancos_idBancos AND categoriasuser.idCategoriasuser = afiliados.idCategoriasuser AND clase.idClase = afiliados.Clase_idClase AND activo.idactivo = afiliados.activo_idactivo" or die("Error in the consult.." . mysqli_error($link)); 


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
  $NombreMunicipio = $row["Municipio"];
  $tipoName= $row["tipo"];
  $categoria = $row["Ncategoria"];
/*Datos Usuario*/
  $Nicename = $row["nicename"];
  $contrasenia = $row["contrasenia"];
  $idDepartamento = $row["id_dep"];
  $idBanco = $row["idBancos"];
  $idClase = $row["idClase"];
  $idCategoriauser = $row["idCategoriasuser"];
  $idSalud = $row["idSalud"];
  $idActivo = $row["idactivo"];

 } 
?> 



<div class="container">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                    <!-- Apartir de este espacio se genera los contenidos -->
                        <h2>
                           Editar Información de:</h2>
                           <h3>
                           Usuario: <small> <?php echo $name; ?>  <?php echo $lastname1; ?> <?php echo $lastname2; ?> </small></h3>
                           <h3>
                           Identificación: <small> <?php echo $ideditar2 ?> </small></h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> En este espacio se describe la información encontrada en la base de datos del Usuario <strong><?php echo $Nicename; ?></strong> 
                            </li>
                        </ol>
                    </div>
                </div></div>
                

<div class="container">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
      <form class="form-horizontal" action="editado.php" method="POST" name="form2">
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
						<label for="inputCedula" class="col-lg-2 control-label">Usuario:</label>
						<div class="col-lg-10">
						<input type="text" class="form-control" id="inputCedula" placeholder="<?php echo $Nicename; ?>" name="ecedula" value="<?php echo $Nicename; ?>" >
						</div>
					</div>

<!--Ingreso de contraseña-->
					<div class="form-group">
				      <label for="inputPassword" class="col-lg-2 control-label">Contraseña: </label>
				      <div class="col-lg-10">
					<input type="text" class="form-control" id="inputPassword" placeholder="Password" name="epass1" value="<?php echo $contrasenia; ?>">
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
	      <label for="inputNombres" class="col-lg-2 control-label">Nombre: </label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputNombres" placeholder="" name="enombre" value="<?php echo $name; ?>">
	      </div>
	    </div>
<!--Ingreso de Primer Apellido-->
	    <div class="form-group">
	      <label for="inputApellido" class="col-lg-2 control-label">Apellido: </label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputApellido" placeholder="" name="eapellido1" value="<?php echo $lastname1; ?>">
	      </div>
	    </div>
<!--Ingreso de Apellido 2-->
	    <div class="form-group">
	      <label for="inputApellido2" class="col-lg-2 control-label">Segundo Apellido: </label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputApellido2" placeholder="" name="eapellido2" value="<?php echo $lastname2; ?>">
	      </div>
	    </div>
<!--Ingreso de Dirección-->
	    <div class="form-group">
	      <label for="inputDireccion" class="col-lg-2 control-label">Dirección:</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputDireccion" placeholder="" name="edireccion" value="<?php echo $locality; ?>">
	      </div>
	    </div>


<!--Ingreso de email-->
	    <div class="form-group">
	      <label for="inputEmail" class="col-lg-2 control-label">Email:</label>
	      <div class="col-lg-10">
	        <input type="email" class="form-control" id="inputEmail" placeholder="" name="eemail" value="<?php echo $email; ?>">
	      </div>
	    </div>

<!--Ingreso de Telefono-->
	     <div class="form-group">
	      <label for="inputTel" class="col-lg-2 control-label">Teléfono: </label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputTel" placeholder="" name="ephone" value="<?php echo $tel; ?> ">
	      </div>
	    </div>
<!--Ingreso de Numero de Celular-->
	    <div class="form-group">
	      <label for="inputCel" class="col-lg-2 control-label">Celular: </label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputCel" placeholder="" name="ecel" value="<?php echo $cel; ?>">
	      </div>
	    </div>
<!--Ingreso de Departamento-->
	    <?php $query = "SELECT departamentos.id_dep, departamentos.nombre_departamento FROM departamentos" or die("Error in the consult.." . mysqli_error($link)); $result = mysqli_query($link, $query); ?>
          <div class="form-group">
	      <label for="intDepartamento" class="col-lg-2 control-label">Departamento: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputDepartamento" name="edepartamento">
	        <option value="<?php echo $idDepartamento; ?>" style="color:676767"><?php echo $NombreDepartamento; ?></option>
	    <?php while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$row["id_dep"])."\">".$row["nombre_departamento"]."</option>\n"; }?> 
	        </select></div></div>

<!--Ingreso de Municipio-->
	   <div class="form-group">
	      <label for="inputTel" class="col-lg-2 control-label">Municipio</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputTel" placeholder="" name="emunicipio" value="<?php echo $NombreMunicipio; ?>">
	      </div>
	    </div>

	    

<!--Ingreso de Fecha de Nacimiento-->
	   <div class="form-group">
	      <label for="inputTel" class="col-lg-2 control-label">Fecha de Nacimiento</label>
	      <div class="col-lg-10">
	        <input type="date" class="form-control" name="enacimiento" id="inputTel" placeholder="" value="<?php echo $fage; ?>"></div></div>


<!--Ingreso de Banco-->
    <?php $querybk = "SELECT `bancos`.* FROM `bancos`" or die("Error in the consult.." . mysqli_error($link)); $resultbk = mysqli_query($link, $querybk); ?>
          <div class="form-group">
	       <label for="inputBanco" class="col-lg-2 control-label">Entidad Bancaria: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputBanco" name="ebanco">
	        <option value="<?php echo $idBanco; ?>" style="color:676767"><?php echo $bancoName; ?></option>
	         <?php
				while($rowbk = mysqli_fetch_array($resultbk , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$rowbk["idBancos"])."\">".$rowbk["BancoName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>


<!--COMBO BOX SALUD-->
	    <?php $querysl = "SELECT `salud`.* FROM `salud` " or die("Error in the consult.." . mysqli_error($link)); $resultsl = mysqli_query($link, $querysl); ?>
          <div class="form-group">
	       <label for="inputSalud" class="col-lg-2 control-label">Entidad de Salud: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputSalud" name="esalud">
	        <option value="<?php echo $idSalud;?>" style="color:676767"><?php echo $saludName; ?></option>
	         <?php
				while($rowsl = mysqli_fetch_array($resultsl , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$rowsl["idSalud"])."\">".$rowsl["SaludName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>




<!--COMBO BOX CLASE-->
	    <?php $querysl = "SELECT `clase`.* FROM `clase`" or die("Error in the consult.." . mysqli_error($link)); $resultsl = mysqli_query($link, $querysl); ?>
          <div class="form-group">
	       <label for="inputClase" class="col-lg-2 control-label">Clase: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputClase" name="eclase">
	        <option value="<?php echo $idClase;?>" style="color:676767"><?php echo $claseName; ?></option>
	         <?php
				while($rowsl = mysqli_fetch_array($resultsl , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$rowsl["idClase"])."\">".$rowsl["ClaseName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>



<!--COMBO BOX CATEGORIA-->
	    <?php $querysl = "SELECT `categoriasuser`.* FROM `categoriasuser`" or die("Error in the consult.." . mysqli_error($link)); $resultsl = mysqli_query($link, $querysl); ?>
          <div class="form-group">
	       <label for="inputTipo" class="col-lg-2 control-label">Categoría Usuario:  </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputTipo" name="etipo">
	        <option value="<?php echo $idCategoriauser;?>" style="color:676767"><?php echo $categoria; ?></option>
	         <?php
				while($rowsl = mysqli_fetch_array($resultsl , MYSQLI_ASSOC)) { 

				  echo "<option value=\"".str_replace(" ","_",$rowsl["idCategoriasuser"])."\">".$rowsl["Ncategoria"]."</option>\n";
				 
					 }?> 
	        </select></div></div>



<!--COMBO BOX ACTIVO INACTIVO-->
	    <?php $querysl = "SELECT `activo`.* FROM `activo`" or die("Error in the consult.." . mysqli_error($link)); $resultsl = mysqli_query($link, $querysl); ?>
          <div class="form-group">
	       <label for="inputActivo" class="col-lg-2 control-label">Activo/inactivo: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputActivo" name="eactivo">
	        <option value="<?php $idActivo;?>" style="color:676767"><?php echo $tipoName; ?></option>
	         <?php
				while($rowsl = mysqli_fetch_array($resultsl , MYSQLI_ASSOC)) { 
					
				  echo "<option style='text-transform:uppercase;' value=\"".str_replace(" ","_",$rowsl["idactivo"])."\">".$rowsl["tipo"]."</option>\n";
				 
					 }?> 
	        </select></div></div>



	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">

	        <button type="submit" class="btn btn-primary">Enviar todo y Terminar</button>
	      </div>
	    </div>
														</div>
													</div>
												</div>
											</div>
							</fieldset>
						</form>
						
						<!--"Fin del Formulario"-->
</div></div></div></div>

  <?php include 'template/footer.php'; ?>

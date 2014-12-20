<?php require_once('session.php');?>
<?php require_once('conexion.php');?>
<?php include 'template/head.php'; ?>
<?php include 'template/nav.php'; ?>


<?php 

$er_ideditar2 = $_SESSION['id'];
$_SESSION['editaruser'] = $er_ideditar2;

$er_query = "SELECT afiliados.idCedula, afiliados.Apellido, afiliados.segApellido, afiliados.FNacimiento, afiliados.Nombre, afiliados.Direccion, afiliados.Telefonofijo, afiliados.TelCelular, afiliados.email, afiliados.nicename, afiliados.contrasenia, bancos.BancoName, categoriasuser.Ncategoria, clase.ClaseName, departamentos.nombre_departamento, municipios.nombre_municipio, afiliados.Municipio, salud.SaludName, activo.tipo, bancos.idBancos, categoriasuser.idCategoriasuser, clase.idClase, departamentos.id_dep, salud.idSalud, activo.idactivo FROM afiliados , bancos ,  categoriasuser , clase , departamentos , municipios , salud , activo WHERE afiliados.idCedula = '$er_ideditar2' AND municipios.id = afiliados.municipios_id AND departamentos.id_dep = afiliados.departamentos_id AND salud.idSalud = afiliados.Salud_idSalud AND bancos.idBancos = afiliados.Bancos_idBancos AND categoriasuser.idCategoriasuser = afiliados.idCategoriasuser AND clase.idClase = afiliados.Clase_idClase AND activo.idactivo = afiliados.activo_idactivo" or die("Error in the consult.." . mysqli_error($link)); 


$er_result = mysqli_query($link, $er_query); 

while($er_row = mysqli_fetch_array($er_result , MYSQLI_ASSOC)) { 
  $er_idcedula = $er_row["idCedula"]; 
  $er_name = $er_row["Nombre"]; 
  $er_lastname1 = $er_row["Apellido"]; 
  $er_lastname2 = $er_row["segApellido"]; 
  $er_fage = $er_row["FNacimiento"]; 
  $er_locality = $er_row["Direccion"]; 
  $er_tel = $er_row["Telefonofijo"]; 
  $er_cel = $er_row["TelCelular"];
  $er_email = $er_row["email"];
/*Datos adicionales*/
  $er_bancoName = $er_row["BancoName"];
  $er_claseName = $er_row["ClaseName"];
  $er_saludName = $er_row["SaludName"];
  $er_NombreDepartamento = $er_row["nombre_departamento"];
  $er_NombreMunicipio = $er_row["Municipio"];
  $er_tipoName= $er_row["tipo"];
  $er_categoria = $er_row["Ncategoria"];
/*Datos Usuario*/
  $er_Nicename = $er_row["nicename"];
  $er_contrasenia = $er_row["contrasenia"];
  $er_idDepartamento = $er_row["id_dep"];
  $er_idBanco = $er_row["idBancos"];
  $er_idClase = $er_row["idClase"];
  $er_idSalud = $er_row["idSalud"];

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
                           Usuario: <small> <?php echo $er_name; ?>  <?php echo $er_lastname1; ?> <?php echo $er_lastname2; ?> </small></h3>
                           <h3>
                           Identificación: <small> <?php echo $er_ideditar2 ?> </small></h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> En este espacio se describe la información encontrada en la base de datos del Usuario <strong><?php echo $er_Nicename; ?></strong> 
                            </li>
                        </ol>
                    </div>
                </div></div>
                

<div class="container">
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
      <form class="form-horizontal" action="editadouser.php" method="POST" name="form2">
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
		
<!--Ingreso de Usurio-->
					<div class="form-group">
						<label for="inputCedula" class="col-lg-2 control-label">Usuario:</label>
						<div class="col-lg-10">
						<input type="text" class="form-control" id="inputUser" placeholder="Usuario/Cedula" name="er_user" value="<?php echo $er_Nicename; ?>" disabled>
						</div>
					</div>
		
<!--Ingreso de contraseña-->
					<div class="form-group">
				      <label for="inputPassword" class="col-lg-2 control-label">Contraseña: </label>
				      <div class="col-lg-10">
					<input type="text" class="form-control" id="inputPassword" placeholder="Password" name="er_pass1" value="<?php echo $er_contrasenia; ?>">
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
	        <input type="text" class="form-control" id="inputNombres" placeholder="" name="er_nombre" value="<?php echo $er_name; ?>">
	      </div>
	    </div>
<!--Ingreso de Primer Apellido-->
	    <div class="form-group">
	      <label for="inputApellido" class="col-lg-2 control-label">Apellido: </label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputApellido" placeholder="" name="er_apellido1" value="<?php echo $er_lastname1; ?>">
	      </div>
	    </div>
<!--Ingreso de Apellido 2-->
	    <div class="form-group">
	      <label for="inputApellido2" class="col-lg-2 control-label">Segundo Apellido: </label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputApellido2" placeholder="" name="er_apellido2" value="<?php echo $er_lastname2; ?>">
	      </div>
	    </div>
<!--Ingreso de Dirección-->
	    <div class="form-group">
	      <label for="inputDireccion" class="col-lg-2 control-label">Dirección:</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputDireccion" placeholder="" name="er_direccion" value="<?php echo $er_locality; ?>">
	      </div>
	    </div>


<!--Ingreso de Dirección-->
	    <div class="form-group">
	      <label for="inputEmail" class="col-lg-2 control-label">Email:</label>
	      <div class="col-lg-10">
	        <input type="email" class="form-control" id="inputEmail" placeholder="" name="er_email" value="<?php echo $er_email; ?>">
	      </div>
	    </div>

<!--Ingreso de Telefono-->
	     <div class="form-group">
	      <label for="inputTel" class="col-lg-2 control-label">Teléfono: </label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputTel" placeholder="" name="er_phone" value="<?php echo $er_tel; ?> ">
	      </div>
	    </div>
<!--Ingreso de Numero de Celular-->
	    <div class="form-group">
	      <label for="inputCel" class="col-lg-2 control-label">Celular: </label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputCel" placeholder="" name="er_cel" value="<?php echo $er_cel; ?>">
	      </div>
	    </div>
<!--Ingreso de Departamento-->
	    <?php $er_query = "SELECT departamentos.id_dep, departamentos.nombre_departamento FROM departamentos" or die("Error in the consult.." . mysqli_error($link)); $er_result = mysqli_query($link, $er_query); ?>
          <div class="form-group">
	      <label for="intDepartamento" class="col-lg-2 control-label">Departamento: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputDepartamento" name="er_departamento">
	        <option value="<?php echo $er_idDepartamento; ?>" style="color:676767"><?php echo $er_NombreDepartamento; ?></option>
	    <?php while($er_row = mysqli_fetch_array($er_result , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$er_row["id_dep"])."\">".$er_row["nombre_departamento"]."</option>\n"; }?> 
	        </select></div></div>

<!--Ingreso de Municipio-->
	   <div class="form-group">
	      <label for="inputTel" class="col-lg-2 control-label">Municipio</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputTel" placeholder="" name="er_municipio" value="<?php echo $er_NombreMunicipio; ?>">
	      </div>
	    </div>

	    

<!--Ingreso de Fecha de Nacimiento-->
	   <div class="form-group">
	      <label for="inputTel" class="col-lg-2 control-label">Fecha de Nacimiento</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" name="er_nacimiento" id="inputTel" placeholder="" value="<?php echo $er_fage; ?>"></div></div>


<!--Ingreso de Banco-->
    <?php $er_querybk = "SELECT `bancos`.* FROM `bancos`" or die("Error in the consult.." . mysqli_error($link)); $er_resultbk = mysqli_query($link, $er_querybk); ?>
          <div class="form-group">
	       <label for="inputBanco" class="col-lg-2 control-label">Entidad Bancaria: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputBanco" name="er_banco">
	        <option value="<?php echo $er_idBanco; ?>" style="color:676767"><?php echo $er_bancoName; ?></option>
	         <?php
				while($er_rowbk = mysqli_fetch_array($er_resultbk , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$er_rowbk["idBancos"])."\">".$er_rowbk["BancoName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>


<!--COMBO BOX SALUD-->
	    <?php $er_querysl = "SELECT `salud`.* FROM `salud` " or die("Error in the consult.." . mysqli_error($link)); $er_resultsl = mysqli_query($link, $er_querysl); ?>
          <div class="form-group">
	       <label for="inputSalud" class="col-lg-2 control-label">Entidad de Salud: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputSalud" name="er_salud">
	        <option value="<?php echo $er_idSalud;?>" style="color:676767"><?php echo $er_saludName; ?></option>
	         <?php
				while($er_rowsl = mysqli_fetch_array($er_resultsl , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$er_rowsl["idSalud"])."\">".$er_rowsl["SaludName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>




<!--COMBO BOX CLASE-->
	    <?php $er_querysl = "SELECT `clase`.* FROM `clase`" or die("Error in the consult.." . mysqli_error($link)); $er_resultsl = mysqli_query($link, $er_querysl); ?>
          <div class="form-group">
	       <label for="inputClase" class="col-lg-2 control-label">Clase: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputClase" name="er_clase">
	        <option value="<?php echo $er_idClase;?>" style="color:676767"><?php echo $er_claseName; ?></option>
	         <?php
				while($er_rowsl = mysqli_fetch_array($er_resultsl , MYSQLI_ASSOC)) { 
				  echo "<option value=\"".str_replace(" ","_",$er_rowsl["idClase"])."\">".$er_rowsl["ClaseName"]."</option>\n";
				 
					 }?> 
	        </select></div></div>



<!--COMBO BOX CATEGORIA
	    <?php $er_querysl = "SELECT `categoriasuser`.* FROM `categoriasuser`" or die("Error in the consult.." . mysqli_error($link)); $er_resultsl = mysqli_query($link, $er_querysl); ?>
          <div class="form-group">
	       <label for="inputTipo" class="col-lg-2 control-label">Categoría Usuario:  </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputTipo" name="er_tipo">
	        <option value="<?php echo $er_idCategoriauser;?>" style="color:676767"><?php echo $er_categoria; ?></option>
	         <?php
				while($er_rowsl = mysqli_fetch_array($er_resultsl , MYSQLI_ASSOC)) { 

				  echo "<option value=\"".str_replace(" ","_",$er_rowsl["idCategoriasuser"])."\">".$er_rowsl["Ncategoria"]."</option>\n";
				 
					 }?> 
	        </select></div></div>-->


<!--COMBO BOX ACTIVO INACTIVO
	    <?php $er_querysl = "SELECT `activo`.* FROM `activo`" or die("Error in the consult.." . mysqli_error($link)); $er_resultsl = mysqli_query($link, $er_querysl); ?>
          <div class="form-group">
	       <label for="inputActivo" class="col-lg-2 control-label">Activo/inactivo: </label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputActivo" name="er_activo">
	        <option value="<?php $er_idActivo;?>" style="color:676767"><?php echo $er_tipoName; ?></option>
	         <?php
				while($er_rowsl = mysqli_fetch_array($er_resultsl , MYSQLI_ASSOC)) { 
					
				  echo "<option style='text-transform:uppercase;' value=\"".str_replace(" ","_",$er_rowsl["idactivo"])."\">".$er_rowsl["tipo"]."</option>\n";
				 
					 }?> 
	        </select></div></div>-->



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

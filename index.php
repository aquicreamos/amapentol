<?php session_start(); ob_start(); require_once('conexion.php');?>
<?php include 'template/head.php';?>
<div class="container">
	<div class="col-lg-12">
		<div class="row" style="width: 500px; margin:60px auto 0 auto; background-color: #ccc; color:#FFF; padding: 20px;">
<form action="sessionvalidar.php" method="POST" name="inicio">
  <fieldset>
    <legend>Ingresar un Usuario</legend>
    <div class="form-group">
      <label for="usuario" class="col-lg-3 control-label">Usuario</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="Usuario" placeholder="No de Identificación" name="user">
      </div>
    </div>
    <div class="form-group">
      <label for="Contrasenia" class="col-lg-3 control-label">Contraseña</label>
      <div class="col-lg-9">
        <input type="password" class="form-control" id="contrasenia" placeholder="contraseña" name="contrasenia">
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
           <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
	</div>
</div>
<?php include 'template/footer.php'; session_destroy();?>



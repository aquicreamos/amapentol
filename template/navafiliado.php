<!-- Navigation -->
<div class="container">
<div class="row">
<div class="col-lg-12">  



<div class="navbar navbar-default">
  <div class="navbar-header" class="col-lg-9">
  <ul class="nav navbar-nav" >
      <li class="active"><a href="entrada.php">Inicio</a></li>
      <li><a href="editaruser.php">Editar datos de Usuario</a></li>
    </ul></div>

    <div class="navbar-header" class="col-lg-3">
      <ul class="nav navbar-nav">
      <li><a href="#">Usted esta autenticado como: <span class="label label-default"><?php echo $_SESSION['id']; ?></span></a></li>
      <li><a href="sessionClose.php"><button type="button" class="btn btn-default btn-success" style="margin-top:-5px">Salir</button></a></li>
    </ul>
      </div>
   
   </div>
</div></div></div></div>
   

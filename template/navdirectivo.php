<!-- Navigation -->
<div class="container">
<div class="row">
<div class="col-lg-12">  



<div class="navbar navbar-default">
  <div class="navbar-header" class="col-lg-9">
  <ul class="nav navbar-nav" >
      <li class="active"><a href="entrada.php">Inicio</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="search.php">Buscar Usuario</a></li>
          <li><a href="ingreso.php">Insertar</a></li>
          <li><a href="editsearch.php">Editar</a></li>
          </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informes <b class="caret"></b></a>
        <ul class="dropdown-menu">
          
          <li><a href="reportebanco.php">Bancos</a></li>
          <li><a href="reportesalud.php">Salud</a></li>
          <li><a href="reporteclase.php">Clase</a></li>
          <li><a href="reporteadmin.php">Categoría</a></li>
           <!--<li><a href="#">Correo Electronico</a></li>-->
        </ul>
      </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fechas <b class="caret"></b></a>
        <ul class="dropdown-menu">
          
          
          <li><a href="reporteanio.php">Año</a></li>
          <li><a href="reportemes.php">Mes</a></li>
           <!--<li><a href="#">Correo Electronico</a></li>-->
        </ul>
      </li>
    </ul></div>

    <div class="navbar-header" class="col-lg-3">
      <ul class="nav navbar-nav">
      <li><a href="#">Usted esta autenticado como: <span class="label label-default"><?php echo $_SESSION['id']; ?></span></a></li>
      <li><a href="sessionClose.php"><button type="button" class="btn btn-default btn-success" style="margin-top:-5px">Salir</button></a></li>
    </ul>
      </div>
   
   </div>
</div></div></div></div>
   

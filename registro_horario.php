<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->

  <title>Registro Horario</title>
  <!-- Custom CSS -->
  <link href="css/chartist.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.min.css" rel="stylesheet">

  <link href="css/ie7.css" rel="stylesheet">

  <link href="css/materialdesignicons.min.css" rel="stylesheet">
  <link href="css/weather-icons.min.css" rel="stylesheet">

  <link href="css/registro.css" rel="stylesheet" media="all">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <?php
  //session_start();
  if (!isset($_SESSION['tipousuario'])) {
    //llamado del archivo mysql
    require_once 'Modelo/MySQL.php';
    //creacion de nueva "consulta"
    $mysql = new MySQL;
    //se conecta a la base de datos
    $mysql->conectar();
    //respectiva consulta para la seleccion de usuario
    $seleccionaula = $mysql->efectuarConsulta("SELECT asistencia.aula.id_aula,asistencia.aula.nombre from aula");
    $seleccionmateria = $mysql->efectuarConsulta("SELECT asistencia.materia.id_materia,asistencia.materia.nombre from materia");
    $seleccionhorario = $mysql->efectuarConsulta("SELECT asistencia.horario.id_horario, asistencia.horario.hora from horario");
    //se desconecta de la base de datos
    $mysql->desconectar();
  }
  ?>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
      <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin5">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
          </a>
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <div class="navbar-brand">
            <a href="index.html" class="logo">
              <!-- Logo icon -->
              <b class="logo-icon">

              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text">

              </span>
            </a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i>
          </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->

      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php
    //funcion donde se llama al menu superior del usuario
    include("menu_administrador.html");
    ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->

      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <div class="row">




        </div>
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Ravenue - page-view-bounce rate -->
        <!-- ============================================================== -->
        <div class="row">
          <!-- column -->
          <div class="col-12">
            <div class="card">
              <div class="card-body">

                <div class="container" style="text-align: center">
                  <form id="contact" action="Controlador/insertar_horario.php" method="post">
                    <h3>Registro del Horario</h3>
                    <h4>Recuerda llenar todos los campos</h4>
                    <fieldset>
                      <label>Hora Estimada: </label><br>
                      <input placeholder="hora" type="time" tabindex="1" autofocus name="hora" class="form-control" min="07:00:00" max="18:00:00" step="1">
                    </fieldset>
                    <br>
                    <fieldset>
                      <select class="form-control " name="materia" required>
                        <?php
                        //ciclo while que nos sirve para traer cuales son los tipos de usuario (paciente, medico)
                        while ($resultado = mysqli_fetch_assoc($seleccionmateria)) {
                        ?>
                          <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                          <option value="<?php echo $resultado['id_materia'] ?>"><?php echo $resultado['nombre'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </fieldset>
                    <br>
                    <fieldset>
                      <select class="form-control " name="aula" required>
                        <?php
                        //ciclo while que nos sirve para traer cuales son los tipos de usuario (paciente, medico)
                        while ($resultado = mysqli_fetch_assoc($seleccionaula)) {
                        ?>
                          <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                          <option value="<?php echo $resultado['id_aula'] ?>"><?php echo $resultado['nombre'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </fieldset>
                    <br>
                    <fieldset>
                      <label>Horario: </label>
                      <select name="horario" class="form-control">
                        <option value="0" disabled="">Seleccione:</option>
                        <?php
                        //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                        while ($valores1 = mysqli_fetch_assoc($seleccionhorario)) {
                        ?>
                          <!--se traen los datos a mostrar en el select-->
                          <option value="<?php echo $valores1['id_horario'] ?>"><?php echo $valores1['id_horario'] . " - Hora: " . $valores1['hora'] ?></option>';
                        <?php
                        }
                        ?>

                      </select>
                    </fieldset>
                    <br>
                    <fieldset>
                      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="col-2">Registrar</button>
                    </fieldset>

                  </form>
                  <fieldset>
                    <center><a href="update_horario.php"><button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="form-control col-2" style="background-color: #037537;color: white">Modificar Horario</button></a></center>
                  </fieldset>
                  <fieldset>
                    <center><a href="#"><button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="form-control col-2" style="background-color: #037537;color: white">Eliminar Horario</button></a></center>
                  </fieldset>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          All Rights Reserved by asistencias COTECNOVA
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="js/chartist.min.js"></script>
    <script src="js/chartist-plugin-tooltip.min.js"></script>
    <script src="js/dashboard1.js"></script>
</body>

</html>
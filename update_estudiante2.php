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

  <title>Update Estudiante</title>
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
    $id_usuario = $_POST['usuario'];
    //respectiva consulta para la seleccion de usuario

    $mostrardatos = $mysql->efectuarConsulta("SELECT asistencia.estudiante.documento,asistencia.estudiante.nombres,asistencia.estudiante.apellidos,asistencia.estudiante.jornada,asistencia.estudiante.semestre,asistencia.estudiante.clave,asistencia.estudiante.Carrera_id_carrera,asistencia.estudiante.tipo_usuario_id_tipo_usuario from estudiante WHERE asistencia.estudiante.id_estudiante = " . $id_usuario . "");


    $seleccionUsuario = $mysql->efectuarConsulta("SELECT asistencia.tipo_usuario.id_tipo_usuario, asistencia.tipo_usuario.nombre from tipo_usuario where asistencia.tipo_usuario.id_tipo_usuario = 1");
    //$seleccionhorario = $mysql->efectuarConsulta("SELECT asistencia.horario.id_horario from horario");
    $seleccioncarrera = $mysql->efectuarConsulta("SELECT asistencia.carrera.id_carrera, asistencia.carrera.nombre from carrera");
    while ($valores1 = mysqli_fetch_assoc($mostrardatos)) {
      //declaracion de variables
      $doc = $valores1['documento'];
      $nombre = $valores1['nombres'];
      $apellido = $valores1['apellidos'];
      $jornada = $valores1['jornada'];
      $semestre = $valores1['semestre'];
      $clave = $valores1['clave'];
      
      $carrera = $valores1['Carrera_id_carrera'];
      $tipo = $valores1['tipo_usuario_id_tipo_usuario'];
    }
  }
  $mysql->desconectar(); //funcion llamada desde mysql.php
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

                <div class="container col-md-6 col-md-offset-3" style="text-align: center">
                  <form id="contact" action="Controlador/update_estudiante.php?id=<?php echo $id_usuario; ?>" method="post">
                    <h3>Update del Estudiante</h3>
                    <h4>Recuerda llenar todos los campos</h4>
                    
                    <div class="form-group row" align="Left">
                      <label class="col-sm-3 col-form-label">ID del Estudiante</label>
                      <div class="col-sm-9">
                        <input placeholder="ID del estudiante" disabled="" class="form-control" type="text" name="id" id="inputText" value="<?php echo $id_usuario ?>">
                      </div>
                    </div>
                    
                    <div class="form-group row" align="Left">
                      <label class="col-sm-3 col-form-label">Documento</label>
                      <div class="col-sm-9">
                        <input placeholder="Documento" class="form-control" type="text" name="documento_usuario" id="inputText" value="<?php echo $doc ?>">
                      </div>
                    </div>
                    
                    <div class="form-group row" align="Left">
                      <label class="col-sm-3 col-form-label">Nombres</label>
                      <div class="col-sm-9">
                        <input placeholder="Nombres" class="form-control" type="text" name="nombre_usuario" id="inputText" value="<?php echo $nombre ?>">
                      </div>
                    </div>

                    <div class="form-group row" align="Left">
                      <label class="col-sm-3 col-form-label">Apellidos</label>
                      <div class="col-sm-9">
                        <input placeholder="Apellidos" class="form-control" type="text" name="apellido_usuario" id="inputText" value="<?php echo $apellido ?>">
                      </div>
                    </div>
                    
                    <div class="form-group row" align="Left">
                      <label class="col-sm-3 col-form-label">Semestre</label>
                      <div class="col-sm-9">
                        <input placeholder="Semestre" class="form-control" type="text" name="Semestre" id="inputText" value="<?php echo $semestre ?>">
                      </div>
                    </div>

                    <div class="form-group row" align="Left">
                      <label class="col-sm-3 col-form-label">Clave</label>
                      <div class="col-sm-9">
                        <input placeholder="Clave" class="form-control" type="text" name="clave" id="inputText" value="<?php echo $clave ?>">
                      </div>
                    </div>

                    <fieldset>
                      <label>Tipo de usuario</label>
                      <select class="form-control " name="tipousuario" required>
                        <option value="0" disabled="">Seleccione:</option>
                        <?php
                        //ciclo while que nos sirve para traer cuales son los tipos de usuario (paciente, medico)
                        while ($resultado = mysqli_fetch_assoc($seleccionUsuario)) {
                        ?>
                          <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                          <option value="<?php echo $resultado['id_tipo_usuario'] ?>"><?php echo $resultado['nombre'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </fieldset>
                    <br>
                   
                    <fieldset>
                      <label>Carrera: </label>
                      <select name="carrera" class="form-control">
                        <option value="0" disabled="">Seleccione:</option>
                        <?php
                        //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                        while ($valores1 = mysqli_fetch_assoc($seleccioncarrera)) {
                        ?>
                          <!--se traen los datos a mostrar en el select-->
                          <option value="<?php echo $valores1['id_carrera'] ?>"><?php echo $valores1['nombre'] ?></option>';
                        <?php
                        }
                        ?>

                      </select>
                    </fieldset>
                    <br>

                    <fieldset>
                      <label>Jornada: </label><br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Diurna" required="">
                        <label class="form-check-label" for="inlineRadio1">Diurna</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Nocturna">
                        <label class="form-check-label" for="inlineRadio2">Nocturna</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Sabatina">
                        <label class="form-check-label" for="inlineRadio3">Sabatina</label>
                      </div>
                    </fieldset>
                    <br>
                    
                    <fieldset>
                      <button name="enviar" type="submit" id="contact-submit" data-submit="...Sending" class="col-3">Actualizar</button>
                    </fieldset>

                  </form>

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
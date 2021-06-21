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
  session_start();

  //llamado del archivo mysql
  require_once 'Modelo/MySQL.php';
  //creacion de nueva "consulta"
  $mysql = new MySQL;
  //se conecta a la base de datos
  $mysql->conectar();
  $id_docente = $_SESSION['idDocente'];
  $id = $_POST['materiaselect'];

  $datosdocente = $mysql->efectuarConsulta("SELECT docente.id_docente, docente.nombres, docente.documento, docente.tipo_usuario_id_tipo_usuario, tipo_usuario.nombre from docente join tipo_usuario on tipo_usuario.id_tipo_usuario = docente.tipo_usuario_id_tipo_usuario where docente.id_docente = " . $id_docente . "");
  while ($valores1 = mysqli_fetch_assoc($datosdocente)) {
    $documento = $valores1['documento'];
    $nombres = $valores1['nombres'];
    $tipo_usuario = $valores1['nombre'];
  }
  //respectiva consulta para la seleccion de usuario
  $seleccionmateria = $mysql->efectuarConsulta("SELECT asistencia.docente.id_docente, materia.nombre from docente join clase on clase.Docente_id_docente = docente.id_docente join grupo on grupo.id_grupo = clase.Grupo_id_grupo join materia on materia.id_materia = clase.Materia_id_materia where clase.Materia_id_materia = " . $id . "");
  //se inicia el recorrido para mostrar los datos de la BD

  while ($valores1 = mysqli_fetch_assoc($seleccionmateria)) {
    //declaracion de variables
    $smateria = $valores1['nombre'];
  }

  $selecciongrupo = $mysql->efectuarConsulta("SELECT asistencia.clase.Grupo_id_grupo, asistencia.grupo.nombre as nombregrupo FROM clase JOIN grupo on asistencia.grupo.id_grupo = asistencia.clase.Grupo_id_grupo WHERE asistencia.clase.Materia_id_materia = " . $id . "");

  //se desconecta de la base de datos
  $mysql->desconectar();

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
    include("menu_docente.html");
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
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-5 align-self-center">
            <h4 class="page-title">Bienvenido</h4>
            <?php echo "ID Docente: " . $_SESSION['idDocente']; ?>
            <br>
            <?php echo " Materia: " . $smateria ?>
          </div>

        </div>
      </div>
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


                <div class="row">
                  <!-- column -->
                  <div class="col-12">
                    <div class="card">
                      <center>
                        <div class="card-body col-md-6 col-md-offset-3">
                          <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">Documento</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo de usuario</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row"><?php echo $documento ?></th>
                                <td><?php echo $nombres ?></td>
                                <td><?php echo $tipo_usuario ?></td>
                              </tr>
                            </tbody>
                          </table>
                          </tbody>
                          </table>
                        </div>
                      </center>
                    </div>
                  </div>
                </div>

                <div class="container col-md-6 col-md-offset-3" style="text-align: center">
                  <form id="contact" action="registro_clase_docente3.php" method="post">
                    <h4>Grupos disponibles en la materia:</h4>
                    <input name="materianombre" disabled class="form-control" value="<?php echo $smateria ?>">
                    <br>
                    <fieldset>
                      <select class="form-control " name="selectgrupo" required>
                        <?php
                        //ciclo while que nos sirve para traer cuales son los tipos de usuario (paciente, medico)
                        while ($resultado = mysqli_fetch_assoc($selecciongrupo)) {
                        ?>
                          <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                          <option value="<?php echo $resultado['id_grupo'] ?>"><?php echo $resultado['nombregrupo'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </fieldset>
                    <br>
                    <fieldset>
                      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="col-3">Seleccionar</button>
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
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

  <title>Clases Vistas</title>
  <!-- Custom CSS -->
  <link href="css/chartist.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.min.css" rel="stylesheet">

  <link href="css/ie7.css" rel="stylesheet">

  <link href="css/materialdesignicons.min.css" rel="stylesheet">
  <link href="css/weather-icons.min.css" rel="stylesheet">

  <link href="css/registro.css" rel="stylesheet" media="all">


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
  $id_estudiante = $_SESSION['idEstudiante'];
  //$id = $_POST['materiaselect'];

  $datosdocente = $mysql->efectuarConsulta("SELECT estudiante.id_estudiante, estudiante.nombres, estudiante.apellidos, estudiante.documento, estudiante.tipo_usuario_id_tipo_usuario, tipo_usuario.nombre from estudiante join tipo_usuario on tipo_usuario.id_tipo_usuario = estudiante.tipo_usuario_id_tipo_usuario where estudiante.id_estudiante = " . $id_estudiante . "");
  while ($valores1 = mysqli_fetch_assoc($datosdocente)) {
    $documento = $valores1['documento'];
    $nombres = $valores1['nombres'];
    $apellidos = $valores1['apellidos'];
    $tipo_usuario = $valores1['nombre'];
  }

  $MostrarDatos = $mysql->efectuarConsulta("SELECT asistencia.a_estudiante.ida_estudiante, asistencia.a_estudiante.clase_id_clase, asistencia.clase.Materia_id_materia, asistencia.materia.nombre, asistencia.grupo.nombre as nombregrupo, asistencia.a_estudiante.fecha, asistencia.a_estudiante.asistio FROM a_estudiante JOIN asistencia.clase ON asistencia.a_estudiante.clase_id_clase = asistencia.clase.id_clase JOIN asistencia.materia ON asistencia.clase.Materia_id_materia = asistencia.materia.id_materia JOIN asistencia.grupo ON asistencia.clase.Grupo_id_grupo = asistencia.grupo.id_grupo WHERE asistencia.a_estudiante.asistio = 'Si' GROUP BY asistencia.materia.nombre");
  
  $MostrarDatos2 = $mysql->efectuarConsulta("SELECT asistencia.a_estudiante.ida_estudiante, asistencia.a_estudiante.clase_id_clase, asistencia.clase.Materia_id_materia, asistencia.materia.nombre, asistencia.grupo.nombre as nombregrupo, asistencia.a_estudiante.fecha, asistencia.a_estudiante.asistio FROM a_estudiante JOIN asistencia.clase ON asistencia.a_estudiante.clase_id_clase = asistencia.clase.id_clase JOIN asistencia.materia ON asistencia.clase.Materia_id_materia = asistencia.materia.id_materia JOIN asistencia.grupo ON asistencia.clase.Grupo_id_grupo = asistencia.grupo.id_grupo WHERE asistencia.a_estudiante.asistio = 'No' GROUP BY asistencia.materia.nombre");
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
    include("menu_estudiante.html");
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
            <!--<?php echo "ID Estudiante: " . $_SESSION['idEstudiante']; ?>-->
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
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th scope="col">Documento</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo de usuario</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row"><?php echo $documento ?></th>
                                <td><?php echo $nombres." ".$apellidos ?></td>
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

                <div class="card">
                  <div class="card-body">
                    <center>
                      <h3>Clases Asistidas</h3>
                      <br>
                    </center>
                    <div class="container col-md-11 col-md-offset-3">
                      <!--DATATABLE-->
                      <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Nombre de la clase</th>
                            <th>Nombre del grupo</th>
                            <th>Fecha de registro</th>
                            <th>Asistio</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                            while ($valores1 = mysqli_fetch_assoc($MostrarDatos)) {
                              $ida_estudiante = $valores1 ['ida_estudiante'];
                            ?>
                              <td><?php echo $valores1['nombre'] ?></td>
                              <td><?php echo $valores1['nombregrupo'] ?></td>
                              <td><?php echo $valores1['fecha'] ?></td>
                              <td style="color: green;"><?php echo $valores1['asistio'] ?></td>
                              <td>
                                <div class="text-center">
                                  <a class="btn" style="background-color: #2EC82E;color: white" href='vista_a_estudiante.php?ida_estudiante=<?php echo $ida_estudiante; ?>' role="button"><i class="mdi mdi-eye"></i></a>
                                </div>
                              </td>
                          </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                      </table>
                      <script>
                        $(document).ready(function() {
                          $('#example2').DataTable();
                        });
                      </script>
                    </div>
                  </div>
                </div>





                <div class="card">
                  <div class="card-body">
                    <center>
                      <h3>Clases No Asistidas</h3>
                      <br>
                    </center>
                    <div class="container col-md-11 col-md-offset-3">
                      <!--DATATABLE-->
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Nombre de la clase</th>
                            <th>Nombre del grupo</th>
                            <th>Fecha de registro</th>
                            <th>Asistio</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php
                            while ($valores1 = mysqli_fetch_assoc($MostrarDatos2)) {
                              $ida_estudiante = $valores1 ['ida_estudiante'];
                            ?>
                              <td><?php echo $valores1['nombre'] ?></td>
                              <td><?php echo $valores1['nombregrupo'] ?></td>
                              <td><?php echo $valores1['fecha'] ?></td>
                              <td style="color: red;"><?php echo $valores1['asistio'] ?></td>
                              <td>
                                <div class="text-center">
                                <a class="btn" style="background-color: #2EC82E;color: white" href='vista_a_estudiante.php?ida_estudiante=<?php echo $ida_estudiante; ?>' role="button"><i class="mdi mdi-eye"></i></a>
                                </div>
                              </td>
                          </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                      </table>
                      <script>
                        $(document).ready(function() {
                          $('#example').DataTable();
                        });
                      </script>
                    </div>
                  </div>
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

    <!--datatables-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</body>

</html>
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

  <title>Gestionar Clases</title>
  <!-- Custom CSS -->
  <link href="css/chartist.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/style.min.css" rel="stylesheet">

  <link href="css/ie7.css" rel="stylesheet">

  <link href="css/materialdesignicons.min.css" rel="stylesheet">
  <link href="css/weather-icons.min.css" rel="stylesheet">

  <link href="css/registro.css" rel="stylesheet" media="all">


  <!--datatables-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" media="all">
  <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" media="all">

  

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
    $MostrarDatos = $mysql->efectuarConsulta("SELECT asistencia.clase.id_clase, asistencia.clase.hora, asistencia.clase.horafin, asistencia.clase.Materia_id_materia, asistencia.materia.nombre as materianombre, asistencia.clase.Aula_id_aula, asistencia.aula.nombre as aulanombre, asistencia.clase.codigo, asistencia.dias.id_dia, asistencia.dias.nombre as nombredia, asistencia.docente.id_docente, docente.nombres, docente.apellidos, clase.Grupo_id_grupo, grupo.nombre as grupo from clase join dias on dias.id_dia = clase.Dias_id_dia join docente on docente.id_docente = clase.Docente_id_docente join aula on asistencia.clase.Aula_id_aula = asistencia.aula.id_aula join materia on asistencia.clase.materia_id_materia = asistencia.materia.id_materia join grupo on clase.Grupo_id_grupo = grupo.id_grupo WHERE asistencia.clase.estado = 1 GROUP by asistencia.clase.id_clase");

    $MostrarDatos2 = $mysql->efectuarConsulta("SELECT asistencia.clase.id_clase, asistencia.clase.hora, asistencia.clase.horafin, asistencia.clase.Materia_id_materia, asistencia.materia.nombre as materianombre, asistencia.clase.Aula_id_aula, asistencia.aula.nombre as aulanombre, asistencia.clase.codigo, asistencia.dias.id_dia, asistencia.dias.nombre as nombredia, asistencia.docente.id_docente, docente.nombres, docente.apellidos, clase.Grupo_id_grupo, grupo.nombre as grupo from clase join dias on dias.id_dia = clase.Dias_id_dia join docente on docente.id_docente = clase.Docente_id_docente join aula on asistencia.clase.Aula_id_aula = asistencia.aula.id_aula join materia on asistencia.clase.materia_id_materia = asistencia.materia.id_materia join grupo on clase.Grupo_id_grupo = grupo.id_grupo WHERE asistencia.clase.estado = 0 GROUP by asistencia.clase.id_clase");

    
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
              <div class="card-body" align="center">
                  <h2 style="color: #037537">Gestionar clases</h2>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="container col-md-12 col-md-offset-3">
                  <!--DATATABLE-->
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Dia</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Codigo</th>
                        <th>Docente</th>
                        <th>Aula</th>
                        <th>Materia</th>
                        <th>Grupo</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        while ($valores1 = mysqli_fetch_assoc($MostrarDatos)) {
                          $id_clase = $valores1 ['id_clase'];
                        ?>
                          <th scope="row"><?php echo $valores1['nombredia'] ?></th>
                          <td><?php echo $valores1['hora'] ?></td>
                          <td><?php echo $valores1['horafin'] ?></td>
                          <td><?php echo $valores1['codigo'] ?></td>
                          <td><?php echo $valores1['nombres']." ".$valores1['apellidos'] ?></td>
                          <td><?php echo $valores1['aulanombre'] ?></td>
                          <td><?php echo $valores1['materianombre'] ?></td>
                          <td><?php echo $valores1['grupo'] ?></td>
                          <td>
                            <div class="text-center">
                              <a class="btn" style="background-color: #2EC82E;color: white" href='update_clase2.php?id_clase=<?php echo $id_clase; ?>' role="button"><i class="mdi mdi-pencil"></i></a>
                              <a class="btn" style="background-color: #FF5454;color: white" href='Controlador/delete_clase.php?id_clase=<?php echo $id_clase; ?>' role="button"><i class="mdi mdi-delete"></i></a>
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

                  <a class="btn" style="background-color: #2962FF;color: white" href="registro_clase.php" role="button"><i class="mdi mdi-account-plus"></i> Agregar Nuevo</a>

                  <br><br>
                  <div class="card">
                    <div class="card-body" align="center">
                        <h2 style="color: #037537">Clases desactivadas/eliminadas</h2>
                    </div>
                  </div>
                  <table id="example2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Dia</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Codigo</th>
                        <th>Docente</th>
                        <th>Aula</th>
                        <th>Materia</th>
                        <th>Grupo</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        while ($valores1 = mysqli_fetch_assoc($MostrarDatos2)) {
                          $id_clase = $valores1 ['id_clase'];
                        ?>
                          <th scope="row"><?php echo $valores1['nombredia'] ?></th>
                          <td><?php echo $valores1['hora'] ?></td>
                          <td><?php echo $valores1['horafin'] ?></td>
                          <td><?php echo $valores1['codigo'] ?></td>
                          <td><?php echo $valores1['nombres']." ".$valores1['apellidos'] ?></td>
                          <td><?php echo $valores1['aulanombre'] ?></td>
                          <td><?php echo $valores1['materianombre'] ?></td>
                          <td><?php echo $valores1['grupo'] ?></td>
                          <td>
                            <div class="text-center">
                              <a class="btn" style="background-color: #2EC82E;color: white" href='Controlador/activar_clase.php?id_clase=<?php echo $id_clase; ?>' role="button"><i class="mdi mdi-check"></i></a>
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
</body>

</html>
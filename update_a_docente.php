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

  <title>Ver clase</title>
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


  $id_docente = $_SESSION['idDocente'];
  $clase = $_GET['ida_docente'];

  //$smateria3 = $_POST['materianombre'];
  //$id = $_POST['selectgrupo'];


  $datosdocente = $mysql->efectuarConsulta("SELECT docente.id_docente, docente.nombres, docente.documento, docente.tipo_usuario_id_tipo_usuario, tipo_usuario.nombre from docente join tipo_usuario on tipo_usuario.id_tipo_usuario = docente.tipo_usuario_id_tipo_usuario where docente.id_docente = " . $id_docente . "");
  while ($valores1 = mysqli_fetch_assoc($datosdocente)) {
    $documento = $valores1['documento'];
    $nombres = $valores1['nombres'];
    $tipo_usuario = $valores1['nombre'];
  }

  $MostrarDatos = $mysql->efectuarConsulta("SELECT asistencia.a_docente.ida_docente, asistencia.a_docente.clase_id_clase, asistencia.clase.Materia_id_materia, asistencia.materia.nombre as nombremateria, asistencia.grupo.id_grupo, asistencia.grupo.nombre as nombregrupo, asistencia.a_docente.fecha, asistencia.clase.codigo, asistencia.links.links, asistencia.a_docente.estado FROM a_docente JOIN asistencia.clase ON asistencia.a_docente.clase_id_clase = asistencia.clase.id_clase JOIN asistencia.materia ON asistencia.clase.Materia_id_materia = asistencia.materia.id_materia JOIN asistencia.grupo ON asistencia.clase.Grupo_id_grupo = asistencia.grupo.id_grupo JOIN asistencia.links ON asistencia.a_docente.clase_id_clase = asistencia.links.clase_id_clase WHERE asistencia.a_docente.estado = 'Activa' AND asistencia.a_docente.estado2 = 1 AND asistencia.a_docente.ida_docente = ".$clase." GROUP BY asistencia.materia.nombre");

  //se inicia el recorrido para mostrar los datos de la BD

  while ($valores1 = mysqli_fetch_assoc($MostrarDatos)) {
    //declaracion de variables
    $nombremateria = $valores1['nombremateria'];
    $idMateria = $valores1['Materia_id_materia'];
    $codigo = $valores1['codigo'];
    $grupo = $valores1['nombregrupo'];
    $idgrupo = $valores1['id_grupo'];
    $links = $valores1['links'];
    $fecha = $valores1['fecha'];
    $id_clase = $valores1['clase_id_clase'];
  }

  $listaE = $mysql->efectuarConsulta("SELECT asistencia.clase.id_clase, asistencia.grupo.id_grupo, asistencia.grupo.nombre, asistencia.clase.Docente_id_docente, asistencia.estudiante.nombres, asistencia.estudiante.apellidos, asistencia.estudiante.documento, asistencia.clase.Grupo_id_grupo from grupo JOIN clase ON asistencia.grupo.id_grupo = asistencia.clase.Grupo_id_grupo JOIN estudiante ON asistencia.grupo.Estudiante_id_estudiante = asistencia.estudiante.id_estudiante WHERE asistencia.clase.id_clase = ". $clase ." AND asistencia.clase.Docente_id_docente = ". $id_docente ."");

  $listaEA = $mysql->efectuarConsulta("SELECT asistencia.clase.id_clase, asistencia.grupo.id_grupo, asistencia.grupo.nombre, asistencia.clase.Docente_id_docente, asistencia.estudiante.nombres, asistencia.estudiante.apellidos, asistencia.estudiante.documento, asistencia.a_estudiante.asistio, asistencia.clase.Grupo_id_grupo from grupo JOIN clase ON asistencia.grupo.id_grupo = asistencia.clase.Grupo_id_grupo JOIN estudiante ON asistencia.grupo.Estudiante_id_estudiante = asistencia.estudiante.id_estudiante JOIN asistencia.a_estudiante ON asistencia.a_estudiante.estudiante_id_estudiante = asistencia.estudiante.id_estudiante WHERE asistencia.clase.id_clase = ". $clase ." AND asistencia.clase.Docente_id_docente = ". $id_docente ."");
  

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
            <h4 class="page-title">Ver clase</h4>
            <?php //echo "ID Docente: " . $_SESSION['idDocente']; ?>
            <br>
            <?php //echo "ID a_docente: " . $clase ?>
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

                <div class="container col-md-7 col-md-offset-3" style="text-align: center">
                  <form id="contact" action="Controlador/newcode.php" method="post">
                    <!--<h3><?php echo "Clase: " . $nombremateria . "<br>Codigo generado: " . $codigo ?></h3>-->
                    <h3>Datos de la clase</h3>
                    <br>
                    <!--
                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Id de la clase:</label>
                      <div class="col-sm-5">
                        <select class="form-control " id="idclaseimprimir" name="idclaseimprimir" required>
                          <option value="<?php echo $clase ?>"><?php echo $clase ?></option>
                        </select>
                      </div>
                    </div>-->

                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Clase seleccionada:</label>
                      <div class="col-sm-5">
                        <select class="form-control " id="newcodeidmateria" name="newcodeidmateria" required>
                          <option value="<?php echo $idMateria ?>"><?php echo $nombremateria ?></option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Codigo:</label>
                      <div class="col-sm-5">
                        <fieldset>
                          <input placeholder="Codigo" disabled="" class="form-control" type="text" name="codigo" id="inputText" value="<?php echo $codigo ?>">
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>


                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <center>
                        <h3>Listado de estudiantes que asistieron</h3>
                        <div class="card-body col-md-6 col-md-offset-3">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th scope="col">Numero de documentos</th>
                                <th scope="col">Nombres de los estudiantes</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <?php
                                while ($valores3 = mysqli_fetch_assoc($listaEA)) {
                                ?>
                                  <td><?php echo $valores3['documento'] ?></td>
                                  <td><?php echo $valores3['nombres']." ".$valores3['apellidos'] ?></td>
                              </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                          </table>
                          </tbody>
                          </table>
                          <script>
                            $(document).ready(function() {
                              $('#example').DataTable();
                            });
                          </script>
                        </div>
                      </center>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <center>
                        <h3>Listado de estudiantes</h3>
                        <div class="card-body col-md-6 col-md-offset-3">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th scope="col">Numero de documentos</th>
                                <th scope="col">Nombres de los estudiantes</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <?php
                                while ($valores3 = mysqli_fetch_assoc($listaE)) {
                                ?>
                                  <td><?php echo $valores3['documento'] ?></td>
                                  <td><?php echo $valores3['nombres']." ".$valores3['apellidos'] ?></td>
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
                          </tbody>
                          </table>
                        </div>
                      </center>
                    </div>
                  </div>
                </div>

                <form id="contact" action="Controlador/updateasistenciaDocente.php" method="post">
                  <div class="container col-md-7 col-md-offset-3" style="text-align: center">
                    <center>
                      <h3>Links y/o comentarios a la clase adjuntados</h3>
                    </center>

                    <div class="form-group row">
                      <fieldset>
                        <textarea name="comentarios" rows="5" cols="70" required="" placeholder="Escribe aquí una descripción..." ><?php echo $links ?></textarea>
                      </fieldset>
                    </div>

                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Id de la clase:</label>
                      <div class="col-sm-5">
                        <select class="form-control " id="idclaseimprimir" name="idclaseimprimir" required>
                          <option value="<?php echo $id_clase ?>"><?php echo $id_clase ?></option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Fecha de registro:</label>
                      <div class="col-sm-5">
                          <input type="date" name="fechaclase" class="form-control" required="" value="<?php echo $fecha ?>">
                      </div>
                    </div>

                    <br>
                    <fieldset>
                      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="col-5">Guardar y actualizar</button>
                    </fieldset>
                  </div>
                </form>

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
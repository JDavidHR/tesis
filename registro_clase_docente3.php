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
  $smateria3 = $_POST['materianombre'];
  $id = $_POST['selectgrupo'];


  $datosdocente = $mysql->efectuarConsulta("SELECT docente.id_docente, docente.nombres, docente.documento, docente.tipo_usuario_id_tipo_usuario, tipo_usuario.nombre from docente join tipo_usuario on tipo_usuario.id_tipo_usuario = docente.tipo_usuario_id_tipo_usuario where docente.id_docente = " . $id_docente . "");
  while ($valores1 = mysqli_fetch_assoc($datosdocente)) {
    $documento = $valores1['documento'];
    $nombres = $valores1['nombres'];
    $tipo_usuario = $valores1['nombre'];
  }


  $seleccionmateria = $mysql->efectuarConsulta("SELECT asistencia.docente.id_docente, materia.nombre, materia.id_materia from docente join clase on clase.Docente_id_docente = docente.id_docente join grupo on grupo.id_grupo = clase.Grupo_id_grupo join materia on materia.id_materia = clase.Materia_id_materia where clase.Materia_id_materia = " . $smateria3 . "");
  //se inicia el recorrido para mostrar los datos de la BD

  while ($valores1 = mysqli_fetch_assoc($seleccionmateria)) {
    //declaracion de variables
    $nombremateria = $valores1['nombre'];
    $idMateria = $valores1['id_materia'];
  }



  $selecciongrupo = $mysql->efectuarConsulta("SELECT asistencia.clase.Grupo_id_grupo, asistencia.grupo.nombre as nombregrupo FROM clase JOIN grupo on asistencia.grupo.id_grupo = asistencia.clase.Grupo_id_grupo WHERE asistencia.clase.Grupo_id_grupo = " . $id . " GROUP BY asistencia.clase.Grupo_id_grupo");
  while ($valores1 = mysqli_fetch_assoc($selecciongrupo)) {
    //declaracion de variables
    $grupo = $valores1['nombregrupo'];
    $idgrupo = $valores1['Grupo_id_grupo'];
  }

  $codigoclase = $mysql->efectuarConsulta("SELECT asistencia.clase.id_clase, asistencia.clase.codigo, asistencia.materia.nombre from clase join materia on asistencia.materia.id_materia = asistencia.clase.Materia_id_materia where clase.Materia_id_materia = " . $smateria3 . " and asistencia.clase.Grupo_id_grupo = ". $idgrupo ." and asistencia.clase.Docente_id_docente = ". $id_docente."");
  while ($valores1 = mysqli_fetch_assoc($codigoclase)) {
    //declaracion de variables
    $codigo = $valores1['codigo'];
    $idclase = $valores1['id_clase'];
  }

  $listaE = $mysql->efectuarConsulta("SELECT asistencia.clase.id_clase, asistencia.grupo.id_grupo, asistencia.grupo.nombre, asistencia.clase.Docente_id_docente, asistencia.estudiante.nombres, asistencia.estudiante.apellidos, asistencia.estudiante.documento, asistencia.clase.Grupo_id_grupo from grupo JOIN clase ON asistencia.grupo.id_grupo = asistencia.clase.Grupo_id_grupo JOIN estudiante ON asistencia.grupo.Estudiante_id_estudiante = asistencia.estudiante.id_estudiante WHERE asistencia.clase.id_clase = ". $idclase ." AND asistencia.clase.Docente_id_docente = ". $id_docente ."");

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
            <h4 class="page-title">Registrar clases</h4>
            <!--
            <?php echo "ID Docente: " . $_SESSION['idDocente']; ?>
            <br>
            <?php echo " Materia: "  . $nombremateria ?>
            <br>
            <?php echo " ID Materia: "  . $idMateria ?>
            <br>
            <?php echo " grupo: "  . $grupo ?>
            <br>
            <?php echo " ID grupo: "  . $id ?>
            <br>
            <?php echo " ID clase: "  . $idclase ?>
          -->
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
                    <h3><?php echo "Clase: " . $nombremateria . "<br>Codigo generado: " . $codigo ?></h3>
                    <br>

                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Id de la clase:</label>
                      <div class="col-sm-5">
                        <select class="form-control " id="idclaseimprimir" name="idclaseimprimir" required>
                          <option value="<?php echo $idclase ?>"><?php echo $idclase ?></option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Clase seleccionada:</label>
                      <div class="col-sm-5">
                        <select class="form-control " id="newcodeidmateria" name="newcodeidmateria" required>
                          <option value="<?php echo $idMateria ?>"><?php echo $nombremateria ?></option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Nuevo codigo (Opcional):</label>
                      <div class="col-sm-5">
                        <fieldset>
                          <input class="form-control " name="newcode" placeholder="Nuevo Codigo">
                        </fieldset>
                      </div>
                    </div>
                    <br>

                    <fieldset>
                      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="col-5">Generar nuevo</button>
                    </fieldset>
                  </form>
                </div>


                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <center>
                        <h3>Listado de estudiantes</h3>
                        <div class="card-body col-md-6 col-md-offset-3">
                        <table id="" class="table table-striped table-bordered" style="width:100%">
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
                          </tbody>
                          </table>
                        </div>
                      </center>
                    </div>
                  </div>
                </div>

                <form id="contact" action="Controlador/asistenciaDocente.php" method="post">
                  <div class="container col-md-7 col-md-offset-3" style="text-align: center">
                    <center>
                      <h3>Espacio para adjuntar links y/o comentarios a la clase</h3>
                    </center>

                    <div class="form-group row">
                      <fieldset>
                        <textarea name="comentarios" rows="5" cols="70" required="" placeholder="Escribe aquí una descripción..."></textarea>
                      </fieldset>
                    </div>

                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Id de la clase:</label>
                      <div class="col-sm-5">
                        <select class="form-control " id="idclaseimprimir" name="idclaseimprimir" required>
                          <option value="<?php echo $idclase ?>"><?php echo $idclase ?></option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row" align="right">
                      <label class="col-sm-5 col-form-label">Fecha de registro:</label>
                      <div class="col-sm-5">
                          <input type="date" name="fechaclase" class="form-control" required="">
                      </div>
                    </div>

                    <br>
                    <fieldset>
                      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="col-5">Guardar y registrar clase</button>
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
</body>

</html>
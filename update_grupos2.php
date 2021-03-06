<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <title>Update Grupos</title>
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

        //respectiva consulta para los select
        $id_grupo = $_GET['id_grupo'];
        //respectiva consulta para los select
        $selecciongrupo = $mysql->efectuarConsulta("SELECT asistencia.grupo.nombre as nombre_grupo, asistencia.grupo.Estudiante_id_estudiante, asistencia.estudiante.nombres from grupo join asistencia.estudiante on asistencia.grupo.Estudiante_id_estudiante = asistencia.estudiante.id_estudiante where asistencia.grupo.id_grupo = ".$id_grupo."");

        $selecciongrupo2 = $mysql->efectuarConsulta("SELECT asistencia.grupo.id_grupo, asistencia.grupo.nombre from grupo where estado = 1 GROUP by asistencia.grupo.id_grupo");
        $seleccionEstudiante = $mysql->efectuarConsulta("SELECT asistencia.estudiante.id_estudiante, asistencia.estudiante.nombres from estudiante where asistencia.estudiante.estado = 1");

        while ($valores1 = mysqli_fetch_assoc($selecciongrupo)) {
        //declaracion de variables
            $nombre_grupo = $valores1['nombre_grupo'];
            $idestudiante = $valores1['Estudiante_id_estudiante'];
            $estudiante = $valores1['nombres'];

        }

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
                    <div class="col-6">
                        <div class="card">
                                <div class="container col-md-10" style="text-align: center">
                                    <form id="contact" action="Controlador/update_grupo.php?id=<?php echo $id_grupo; ?>" method="post">
                                        <h3>Modificar Grupo</h3>
                                        <h4>Recuerda rellenar el campo</h4>
                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-3 col-form-label">Id del grupo</label>
                                          <div class="col-sm-9">
                                            <input placeholder="Id del horario" class="form-control" type="text" disabled="" name="id" id="inputText" value="<?php echo $id_grupo ?>">
                                          </div>
                                        </div>

                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-3 col-form-label">Nombre del grupo</label>
                                          <div class="col-sm-9">
                                            <input placeholder="..." class="form-control" type="text" name="nombre_grupo" id="inputText" value="<?php echo $nombre_grupo ?>">
                                          </div>
                                        </div>

                                        <fieldset>
                                          <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" class="col-3">Actualizar</button>
                                        </fieldset>
                                    </form>
                                </div>
                            
                        </div>
                    </div>    

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h2 align="center">Datos para tener en cuenta: </h2>
                                <label>Tenga en cuenta los siguientes datos al momento de cambiar el nombre del grupo.</label>
                                <label>(Debe escribir los mismos datos en el campo para que el cambio se aplique correctamente.)</label>
                                <br><br>
                                <div class="container col-md-10" style="text-align: center">
                                    <fieldset>
                                        <label>Id del grupo y nombre disponibles: </label>
                                        <center>
                                            <select name="gruposdisponibles" class="form-control">
                                                <option value="0" disabled="">Seleccione:</option>
                                                <?php
                                                //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                                while ($resultado = mysqli_fetch_assoc($selecciongrupo2)) {
                                                ?>
                                                  <!--se traen los datos a mostrar en el select-->
                                                  <option value="<?php echo $resultado['id_grupo'] ?>"><?php echo $resultado['id_grupo']. " - Nombre: " . $resultado['nombre']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </center>
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
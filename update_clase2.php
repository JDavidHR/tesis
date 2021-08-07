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

    <title>Update Clase</title>
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

        $id_clase = $_GET['id_clase'];


        $mostrardatos = $mysql->efectuarConsulta("SELECT asistencia.clase.hora, asistencia.clase.horafin, asistencia.clase.Materia_id_materia, asistencia.materia.nombre as materianombre, asistencia.clase.Aula_id_aula, asistencia.aula.nombre as aulanombre, asistencia.clase.codigo, asistencia.dias.id_dia, asistencia.dias.nombre as nombredia, asistencia.docente.id_docente, docente.nombres, clase.Grupo_id_grupo, grupo.nombre as grupo from clase join dias on dias.id_dia = clase.Dias_id_dia join docente on docente.id_docente = clase.Docente_id_docente join aula on asistencia.clase.Aula_id_aula = asistencia.aula.id_aula join materia on asistencia.clase.materia_id_materia = asistencia.materia.id_materia join grupo on clase.Grupo_id_grupo = grupo.id_grupo WHERE asistencia.clase.id_clase = " . $id_clase . " GROUP by asistencia.clase.grupo_id_grupo");


        //se desconecta de la base de datos
        while ($valores1 = mysqli_fetch_assoc($mostrardatos)) {
            //declaracion de variables
            $hora = $valores1['hora'];
            $horafin = $valores1['horafin'];
            $materia = $valores1['Materia_id_materia'];
            $materianombre = $valores1['materianombre'];
            $aula = $valores1['Aula_id_aula'];
            $codigo = $valores1['codigo'];
            $dia = $valores1['nombredia'];
            $id_dia = $valores1['id_dia'];
            $docente = $valores1['nombres'];
            $id_docente = $valores1['id_docente'];
            $aulanombre = $valores1['aulanombre'];
            $id_grupo = $valores1['Grupo_id_grupo']; //
            $grupo = $valores1['grupo'];
        }

        //respectiva consulta para la seleccion de usuario
        $seleccionaula = $mysql->efectuarConsulta("SELECT asistencia.aula.id_aula,asistencia.aula.nombre from aula where estado = 1");
        $seleccionmateria = $mysql->efectuarConsulta("SELECT asistencia.materia.id_materia,asistencia.materia.nombre from materia where estado = 1");
        $selecciondia = $mysql->efectuarConsulta("SELECT asistencia.dias.id_dia, asistencia.dias.nombre as nombredia from dias");
        $selecciongrupo = $mysql->efectuarConsulta("SELECT asistencia.grupo.id_grupo, asistencia.grupo.nombre, asistencia.grupo.estado from grupo where estado = 1");
        $selecciondocente = $mysql->efectuarConsulta("SELECT asistencia.docente.id_docente, asistencia.docente.nombres as nombredocente from docente where estado = 1");

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
                                    <form id="contact" action="Controlador/update_clase.php?id=<?php echo $id_clase; ?>" method="post">
                                        <h3>Modificar Clase</h3>
                                        <h4>Recuerda llenar todos los campos</h4>
                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-4 col-form-label">Id del horario: </label>
                                          <div class="col-sm-8">
                                            <input placeholder="Id del horario" class="form-control" type="text" disabled="" name="id" id="inputText" value="<?php echo $id_clase ?>">
                                          </div>
                                        </div>

                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-4 col-form-label">Selecciona el día:</label>
                                          <div class="col-sm-8">
                                            <select class="form-control " name="dia" required>
                                                <option value="<?php echo $id_dia?>" selected="true"><?php echo $dia?></option>
                                                <option disabled>Seleccione un dia si va a editar</option>
                                                <?php
                                                //ciclo while 
                                                while ($resultado = mysqli_fetch_assoc($selecciondia)) {
                                                ?>
                                                    <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                                                    <option value="<?php echo $resultado['id_dia'] ?>"><?php echo $resultado['nombredia'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-4 col-form-label">Hora inicio: </label>
                                          <div class="col-sm-8">
                                            <input type="time" name="hora" class="form-control" min="07:00:00" max="22:00:00" value="<?php echo $hora ?>">
                                          </div>
                                        </div>

                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-4 col-form-label">Hora fin: </label>
                                          <div class="col-sm-8">
                                            <input type="time" name="horafin" class="form-control" min="07:00:00" max="22:00:00" value="<?php echo $horafin ?>">
                                          </div>
                                        </div>

                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-4 col-form-label">Codigo de la clase: </label>
                                          <div class="col-sm-8">
                                            <input placeholder="Codigo de la clase" class="form-control" type="text" name="codigo" id="inputText" value="<?php echo $codigo ?>">
                                          </div>
                                        </div>

                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-4 col-form-label">Docente:</label>
                                          <div class="col-sm-8">
                                            <select class="form-control " name="nombre_docente" required>
                                                <option value="<?php echo $id_docente?>" selected="true"><?php echo $docente?></option>
                                                <option disabled>Seleccione un docente si va a editar</option>
                                                <?php
                                                //ciclo while 
                                                while ($resultado = mysqli_fetch_assoc($selecciondocente)) {
                                                ?>
                                                  <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                                                  <option value="<?php echo $resultado['id_docente'] ?>"><?php echo $resultado['nombredocente'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-4 col-form-label">Aula:</label>
                                          <div class="col-sm-8">
                                            <select class="form-control " name="aula" required>
                                                <option value="<?php echo $aula?>" selected="true"><?php echo $aulanombre?></option>
                                                <option disabled>Seleccione una aula si va a editar</option>
                                                <?php
                                                //ciclo while 
                                                while ($resultado = mysqli_fetch_assoc($seleccionaula)) {
                                                ?>
                                                    <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                                                    <option value="<?php echo $resultado['id_aula'] ?>"><?php echo $resultado['nombre'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-4 col-form-label">Materia:</label>
                                          <div class="col-sm-8">
                                            <select class="form-control " name="materia" required>
                                                <option value="<?php echo $materia?>" selected="true"><?php echo $materianombre?></option>
                                                <option disabled>Seleccione una materia si va a editar</option>
                                                <?php
                                                //ciclo while 
                                                while ($resultado = mysqli_fetch_assoc($seleccionmateria)) {
                                                ?>
                                                    <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                                                    <option value="<?php echo $resultado['id_materia'] ?>"><?php echo $resultado['nombre'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="form-group row" align="Left">
                                          <label class="col-sm-4 col-form-label">Grupo:</label>
                                          <div class="col-sm-8">
                                            <select name="grupo" class="form-control">
                                                <option value="<?php echo $id_grupo?>" selected="true"><?php echo $grupo?></option>
                                                <option disabled>Seleccione un grupo si va a editar</option>
                                                <?php
                                                //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                                while ($resultado = mysqli_fetch_assoc($selecciongrupo)) {
                                                ?>
                                                  <!--se traen los datos a mostrar en el select-->
                                                  <option value="<?php echo $resultado['id_grupo'] ?>"><?php echo $resultado['nombre'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                          </div>
                                        </div>

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
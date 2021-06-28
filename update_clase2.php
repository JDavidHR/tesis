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

    <title>Update Horario</title>
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

        $id_usuario = $_POST['horario'];


        $mostrardatos = $mysql->efectuarConsulta("SELECT asistencia.clase.hora,asistencia.clase.Materia_id_materia,asistencia.clase.Aula_id_aula, clase.codigo, dias.nombre as nombredia, dias.id_dia, docente.nombres from clase join dias on dias.id_dia = clase.Dias_id_dia join docente on docente.id_docente = clase.Docente_id_docente WHERE asistencia.clase.id_clase = " . $id_usuario . "");


        //respectiva consulta para la seleccion de usuario
        $seleccionaula = $mysql->efectuarConsulta("SELECT asistencia.aula.id_aula,asistencia.aula.nombre from aula where estado = 1");
        $seleccionmateria = $mysql->efectuarConsulta("SELECT asistencia.materia.id_materia,asistencia.materia.nombre from materia where estado = 1");
        $selecciondia = $mysql->efectuarConsulta("SELECT asistencia.dias.id_dia, asistencia.dias.nombre as nombredia from dias");
        $selecciongrupo = $mysql->efectuarConsulta("SELECT asistencia.grupo.id_grupo, asistencia.grupo.estado from grupo where estado = 1");
        $selecciondocente = $mysql->efectuarConsulta("SELECT asistencia.docente.id_docente, asistencia.docente.nombres as nombredocente from docente where estado = 1");
        //se desconecta de la base de datos
        while ($valores1 = mysqli_fetch_assoc($mostrardatos)) {
            //declaracion de variables
            $hora = $valores1['hora'];
            $materia = $valores1['Materia_id_materia'];
            $aula = $valores1['Aula_id_aula'];
            $codigo = $valores1['codigo'];
            $dia = $valores1['nombredia'];
            $docente = $valores1['nombres'];
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
                                    <form id="contact" action="Controlador/update_horario.php?id=<?php echo $id_usuario; ?>" method="post">
                                        <h3>Actualizar Horario</h3>
                                        <h4>Recuerda llenar todos los campos</h4>
                                        <br>
                                        <fieldset>
                                            <label>ID Horario</label>
                                            <input placeholder="ID horario" type="text" tabindex="1" disabled="" name="id" value="<?php echo $id_usuario ?>">
                                        </fieldset>
                                        <br>
                                        <fieldset>
                                            <label>Selecciona el dia: </label><br>
                                            <select class="form-control " name="dia" required>
                                                <?php
                                                //ciclo while que nos sirve para traer cuales son los tipos de usuario (paciente, medico)
                                                while ($resultado = mysqli_fetch_assoc($selecciondia)) {
                                                ?>
                                                    <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                                                    <option value="<?php echo $resultado['id_dia'] ?>"><?php echo $resultado['nombredia'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </fieldset>
                                        <br>
                                        <fieldset>
                                            <label>Hora Estimada: </label><br>
                                            <input placeholder="hora" type="time" tabindex="1" autofocus name="hora" class="form-control" min="07:00:00" max="18:00:00" step="1">
                                        </fieldset>
                                        <br>
                                        <fieldset>
                                            <br>
                                            <fieldset>
                                                <label>Codigo de la clase</label>
                                                <input placeholder="Codigo de la clase" type="text" tabindex="2" name="codigo" value="<?php echo $codigo ?>">
                                            </fieldset>
                                            <br>
                                            <fieldset>
                                                <label>Selecciona el docente: </label><br>
                                                <select class="form-control " name="nombre_docente" required>
                                                    <?php
                                                    //ciclo while que nos sirve para traer cuales son los tipos de usuario (paciente, medico)
                                                    while ($resultado = mysqli_fetch_assoc($selecciondocente)) {
                                                    ?>
                                                        <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                                                        <option value="<?php echo $resultado['id_docente'] ?>"><?php echo $resultado['nombredocente'] ?></option>
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
                                                <label>Grupo: </label>
                                                <select name="grupo" class="form-control">
                                                    <option value="0" disabled="">Seleccione:</option>
                                                    <?php
                                                    //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                                    while ($resultado = mysqli_fetch_assoc($selecciongrupo)) {
                                                    ?>
                                                        <!--se traen los datos a mostrar en el select-->
                                                        <option value="<?php echo $resultado['id_grupo'] ?>"><?php echo $resultado['estado'] ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
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
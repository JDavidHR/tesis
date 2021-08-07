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
    
    <title>Registro Clase</title>
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
    //session_start();
    if(!isset($_SESSION['tipousuario'])){
    //llamado del archivo mysql
    require_once 'Modelo/MySQL.php';
    //creacion de nueva "consulta"
    $mysql = new MySQL; //se crea un nuevo musql

    $mysql->conectar(); //se ejecuta la funcion almacenda en mysql.php

//declaracion de variables metodo post
$id_clase = $_POST['clase'];
$mostrardatos =$mysql->efectuarConsulta("SELECT asistencia.clase.dia, asistencia.clase.horario_id_horario from clase WHERE asistencia.clase.id_clase = ".$id_clase."");
$seleccionhorario =$mysql->efectuarConsulta("SELECT asistencia.horario.id_horario from horario where asistencia.horario.estado = 1"); 
//se inicia el recorrido para mostrar los datos de la BD
 while ($valores1 = mysqli_fetch_assoc($mostrardatos)) {
//declaracion de variables
$dia = $valores1['dia'];
$horario = $valores1['horario_id_horario'];

    }
}
$mysql->desconectar();//funcion llamada desde mysql.php
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
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
										<form id="contact" action="Controlador/update_clase.php?id=<?php echo $id_clase; ?>" method="post">
										    <h3>Actualizar Clase</h3>
										    <h4>Recuerda llenar todos los campos</h4>
                                            <fieldset>
                                                <label>ID Clase: </label>
                                              <input placeholder="ID clase" type="text" tabindex="1" disabled name="id" value="<?php echo $id_clase ?>">
                                            </fieldset>
										    <fieldset>
                                                <label>Día:</label>
										      <input placeholder="Dia" type="date" tabindex="2" name="dia" class="form-control" value="<?php echo $dia ?>">
										    </fieldset>
										    
                                            <fieldset>
                                            <label>Horario: </label>
                                            <select name="horario" class="form-control">
                                                <option value="0" disabled="">Seleccione:</option>
                                                <?php
                                                  //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                                  while ($valores1 = mysqli_fetch_assoc($seleccionhorario)) {
                                                    ?>
                                                    <!--se traen los datos a mostrar en el select-->
                                                    <option value="<?php echo $valores1['id_horario']?>"><?php echo $valores1['id_horario']?></option>';
                                                    <?php
                                                  }
                                                ?>
                                                
                                            </select>
                                            </fieldset>
                                            
										    <br>
										    <fieldset>
                                              <button name="enviar" type="submit" id="contact-submit" data-submit="...Sending" class="col-2">Actualizar</button>
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

	
	


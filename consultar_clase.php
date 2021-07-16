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

	<title>Home</title>
	<!-- Custom CSS -->
	<link href="css/chartist.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.min.css" rel="stylesheet">

	<link href="css/ie7.css" rel="stylesheet">

	<link href="css/materialdesignicons.min.css" rel="stylesheet">
	<link href="css/weather-icons.min.css" rel="stylesheet">
	<!--datatables-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" media="all">
	<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" media="all">
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
	//$id_estudiante = $_POST['idEstudiante']; 
	//respectiva consulta para la seleccion de usuario
	$datosdocente = $mysql->efectuarConsulta("SELECT docente.id_docente, docente.nombres, docente.documento, docente.tipo_usuario_id_tipo_usuario, tipo_usuario.nombre from docente join tipo_usuario on tipo_usuario.id_tipo_usuario = docente.tipo_usuario_id_tipo_usuario where docente.id_docente = " . $id_docente . "");
	while ($valores1 = mysqli_fetch_assoc($datosdocente)) {
		$documento = $valores1['documento'];
		$nombres = $valores1['nombres'];
		$tipo_usuario = $valores1['nombre'];
	}
	$dhorario = $mysql->efectuarConsulta("SELECT docente.id_docente, clase.id_clase, clase.hora, dias.id_dia, dias.nombre as nombredia, materia.nombre FROM docente join clase on clase.Docente_id_docente = docente.id_docente join dias on dias.id_dia = clase.Dias_id_dia join materia on materia.id_materia = clase.Materia_id_materia where docente.id_docente = " . $id_docente . " ORDER BY clase.hora, nombredia");

	$Amaterias = $mysql->efectuarConsulta("SELECT docente.id_docente, clase.hora, dias.id_dia, dias.nombre as nombredia, materia.nombre as nombremateria, clase.codigo FROM docente join clase on clase.Docente_id_docente = docente.id_docente join dias on dias.id_dia = clase.Dias_id_dia join materia on materia.id_materia = clase.Materia_id_materia where docente.id_docente = " . $id_docente . " order by dias.id_dia");


	//Codigo proporcionado por el usuario Triby en stack overflow
	//https://es.stackoverflow.com/questions/390749/como-poner-campos-en-una-tabla-php-y-mysql
	// Crear arreglo para armar horario
    $horario = [];

    while($valores1 = mysqli_fetch_assoc($dhorario)) {
        // Verificar que existe hora_inicial en arreglo
        $hora = $valores1['hora'];
        if(!isset($horario[$hora])) {
            // Crear arreglo con 5 elementos, uno para cada día
            $horario[$hora] = ['', '', '', '', '', '', ''];
        }
        // Agregar materia a $hora, en espacio correspondiente
        // Los índices de arreglo inician en cero, van de cero = lunes a 4 = viernes
        // Por eso el - 1
        $horario[$hora][$valores1['id_dia'] - 1] = $valores1['nombre'];
    }

    
    

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
				<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
					<!-- ============================================================== -->
					<!-- toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav float-left mr-auto">
						<!-- ============================================================== -->
						<!-- Search -->
						<!-- ============================================================== -->
						<li class="nav-item search-box">
							<!--<a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Buscar</span>
                                    </div>
                                </div>
                            </a>-->

							<form class="app-search position-absolute">
								<input type="text" class="form-control" placeholder="Search &amp; enter">
								<a class="srh-btn">
									<i class="ti-close"></i>
								</a>
							</form>
						</li>
					</ul>
					<!-- ============================================================== -->
					<!-- Right side toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav float-right">
						<!-- ============================================================== -->
						<!-- User profile and search -->
						<!-- ============================================================== -->
						<li class="nav-item dropdown">
							

						</li>
						<!-- ============================================================== -->
						<!-- User profile and search -->
						<!-- ============================================================== -->
					</ul>
				</div>
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
							<center>
								<div class="card-body col-md-6 col-md-offset-3">
								<table id="info" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th scope="col">Documento</th>
												<th scope="col">Nombre</th>
												<th scope="col">Tipo de usuario</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $documento ?></td>
												<td><?php echo $nombres ?></td>
												<td><?php echo $tipo_usuario ?></td>
											</tr>
										</tbody>
									</table>
									</tbody>
									</table>
								</div>
							</center>

							<center>
								<div class="card-body col-md-8 col-md-offset-3">
									<center>
										<p>Distribucion de clases</p>
									</center>
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>Hora</th>
												<th>Lunes</th>
												<th>Martes</th>
												<th>Miercoles</th>
												<th>Jueves</th>
												<th>Viernes</th>
												<th>Sabado</th>
												<th>Domingo</th>
											</tr>
										</thead>
										<tbody>
											<?php
											        // Llenar tabla
											        foreach($horario as $hora => $dias) {
											            echo <<<HTML
											            <tr>
											                <td>$hora</td>
											                <td>{$dias[0]}</td>
											                <td>{$dias[1]}</td>
											                <td>{$dias[2]}</td>
											                <td>{$dias[3]}</td>
											                <td>{$dias[4]}</td>
											                <td>{$dias[5]}</td>
											                <td></td>
											            </tr>
											HTML; // Esta línea debe estar en la primera columna, sin espacios ni tabuladores previos
											        }
											        // Cerrar tabla
											?>


										</tbody>
									</table>

									</tbody>
									</table>
								</div>
							</center>

							<center>
								<div class="card-body col-md-7 col-md-offset-3">

									<center>
										<p>Materias asignadas a dar</p>
									</center>
									<table id="mater" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th scope="col">Dia</th>
												<th scope="col">Materia</th>
												<th scope="col">Codigo de Ingreso</th>
												<th scope="col">Hora</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<?php
												while ($valores3 = mysqli_fetch_assoc($Amaterias)) {
												?>
													<td><?php echo $valores3['nombredia'] ?></td>
													<td><?php echo $valores3['nombremateria'] ?></td>
													<td><?php echo $valores3['codigo'] ?></td>
													<td><?php echo $valores3['hora'] ?></td>
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
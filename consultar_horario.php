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
	//$id_estudiante = $_POST['idEstudiante']; 
	//respectiva consulta para la seleccion de usuario
	$datosestudiante = $mysql->efectuarConsulta("SELECT estudiante.id_estudiante, estudiante.documento, estudiante.nombres, estudiante.Carrera_id_carrera, estudiante.semestre, carrera.id_carrera, carrera.nombre from estudiante join carrera on estudiante.Carrera_id_carrera = carrera.id_carrera where estudiante.id_estudiante = " . $id_estudiante . "");
	while ($valores1 = mysqli_fetch_assoc($datosestudiante)) {
		$documento = $valores1['documento'];
		$nombres = $valores1['nombres'];
		$carrera = $valores1['nombre'];
		$semestre = $valores1['semestre'];
	}


	$dhorario = $mysql->efectuarConsulta("SELECT estudiante.id_estudiante, grupo.Estudiante_id_estudiante, clase.hora, materia.nombre, dias.nombre as nombredia FROM estudiante JOIN grupo on estudiante.id_estudiante = grupo.Estudiante_id_estudiante join clase on clase.Grupo_id_grupo = grupo.id_grupo join materia on materia.id_materia = clase.Materia_id_materia join dias on dias.id_dia = clase.Dias_id_dia where estudiante.id_estudiante = " . $id_estudiante . "");
	$Amaterias = $mysql->efectuarConsulta("SELECT estudiante.id_estudiante, grupo.Estudiante_id_estudiante, materia.nombre as nombremateria, materia.id_materia, docente.nombres, aula.nombre as nombreaula, dias.nombre as nombredia, clase.hora FROM estudiante JOIN grupo on estudiante.id_estudiante = grupo.Estudiante_id_estudiante join clase on clase.Grupo_id_grupo = grupo.id_grupo join materia on materia.id_materia = clase.Materia_id_materia join docente on docente.id_docente = clase.Docente_id_docente join aula on aula.id_aula = clase.Aula_id_aula join dias on dias.id_dia = clase.Dias_id_dia where estudiante.id_estudiante = " . $id_estudiante . "");

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
							<!--<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>-->
							
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
						<?php echo "ID Estudiante: " . $_SESSION['idEstudiante']; ?>
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
								<table id="" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th scope="col">Documento</th>
												<th scope="col">Nombre</th>
												<th scope="col">Carrera</th>
												<th scope="col">Semestre</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row"><?php echo $documento ?></th>
												<td><?php echo $nombres ?></td>
												<td><?php echo $carrera ?></td>
												<td><?php echo $semestre ?></td>
											</tr>
										</tbody>
									</table>
									</tbody>
									</table>
								</div>
							</center>
							
							<center>
								<div class="card-body col-md-6 col-md-offset-3">
									<center>
										<b>Distribucion Horaria</b>
									</center>
									<br>
									<table id="" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th scope="col">Hora</th>
												<th scope="col">Materia</th>
												<th scope="col">Dia</th>
											</tr>
										</thead>
										<tbody>
											<?php
											while ($valores2 = mysqli_fetch_assoc($dhorario)) {
												//$dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
												//$dia = $dias[(date('N', strtotime($valores2['dia']))) - 1];
											?>
												<tr>
													<th scope="row"><?php echo $valores2['hora'] ?></th>
													<td><?php echo $valores2['nombre'] ?></td>
													<td><?php echo $valores2['nombredia'] ?></td>
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
							
							<center>
								<div class="card-body col-md-7 col-md-offset-3">

									<center>
										<b>Asignaturas Matriculadas</b>		
									</center>
									<br>
									<table id="" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th scope="col">Codigo</th>
												<th scope="col">Asignatura</th>
												<th scope="col">Docente</th>
												<th scope="col">Aula</th>
												<th scope="col">Dia</th>
												<th scope="col">Hora</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<?php
												while ($valores3 = mysqli_fetch_assoc($Amaterias)) {
												?>
													<th scope="row"><?php echo $valores3['id_materia'] ?></th>
													<td><?php echo $valores3['nombremateria'] ?></td>
													<td><?php echo $valores3['nombres'] ?></td>
													<td><?php echo $valores3['nombreaula'] ?></td>
													<td><?php echo $valores3['nombredia'] ?></td>
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
</body>

</html>
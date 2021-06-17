<?php 
    //session_start();
    if(!isset($_SESSION['tipousuario'])){
    //llamado del archivo mysql
    require_once 'Modelo/MySQL.php';
    //creacion de nueva "consulta"
    $mysql = new MySQL;
    //se conecta a la base de datos
    $mysql->conectar();    
    //respectiva consulta para la seleccion de usuario
    $consulta = $mysql->efectuarConsulta("SELECT id_docente, documento, nombres, apellidos FROM docente WHERE estado = 1");
    //se desconecta de la base de datos
    $mysql->desconectar(); 
    }   
    ?>
<head>
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" media="all">      
</head>

<!-- /. ROW  -->
<div class="row">
  	<div class="col-md-12 col-sm-12">
		<br><br>
		    <div class="panel panel-default">
		      <div class="panel-body">
		        <div class="tab-content">
		          <div class="tab-pane fade active in" id="gestionardocente">
		          	<table class="table table-hover" id="ver_docente">
			            <thead>
			              <tr>
			                <th scope="col">Numero documento</th>
			                <th scope="col">Nombre completo</th>
			                <th scope="col">Apellidos</th>

			              </tr>
			            </thead>
			            <tbody>
			             <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
			            <?php
			            while ($resultado= mysqli_fetch_assoc($consulta)){      
					        $id_docente = $resultado['id_docente'];
					    ?>
			              <tr>
			                   <!-- Se traen los datos y se imprimen en las opciones del select -->
			                <td><?php echo $resultado['documento'] ?></td>
			                <td><?php echo $resultado['nombres'] ?></th>
			                <td><?php echo $resultado['apellidos'] ?></td>

			              </tr>
			            <?php
			              }
			            ?>
			            </tbody>
			        </table>

		          </div>
		        </div>
		      </div>
		    </div>
  	</div>
</div>

      <!-- /. ROW  -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>

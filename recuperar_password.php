<!DOCTYPE html>
<html>
<head>
  <title>Recuperar Contraseña</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style_login.css">
</head>
<body>
  <?php 
    session_start();
    if(!isset($_SESSION['tipousuario'])){
    //llamado del archivo mysql
    require_once 'Modelo/MySQL.php';
    //creacion de nueva "consulta"
    $mysql = new MySQL;
    //se conecta a la base de datos
    $mysql->conectar();    
    //respectiva consulta para la seleccion de usuario
    $seleccionUsuario = $mysql->efectuarConsulta("SELECT asistencia.tipo_usuario.id_tipo_usuario, asistencia.tipo_usuario.nombre from tipo_usuario");     
    //se desconecta de la base de datos
    $mysql->desconectar();    
    ?>
  <section class="login-block">
    <div class="container">
      <div class="row">
        <div class="col-md-4 login-sec">
          <h2 class="text-center">Recuperar Contraseña</h2>
          <form class="login-form" action="Controlador/recuperar_password.php" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-uppercase">Correo Electronico</label>
              <input type="email" class="form-control" placeholder="E-mail" name="correo" required="">           
            </div>
            

            <div class="wrap-input100 validate-input" >                                            
              <select class="form-control " name="tipousuario" required>                                                
                <?php 
                //ciclo while 
                  while ($resultado= mysqli_fetch_assoc($seleccionUsuario)){                         
                ?> 
                <!-- se imprimen los datos en un select segun el respectivo id o nombre -->
                    <option value="<?php echo $resultado['id_tipo_usuario']?>"><?php echo $resultado['nombre']?></option>                                                
                <?php
                  }
                ?>
              </select>
            </div>
            <br>
            <div class="form-check">
              <button type="submit" class="btn btn-login float-left" name="submit">Recuperar Contraseña</button>
            </div>
          </form>   
        </div>
        <div class="col-md-8 banner-sec">     
          <img class="d-block img-fluid" src="images/logo.png" alt="First slide">
          <div class="banner-text">
              <h2 style="color: white;">Bienvenido</h2>
              <p style="color: white;">Recuerda no compartir tu contraseña con nadie</p>
          </div>  
        </div>
      </div>
    </div>
  </section>

<?php
  }else{
    header( "refresh:0;url=index.php" );    
  }
?>
</body>
</html>
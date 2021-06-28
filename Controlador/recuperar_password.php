<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['submit']) && !empty($_POST['doc']) && !empty($_POST['tipousuario'])){

        require_once '../Modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario metodo post
        $usuario = $_POST["doc"];
        $tipousuario = $_POST['tipousuario']; 

        
        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacenada en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        if($tipousuario == 1){
            echo " estudiante: " . $tipousuario;
            
            $usuarios= $mysql->efectuarConsulta("select asistencia.estudiante.id_estudiante, asistencia.estudiante.nombres, asistencia.estudiante.tipo_usuario_id_tipo_usuario, asistencia.estudiante.documento from estudiante where documento = ".$usuario." and estado = 1"); 
                        //Cuento si la consulta esta vacia
                        if (!empty($usuarios)){
                            //consulto si existen filas en el objeto
                            if(mysqli_num_rows($usuarios) > 0){
                                //inicio la session
                                session_start();
                                //recorro el resultado de la consulta y la almaceno en una variable
                                while ($resultado= mysqli_fetch_assoc($usuarios)){
                                    //almaceno los resultados en variables
                                    $id_estudiante = $resultado["id_estudiante"];
                                    $nombre = $resultado["nombres"];
                                    $tipo_usuario = $resultado['tipo_usuario_id_tipo_usuario'];
                                    $documento = $resultado['documento'];
                                }
                                $_SESSION['tipousuario'] = $tipo_usuario;
                                $_SESSION['idEstudiante'] = $id_estudiante;
                                $_SESSION['doc'] = $documento;
                                 //redirecciono al index
                                header("Location: ../recuperar_password2.php");
                            }else{
                                //Mesanje de error por si no hay filas en la consulta
                                echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                                header( "refresh:3;url=../login.php" );
                            }                                    
                        }else{
                            //Mensaje de error si la consulta esta vacia
                            echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                            header( "refresh:3;url=../login.php" ); 
                        } 
                    
        }elseif($tipousuario == 2){ 
            echo " docente: " . $tipousuario;

            $usuarios= $mysql->efectuarConsulta("select asistencia.docente.id_docente, asistencia.docente.nombres, asistencia.docente.tipo_usuario_id_tipo_usuario, asistencia.docente.documento from docente where documento = ".$usuario." and estado = 1"); 
                        //Cuento si la consulta esta vacia
                        if (!empty($usuarios)){
                            //consulto si existen filas en el objeto
                            if(mysqli_num_rows($usuarios) > 0){
                                //inicio la session
                                session_start();
                                //recorro el resultado de la consulta y la almaceno en una variable
                                while ($resultado= mysqli_fetch_assoc($usuarios)){
                                    //almaceno los resultados en variables
                                    $id_docente = $resultado["id_docente"];
                                    $nombre = $resultado["nombres"];
                                    $tipo_usuario = $resultado['tipo_usuario_id_tipo_usuario'];
                                    $documento = $resultado['documento'];
                                }
                                $_SESSION['tipousuario'] = $tipo_usuario;
                                $_SESSION['idDocente'] = $id_docente;
                                $_SESSION['doc'] = $documento;
                                 //redirecciono al index
                                header("Location: ../recuperar_password2.php");
                            }else{
                                //Mesanje de error por si no hay filas en la consulta
                                echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                                header( "refresh:3;url=../login.php" );
                            }                                    
                        }else{
                            //Mensaje de error si la consulta esta vacia
                            echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                            header( "refresh:3;url=../login.php" ); 
                        } 

        }elseif($tipousuario == 3){
            echo " administrador: " . $tipousuario;

            $usuarios= $mysql->efectuarConsulta("select asistencia.administrador.id_administrador, asistencia.administrador.nombres, asistencia.administrador.tipo_usuario_id_tipo_usuario, asistencia.administrador.documento from administrador where documento = ".$usuario." and estado = 1"); 
                        //Cuento si la consulta esta vacia
                        if (!empty($usuarios)){
                            //consulto si existen filas en el objeto
                            if(mysqli_num_rows($usuarios) > 0){
                                //inicio la session
                                session_start();
                                //recorro el resultado de la consulta y la almaceno en una variable
                                while ($resultado= mysqli_fetch_assoc($usuarios)){
                                    //almaceno los resultados en variables
                                    $id_administrador = $resultado["id_administrador"];
                                    $nombre = $resultado["nombres"];
                                    $tipo_usuario = $resultado['tipo_usuario_id_tipo_usuario'];
                                    $documento = $resultado['documento'];
                                }
                                $_SESSION['tipousuario'] = $tipo_usuario;
                                $_SESSION['idAdministrador'] = $id_administrador;
                                $_SESSION['doc'] = $documento;
                                 //redirecciono al index
                                header("Location: ../recuperar_password2.php");
                            }else{
                                //Mesanje de error por si no hay filas en la consulta
                                echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                                header( "refresh:3;url=../login.php" );
                            }                                    
                        }else{
                            //Mensaje de error si la consulta esta vacia
                            echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                            header( "refresh:3;url=../login.php" ); 
                        } 
        }
        //Desconecto la conexion de la bD
        $mysql->desconectar();          
    }else{
        echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se enviaron los datos.</div>";
        header( "refresh:3;url=../login.php" );
    }

?>
    
    


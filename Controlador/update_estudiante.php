<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos


        require_once '../Modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario metodo post
        $documento=$_POST["documento_usuario"];
        $nombre=$_POST["nombre_usuario"];
        $apellido=$_POST["apellido_usuario"];
        $semestre=$_POST["Semestre"];
        $tipo=$_POST["tipousuario"];
        $horario=$_POST["horario"];
        $carrera=$_POST["carrera"];
        $jornada=$_POST["radiobutton"];
        $ides = $_GET['id']; 
        

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacenada en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        //$sql=$mysql->efectuarConsulta("insert into asistencia.estudiante(documento,nombres,apellidos,jornada,semestre,horario_id_horario,Carrera_id_carrera,tipo_usuario_id_tipo_usuario) VALUES ('".$documento."','".$nombre."','".$apellido."','".$jornada."','".$semestre."','".$horario."','".$carrera."','".$tipo."')");


        $sql=$mysql->efectuarConsulta("UPDATE asistencia.estudiante SET documento ='".$documento."', nombres = '".$nombre."', apellidos ='".$apellido."',jornada ='".$jornada."',semestre ='".$semestre."',horario_id_horario ='".$horario."',Carrera_id_carrera ='".$carrera."', tipo_usuario_id_tipo_usuario ='".$tipo."'  WHERE id_estudiante = ".$ides."");
        //condicion donde si la consulta se hace correcto
        if($sql){
            //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se actualizo correctamente'); window.location='../index_administrador.php';</script>";

        }else{
            //mensaje de salida en caso de que la consulta falle
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../registro_usuario.php';</script>";
        }
        
         

?>
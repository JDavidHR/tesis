<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos

        session_start();
        require_once '../Modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario metodo post
        $password=$_POST["nueva_contrasena"];
        $tipousuario = $_SESSION['tipousuario'];
        $correo = $_SESSION['correo'];
        echo "tipo usuario: " . $tipousuario;
        echo " correo: " . $correo;
        echo " password new: " .$password;

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacenada en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas

        //$sql=$mysql->efectuarConsulta("UPDATE asistencia.aula SET nombre ='".$aula."' WHERE id_aula = ".$id."");
        //condicion donde si la consulta se hace correcto
        if($tipousuario == 1){
            $sql=$mysql->efectuarConsulta("UPDATE asistencia.estudiante SET clave ='".$password."' WHERE correo = '".$correo."'");
            if($sql){
            //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se actualizo correctamente'); window.location='../login.php';</script>";
            }else{
            //mensaje de salida en caso de que la consulta falle
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../login.php';</script>";
            }
        }elseif($tipousuario == 2){
            $sql=$mysql->efectuarConsulta("UPDATE asistencia.docente SET clave ='".$password."' WHERE correo = '".$correo."'");
            if($sql){
            //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se actualizo correctamente'); window.location='../login.php';</script>";
            }else{
            //mensaje de salida en caso de que la consulta falle
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../login.php';</script>";
            }
        }elseif($tipousuario == 3){
            $sql=$mysql->efectuarConsulta("UPDATE asistencia.administrador SET clave ='".$password."' WHERE correo = '".$correo."'");
            if($sql){
            //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se actualizo correctamente'); window.location='../login.php';</script>";
            }else{
            //mensaje de salida en caso de que la consulta falle
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../login.php';</script>";
            }
        }
        
         

?>
<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['submit']) && !empty($_POST['dia']) && !empty($_POST['horario']) && !empty($_POST['docente']) && !empty($_POST['estudiante'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario metodo post
        $fecha=$_POST["dia"];
        $fecha = date('Y-m-d H:i:s');
        $horario =$_POST["horario"];
        $docente =$_POST["docente"];
        $estudiante =$_POST["estudiante"];

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacenada en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        $sql=$mysql->efectuarConsulta("insert into asistencia.clase(dia,horario_id_horario,Docente_id_docente,Estudiante_id_estudiante) VALUES ('".$fecha."','".$horario."','".$docente."','".$estudiante."')");
        //condicion donde si la consulta se hace correcto
        if($sql){
            //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se registro correctamente'); window.location='../index_administrador.php';</script>";

        }else{
            //mensaje de salida en caso de que la consulta falle
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../registro_clase.php';</script>";
        }
        
         
}
?>
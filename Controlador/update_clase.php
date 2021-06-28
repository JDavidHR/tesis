<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos


        require_once '../Modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario metodo post
        
        //$fecha=time('H:i:s');
        $hora=$_POST["hora"];
        $materia = $_POST["materia"];
        $aula = $_POST["aula"];
        $ides = $_GET['id'];
        $dia = $_POST["dia"];
        $codigo = $_POST["codigo"];
        $docente = $_POST["nombre_docente"];
        $grupo = $_POST["grupo"];
        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacenada en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        
        $sql=$mysql->efectuarConsulta("UPDATE asistencia.clase SET Dias_id_dia ='".$dia."', hora ='".$hora."',codigo ='".$codigo."',Docente_id_docente ='".$docente."',Aula_id_aula ='".$aula."', Materia_id_materia = '".$materia."', Grupo_id_grupo ='".$grupo."' WHERE id_clase = ".$ides."");
        //condicion donde si la consulta se hace correcto
        //echo "dia: ".$dia;
        //echo " hora: ".$hora;
        //echo " codigo: ".$codigo;
        //echo " docente: ".$docente;
        //echo " aula: ".$aula;
        //echo " materia: ".$materia;
        //echo " grupo: ".$grupo;
        //echo " consulta: ".$sql;
        if($sql){
            //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se registro correctamente'); window.location='../index_administrador.php';</script>";

        }else{
            //mensaje de salida en caso de que la consulta falle
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../registro_horario.php';</script>";
        }
        
        
    
?>
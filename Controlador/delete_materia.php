<?php

    //Archivo requerido para hacer las peticiones a la base de datos
    require_once '../modelo/MySQL.php';
    
    
    $id_materia = $_GET['id_materia'];
    echo "dato: " . $id_materia;
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    //ejecucion de la consulta a la base de datos
    $sql = $mysql->efectuarConsulta("UPDATE asistencia.materia SET estado = 0 WHERE id_materia = ".$id_materia."");
    //Se valida si la consulta arrojo algun valor
    if($sql){
        //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
        echo"<script type=\"text/javascript\">alert('Se elimino correctamente'); window.location='../index_administrador.php';</script>";
        //echo $estudiante;
    }else{
        //mensaje de salida en caso de que la consulta falle
        echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../registro_materias.php';</script>";
    }
    $mysql->desconectar();   

?>
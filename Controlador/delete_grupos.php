<?php
if( isset($_POST['submit']) && isset($_POST['grupo'])){
    //Archivo requerido para hacer las peticiones a la base de datos
    require_once '../modelo/MySQL.php';
    
    
    $grupo=$_POST['grupo'];//Encriptada
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    //ejecucion de la consulta a la base de datos
    $sql = $mysql->efectuarConsulta("UPDATE asistencia.grupo SET estado = 0 WHERE id_grupo = ".$grupo."");
    //Se valida si la consulta arrojo algun valor
    if($sql){
        //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
        echo"<script type=\"text/javascript\">alert('Se elimino correctamente'); window.location='../index_administrador.php';</script>";
        //echo $estudiante;
    }else{
        //mensaje de salida en caso de que la consulta falle
        echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../registro_grupos.php';</script>";
    }
    $mysql->desconectar();   
} else {
    echo "0";
}
?>
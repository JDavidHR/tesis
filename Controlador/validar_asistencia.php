<?php
if( isset($_POST['submit']) && isset($_POST['codigo_clase'])){
    //Archivo requerido para hacer las peticiones a la base de datos
    require_once '../Modelo/MySQL.php';
    
    
    $codigo=$_POST['codigo_clase'];//Encriptada
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    //ejecucion de la consulta a la base de datos
    $sql = $mysql->efectuarConsulta("SELECT estudiante.id_estudiante, materia.nombre from estudiante join grupo on grupo.Estudiante_id_estudiante =  estudiante.id_estudiante join clase on clase.Grupo_id_grupo = grupo.id_grupo join materia on materia.id_materia = clase.Materia_id_materia where clase.codigo = '.$codigo.'");
    //$estado = $mysql->efectuarConsulta("");
    //$sql = $mysql->efectuarConsulta("SELECT clase.codigo from clase where clase.codigo = ".$codigo."");
    //echo "la codigo es: ".$codigo;
    //Se valida si la consulta arrojo algun valor
    if($sql){
        //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
        echo"<script type=\"text/javascript\">alert('Codigo Correcto'); window.location='../index_estudiante.php';</script>";
        //echo $estudiante;
    }else{
        //mensaje de salida en caso de que la consulta falle
        echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../validar_asistencia.php';</script>";
    }
    $mysql->desconectar();   
} else {
    echo "0";
}
?>
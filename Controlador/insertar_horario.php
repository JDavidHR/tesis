<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['submit']) && !empty($_POST['hora']) && !empty($_POST['aula']) && !empty($_POST['materia']) && !empty($_POST['horario'])){

        require_once '../Modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario metodo post
        $fecha=$_POST["hora"];
        //$fecha = time("H:i:s");
        
        $materia = $_POST["materia"];
        $aula = $_POST["aula"];
        $horario = $_POST["horario"];

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacenada en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        $sql = $mysql->efectuarConsulta("insert into asistencia.horario(id_horario,hora,materia_id_materia,aula_id_aula,estado) VALUES ('".$horario."','".$fecha."','".$materia."','".$aula."',1)");
        //condicion donde si la consulta se hace correcto
        
        if($sql){
            //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se registro correctamente'); window.location='../index_administrador.php';</script>";

        }else{
            //mensaje de salida en caso de que la consulta falle
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../registro_horario.php';</script>";
        }
        
        
}
?>
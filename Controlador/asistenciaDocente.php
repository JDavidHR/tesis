<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['submit']) && !empty($_POST['idclaseimprimir']) && !empty($_POST['fechaclase'])){


        require_once '../Modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario metodo post
        $comentarios=$_POST["comentarios"];
        $id_clase = $_POST['idclaseimprimir'];
        $fechaclase = $_POST['fechaclase']; 

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacenada en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        //echo "comentarios: " . $comentarios;
        //echo "id_clase: " . $id_clase;
        //echo "fechaclase: " . $fechaclase;


        $sql = $mysql->efectuarConsulta("insert into asistencia.a_docente(clase_id_clase, fecha,estado,estado2) VALUES ('".$id_clase."','".$fechaclase."','Activa',1)");
        //condicion donde si la consulta se hace correcto
        if($sql){
            $sql2 = $mysql->efectuarConsulta("insert into asistencia.links(links, fecha, clase_id_clase) VALUES ('".$comentarios."','".$fechaclase."', '".$id_clase."')");
            //mensaje de salida (alert) cuanod la consulta es exitosa con su respectiva redireccion de pagina
            if($sql2){
            echo"<script type=\"text/javascript\">alert('Se registró correctamente'); window.location='../registro_clase_docente.php';</script>";
            }else{
                echo"<script type=\"text/javascript\">alert('Se produjo un error 2'); window.location='../registro_clase_docente.php';</script>";
            }

        }else{
            //mensaje de salida en caso de que la consulta falle
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../registro_clase_docente.php';</script>";
        }
        
    
}
?>
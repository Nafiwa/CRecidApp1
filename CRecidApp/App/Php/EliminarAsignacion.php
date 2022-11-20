<?php

$con=mysqli_connect('localhost','root','','crecid');
include_once("conexion.php");

        $asignacion = $_GET["asignacion"];

		#Aqui vamos a Actualizar los datos ingresados(los valores deben de ser iguales a los de nuestra base de datos)
		$Eliminardatos = "DELETE FROM asignacion  WHERE asignacion.idAsignacion = '$asignacion'";
												
		$ejecutarEliminacion = mysqli_query($con,$Eliminardatos);

        if(!$ejecutarEliminacion){
            echo "<script>alert('No se pudo eliminar');window.history.go(-1);</script>";
        } else{
            header("Location: index.php");
        }

?>
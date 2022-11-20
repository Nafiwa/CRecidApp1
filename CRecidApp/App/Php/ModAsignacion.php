<?php

$con=mysqli_connect('localhost','root','','crecid');
include_once("conexion.php");
        $id = $_POST['asignacion'];
        $fecha = $_POST["fecha"];
        $usuario = $_POST["usuario"];
        $hospital = $_POST["hospital"];
        $turno = $_POST["turno"];
        $area = $_POST["area"];

		#Aqui vamos a Actualizar los datos ingresados(los valores deben de ser iguales a los de nuestra base de datos)
		$actualizardatos = "UPDATE asignacion SET FechaAsign= '$fecha',
                                            Usuario = '$usuario',
                                            NombreHospital ='$hospital' ,
                                            idTurnos ='$turno',
                                            idAreas ='$area'
                                            WHERE asignacion.idAsignacion = '$id'";
												
		$ejecutarActualizacion = mysqli_query($con,$actualizardatos);

        if(!$ejecutarActualizacion){
            echo "<script>alert('No se pudo actualizar');window.history.go(-1);</script>";
        } else{
            header("Location: index.php");
        }

?>
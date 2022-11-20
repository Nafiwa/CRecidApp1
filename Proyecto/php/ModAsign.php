<?php

$con=mysqli_connect('localhost','root','','crecid');
include_once("conexion.php");

        $asignacion = $_POST['asignacion'];
        $fecha = $_POST["fecha"];
        $usuario = $_POST["usuario"];
        $hospital = $_POST["hospital"];
        $turno = $_POST["turno"];
        $area = $_POST["area"];

		

        try {

            if($fecha==null){
			$actualizardatos = "UPDATE asignacion SET idAsignacion = '$asignacion',
                                            
                                            Usuario = '$usuario',
                                            NombreHospital ='$hospital' ,
                                            idTurnos ='$turno',
                                            idAreas ='$area'
                                            WHERE asignacion.idAsignacion = '$asignacion'";
												
		$ejecutarActualizacion = mysqli_query($con,$actualizardatos);
        echo "<script>alert('Se ha actualizado la Asignacion con éxito');
            window.location='../Php/index.php'</script>";
    }else{

    $actualizardatos = "UPDATE asignacion SET idAsignacion = '$asignacion',
                                            FechaAsign= '$fecha',
                                            Usuario = '$usuario',
                                            NombreHospital ='$hospital' ,
                                            idTurnos ='$turno',
                                            idAreas ='$area'
                                            WHERE asignacion.idAsignacion = '$asignacion'";
												
		$ejecutarActualizacion = mysqli_query($con,$actualizardatos);

			echo "<script>alert('Se ha actualizado la Asignacion con éxito');
            window.location='../Php/index.php'</script>";
        }

		} catch(Exception $e) {

			echo "<script>alert('No se pudo actualizar. Vuelvalo a intentar'); window.location='../Php/ModAsign.php'</script>;</script>";
		}

?>

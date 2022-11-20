<?php

$con=mysqli_connect('localhost','root','','crecid');
include_once("conexion.php");

        $hospital = $_POST["hospital"];
		$direccion = $_POST["direccion"];
		$telefono = $_POST["telefono"];

        try {
		#Aqui vamos a Actualizar los datos ingresados(los valores deben de ser iguales a los de nuestra base de datos)
		$actualizardatos = "UPDATE hospital SET 
                                            Direccion = '$direccion',
                                            Telefono ='$telefono'
                                            WHERE hospital.NombreHospital = '$hospital'";
												
		$ejecutarActualizacion = mysqli_query($con,$actualizardatos);

        echo "<script>alert('Hospital Actualizado con éxito'); window.location='../Php/index.php'</script>;</script>";
    

    } catch(Exception $e) {

        echo "<script>alert('No se pudo actualizar el Hospital. Vuelvalo a intentar'); window.location='../Php/ModHosp.php'</script>;</script>";
    }

        
?>

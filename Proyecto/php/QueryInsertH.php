<?php
$con=mysqli_connect('localhost','root','','crecid');
	include_once("conexion.php");


	#Mediante el _POST recibimos los datos
	if(isset($_POST['btnEnviar'])) {

	
		$hospital = $_POST["hospital"];
		$direccion = $_POST["direccion"];
		$telefono = $_POST["telefono"];

	
		try {
		#Aqui vamos a insertar los datos ingresados(los valores deben de ser iguales a los de nuestra base de datos)
				$insertardatos = "INSERT INTO hospital SET NombreHospital='$hospital', 
				Direccion='$direccion', 
				Telefono='$telefono',
				Activo='1' ";
			$ejecutarInsertar = mysqli_query($con,$insertardatos);
			echo "<script>alert('Hospital registrado correctamente'); window.location='../Php/RegHosp.php'</script>;</script>";

		} catch(Exception $e) {

			echo "Hospital no disponible. Favor de ingresar uno no existente";
		}
		


    }

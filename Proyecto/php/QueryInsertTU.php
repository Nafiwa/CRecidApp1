<?php
$con=mysqli_connect('localhost','root','','crecid');
	include_once("conexion.php");


	#Mediante el _POST recibimos los datos
	if(isset($_POST['btnEnviar'])) {

	
	
		$usuario = $_POST["usuario"];
		
		#Aqui vamos a insertar los datos ingresados(los valores deben de ser iguales a los de nuestra base de datos)

		try {
			$insertardatos = "INSERT INTO tipousuario SET  tipo='$usuario'";
			$ejecutarInsertar = mysqli_query($con,$insertardatos);
			echo "<script>alert('Se ha registrado con éxito');
            window.location='../Php/RegTU.php'</script>";

		} catch(Exception $e) {

			echo "<script>alert('Ocurrió un error, vuelva a intentar'); window.location='../Php/RegTU.php'</script>;</script>";
		}
	


    }

    ?>
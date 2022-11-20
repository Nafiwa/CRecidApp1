<?php
$con=mysqli_connect('localhost','root','','crecid');
	include_once("conexion.php");

	#Mediante el _POST recibimos los datos
	if(isset($_POST['btnEnviar'])) {

        $fecha = $_POST["fecha"];
		$usuario = $_POST["usuario"];
		$hospital = $_POST["hospital"];
		$turno = $_POST["turno"];
        $area = $_POST['area'];
    
		#Aqui vamos a insertar los datos ingresados(los valores deben de ser iguales a los de nuestra base de datos)
		$insertarAsignacion = "INSERT INTO asignacion SET  FechaAsign='$fecha', 
        Usuario='$usuario', NombreHospital='$hospital', idTurnos='$turno', idAreas='$area'";

												
		$ejecutarAsig = mysqli_query($con,$insertarAsignacion);
	
        if($ejecutarAsig){
            echo "<script>alert('Se ha registrado la asignacion con éxito');
            window.location='../Php/index.php'</script>";
        } else{
            echo "<script>alert('No se pudo registrar');window.history.go(-1);</script>";
        }

    }
    ?>
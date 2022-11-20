<?php

$con=mysqli_connect('localhost','root','','crecid');
include_once("conexion.php");

      

        try {
			$rut = $_REQUEST['rut'];
        $consulta = "UPDATE usuarios SET Activo=0 WHERE Usuario = '$rut'";

        $ejecutarEliminacion = mysqli_query($con,$consulta);
        header("Location: index.php");

		} catch(Exception $e) {

			echo "<script>alert('No se pudo Inactivar. Vuelvalo a intentar'); window.location='../Php/index.php.php'</script>;</script>";
		}

?>
<?php

$con=mysqli_connect('localhost','root','','crecid');
include_once("conexion.php");

error_reporting(0);

$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$nombre = $_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoM = $_POST["apellidoM"];


		

        try {

            if($contrasena==null){
			$actualizardatos = "UPDATE usuarios SET Usuario = '$usuario',
                                            
                                            Nombres ='$nombre' ,
                                            A_Paterno ='$apellidoP',
                                            A_Materno ='$apellidoM'
                                           
                                            WHERE usuarios.Usuario = '$usuario'";
												
		$ejecutarActualizacion = mysqli_query($con,$actualizardatos);
        echo "<script>alert('Se ha actualizado al Usuario con éxito');
            window.location='../Php/index.php'</script>";
    }else{

        $actualizardatos = "UPDATE usuarios SET Usuario = '$usuario',
        Contrasena = '$contrasena',
        Nombres ='$nombre' ,
        A_Paterno ='$apellidoP',
        A_Materno ='$apellidoM'
        WHERE usuarios.Usuario = '$usuario'";
												
		$ejecutarActualizacion = mysqli_query($con,$actualizardatos);

			echo "<script>alert('Se ha actualizado al Usuario con éxito');
            window.location='../Php/index.php'</script>";
        }

		} catch(Exception $e) {

			echo "<script>alert('No se pudo actualizar. Vuelvalo a intentar'); window.location='../Php/ModAsign.php'</script>;</script>";
		}
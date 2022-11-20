<?php
$con=mysqli_connect('localhost','root','','crecid');
	include_once("conexion.php");

	#Mediante el _POST recibimos los datos
	if(isset($_POST['btnEnviar'])) {
        
        $usuario = $_POST['usuario'];
        $contrasena = $_POST["contrasena"];
		$nombre = $_POST["nombre"];
		$apellidoP = $_POST["apellidoP"];
		$appelidoM = $_POST["apellidoM"];
        $tipoU = $_POST['tipoU'];

	
        try {
			#Aqui vamos a insertar los datos ingresados(los valores deben de ser iguales a los de nuestra base de datos)
		$insertarUsuarios = "INSERT INTO usuarios SET Usuario='$usuario', Contrasena='$contrasena', 
        Nombres='$nombre', A_Paterno='$apellidoP', A_Materno='$appelidoM', idTUsuario='$tipoU',
        Activo='1' ";
			$ejecutarU = mysqli_query($con,$insertarUsuarios);
			echo "<script>alert('Se ha registrado el usuario con éxito');
            window.location='../Php/RegUsu.php'</script>";

		} catch(Exception $e) {

			echo "Usuario no disponible. Favor de ingresar uno no existente";
		}

    }
    ?>
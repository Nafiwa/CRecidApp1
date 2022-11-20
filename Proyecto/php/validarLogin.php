<?php

include_once 'conexion.php';
$con=mysqli_connect('localhost','root','','crecid');

#Mediante el _POST recibimos los datos
        
if(!empty($_POST)){

        session_start();

$usuario = $_POST['Usuario'];
$contrasena = $_POST['Contrasena'];

$_SESSION['Usuario'] = $usuario;
$_SESSION['Contrasena'] = $contrasena;

$login = "SELECT*FROM usuarios WHERE Usuario='$usuario' and Contrasena = '$contrasena'"  ;
$resultado = mysqli_query($con,$login);

$filas=mysqli_fetch_array($resultado);

if($filas!=null){

if($filas['idTUsuario']==1){ //ADMINISTRADOR
    header("location:index.php");
}else
    if($filas['idTUsuario']==2){ //HOSPITAL
        header("location:index.php");
}else
    if($filas['idTUsuario']==3){ //interno
        header("location:ejemplo.php");
}
}else{
    ?> 
<?php
    echo '<script type="text/javascript">
    alert("Usuario y/o contraseña incorrectos");
    window.location.href="login.php";
    </script>';
    ?>
    <?php
    
}
mysqli_free_result($resultado);
mysqli_close($con);
}


?>


<?php
class Database{
function conectar(){
    $user="root";
    $pass="";
    $server="localhost";
    $db="crecid";

    $conexion= new mysqli($server,$user,$pass,$db);

    if($conexion->connect_errno){
        return "Tu puedes, intentale otra ves";
    } else {
        return "Conectado jiji";
    }
    

}
}

function conectar(){
    $user="root";
    $pass="";
    $server="localhost";
    $db="crecid";

    $conexion= new mysqli($server,$user,$pass,$db);

    if($conexion->connect_errno){
        return "Tu puedes, intentale otra ves";
    } else {
        return "Conectado jiji";
    }
    

}


?>


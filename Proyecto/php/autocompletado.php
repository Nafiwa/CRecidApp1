<?php

include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

$sql = "SELECT * FROM usuarios";
$resultados = mysqli_query($con,$sql);
$json_array = array();

while($data = mysqli_fetch_assoc($resultados)){
    $json_array[] = $data;
}

echo json_encode($json_array);

?>
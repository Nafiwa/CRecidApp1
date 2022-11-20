<?php

include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

/*Buscar por la matricula*/
$buscarA = $_POST['buscar'];
$sqlBuscar = "SELECT idDescInt, Nombres, A_Paterno, A_Materno, DescripcionInterno FROM descripcioninterno, usuarios WHERE descripcioninterno.Usuario = usuarios.Usuario AND Nombres LIKE '$buscarA' '%'";
$resultBuscar = mysqli_query($con, $sqlBuscar);


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" &amp;gt;>


    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <script type="text/javascript" src="../javaScript/javascript.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet" />
    <title>C•Recid</title>
</head>

<body>
    <div class="main">
        <div class="menu">
            <img src="../img/logoCrecid.png" />
            <br /><br /><br />
            <button class="tablinks" onclick="tabs(event, 'Usuarios' )">Usuarios</button>
            <br />
            <button class="tablinks" onclick="tabs(event, 'Hospitales')">Hospitales</button>
            <br />
            <button class="tablinks" onclick="tabs(event, 'Registro')">Registro de actividades</button>
            <br />
            <button class="tablinks" onclick="tabs(event, 'Asignacion')">Asignación</button>

        
        </div>
        <div class="body">

                    <h2>Registros de Internos</h2>

                    <div class="topnav">
                <div class="login-container">
                    <form action="BuscarDescInternos.php" method="post">
                        <label for="num">Interno o Fecha: </label>
                        <input type="text" name="buscar" placeholder="Ingresa el nombre del interno">
                        <button type="submit" class="buscar">Buscar</button>
                    </form>
                </div>
            </div>

                    <!-- tabla de registros de internos -->
                        <TABLE CLASS="TABLA-RESPONSIVA" id="tabla">
                            <thead>
                                <tr>
                                    <th class="th-responsiva1">No de reporte</th>
                                    <th class="th-responsiva1">Nombre</th>
                                    <th class="th-responsiva1">Apellido Paterno</th>
                                    <th class="th-responsiva1">Apellido Materno</th>
                                    <th class="th-responsiva1">Asunto</th>
                                 

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                mysqli_autocommit($con, FALSE);
                                while ($mostrar = mysqli_fetch_array($resultBuscar)) {
                                ?>
                                    <tr>

                                <td class="th-responsiva"><?php echo $mostrar['idDescInt'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['Nombres'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['A_Paterno'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['A_Materno'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['DescripcionInterno'] ?></td>
                                            
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </TABLE>
                        <div class="formu">
                <a href="index.php"> Regresar </a>
            </div>
                </div>

            </div>
        </div>
            </div>
        </div>
    

 
</body>

</html>
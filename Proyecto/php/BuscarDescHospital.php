<?php

include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

/*Buscar por la matricula*/
$buscarA = $_POST['buscar'];
$sqlBuscar = "SELECT idDescHos, FechaDescHosp,DescripcionHosp,NombreHospital FROM descripcionhospital WHERE NombreHospital LIKE '$buscarA' '%'";
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

        <h2>Registro de Hospital</h2>

            <div class="topnav">
            <div class="login-container">
            <form action="BuscarDescHospital.php" method="post">
                <label for="num">Hospital: </label>
                <input type="text" name="buscar" placeholder="Ingresa el nombre del Hospital">
                <button type="submit" class="buscar">Buscar</button>
            </form>
            </div>
            </div>


            <div>
            <TABLE CLASS="TABLA-RESPONSIVA">
        <thead>
            <tr>
            <th class="th-responsiva1">No de reporte</th>
                <th class="th-responsiva1">Fecha</th>
                <th class="th-responsiva1">Reporte</th>
                <th class="th-responsiva1">Hospital Remitente</th>
            </tr>
        </thead>

        <tbody>
            <?php
            mysqli_autocommit($con, FALSE);
            while ($mostrar = mysqli_fetch_array($resultBuscar)) {
            ?>
                <tr>
                <td class="th-responsiva"><?php echo $mostrar['idDescHos'] ?></td>
                    <td class="th-responsiva"><?php echo $mostrar['FechaDescHosp'] ?></td>
                    <td class="th-responsiva"><?php echo $mostrar['DescripcionHosp'] ?></td>
                    <td class="th-responsiva"><?php echo $mostrar['NombreHospital'] ?></td>
                    
                </tr>
            <?php
            }
            ?>
        </tbody>
    </TABLE>
</div>
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
<?php

include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

$buscarH = $_POST['buscar'];

$sqlBuscar = "SELECT NombreHospital, Direccion, Telefono, Activo FROM hospital WHERE NombreHospital LIKE '$buscarH' '%' ";
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

            <!-- <a href="#1">Internos</a>
            <a href="#">Hospitales</a>
            <a href="#">Registro de actividades</a>-->
        </div>
        <div class="body">

            <div class="topnav">
                <div class="login-container">
                    <p>Hospitales</p>
                </div>
            </div>

            <div class="topnav">
                <div class="login-container">
                    <form action="BuscarHospitales.php" method="post">
                        <label for="num">Hospital: </label>
                        <input type="text" name="buscar" placeholder="Ingresa un hospital">
                        <button type="submit" class="buscar">Buscar</button>
                    </form>
                </div>
            </div>

            <BR>
            <div style="overflow-x: auto;">
                <TABLE CLASS="TABLA-RESPONSIVA">
                    <thead>
                        <tr>
                            <th class="th-responsiva1">Nombre</th>
                            <th class="th-responsiva1">Dirección</th>
                            <th class="th-responsiva1">Teléfono</th>
                            <th class="th-responsiva1">Estatus</th>
                            <th class="th-responsiva1"></th>
                            <th class="th-responsiva1"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (mysqli_num_rows($resultBuscar)>0){
                        while ($mostrar = mysqli_fetch_array($resultBuscar)) {
                        ?>
                            <tr>
                                <td class="th-responsiva"><?php echo $mostrar['NombreHospital'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['Direccion'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['Telefono'] ?></td>


                                <td class="th-responsiva"><a href="modificarHospitales.php?  
                        hospital=<?php echo $mostrar['NombreHospital'] ?> &
                        direccion=<?php echo $mostrar['Direccion'] ?> &
                        telefono=<?php echo $mostrar['Telefono'] ?>">
                                        <img src="../img/icono.png" height="20px" width="20px">
                                    </a></td>

                                <td class="th-responsiva"><a href="EliminarHospitales.php?
                        hospital=<?php echo $mostrar['NombreHospital'] ?>">
                                        <img src="../img/trash-var-flat.png" height="20px" width="20px">
                                    </a></td>
                            </tr>
                            <div>
                                    
                            <?php

                        }
                    }else{
                        ?>

                        <tr>
                        <td colspan="3" class="th-responsiva">Sin resultados</td>
                        </tr>

                        <?php
                        
                    }
                            ?>
                    </tbody>
                </TABLE>

            </div>
            <div class="formu">
                <a href="index.php"> Cancelar </a>
            </div>
        </div>

    </div>

</body>

</html>
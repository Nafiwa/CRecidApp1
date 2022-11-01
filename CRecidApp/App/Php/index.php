<?php

include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

$sqlSelect = "SELECT * FROM hospital";
$resultSelect = mysqli_query($con, $sqlSelect);


$sqlSelectTU = "SELECT * FROM tipousuario";
$resultSelectTU = mysqli_query($con, $sqlSelectTU);



$sqlSelectU = "SELECT * FROM usuarios";
$resultSelectUsuarios = mysqli_query($con, $sqlSelectU);




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

<body onload="pagLoad()">
    <div class="main">
        <div class="menu">
            <a href="#Internos">
                <img src="../img/logoCrecid.png" />
            </a>
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
            <div id="Usuarios" class="menuContent">
                <!--<div class="window-notice" id="window-notice">
                    <div class="content">
                        <div class="content-text">Este sitio utiliza cookies para obtener la mejor experiencia en nuestra web. 
                        <a href="#">Leer más.</a></div>
                        <div class="content-buttons"><a href="#Internos" id="close-button">Aceptar</a></div>
                    </div>
                </div>-->
                <div class="title">
                    <h1>Usuarios</h1>
                </div>
                <div class="linebutton">
                <button  onclick="Usuario()">Añadir nuevo Usuario &#10133;</button>
                <button  onclick="Tipo()">Añadir nuevo Tipo de Usuario &#10133;</button>
                </div>
                <div class="abajo">
                    <!--empieza tabla de Tipo de usuarios registrados-->

                    <br><br>
                    <!--empieza tabla de usuarios registrados-->

                    <div style="overflow-x: auto;">
                        <TABLE CLASS="TABLA-RESPONSIVA">
                            <thead>
                                <tr>
                                    <th class="th-responsiva">Usuario</th>
                                    <th class="th-responsiva">Nombre</th>
                                    <th class="th-responsiva">Apellido Paterno</th>
                                    <th class="th-responsiva">Apellido Materno</th>
                                    <th class="th-responsiva">Tipo de Usuario</th>
                                    <th class="th-responsiva">Estatus</strong></th>
                                    <th class="th-responsiva"></th>
                                    <th class="th-responsiva"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                mysqli_autocommit($con, FALSE);
                                while ($mostrar = mysqli_fetch_array($resultSelectUsuarios)) {
                                ?>
                                    <tr>
                                        <td class="th-responsiva"><?php echo $mostrar['Usuario'] ?></td>
                                        <td class="th-responsiva"><?php echo $mostrar['Nombres'] ?></td>
                                        <td class="th-responsiva"><?php echo $mostrar['A_Paterno'] ?></td>
                                        <td class="th-responsiva"><?php echo $mostrar['A_Materno'] ?></td>
                                        <td class="th-responsiva"><?php echo $mostrar['idTUsuario'] ?></td>
                                        <td class="th-responsiva"><?php echo $mostrar['Estatus'] ?></td>
                                        <td class="th-responsiva"><a href="modificarUsuarios.php?  
                        usuario=<?php echo $mostrar['Usuario'] ?> &
                        contrasena=<?php echo $mostrar['Contrasena'] ?> &
                        nombre=<?php echo $mostrar['Nombres'] ?> &
                        apellidoP=<?php echo $mostrar['A_Paterno'] ?> &
                        apellidoM=<?php echo $mostrar['A_Materno'] ?> &
                        id=<?php echo $mostrar['idTUsuario'] ?> &
                        estatus=<?php echo $mostrar['Estatus'] ?>">
                                                <img src="../img/icono.png" height="20px" width="20px">
                                            </a></td>
                                        <td class="th-responsiva"><a href="EliminarUsuarios.php?
                        hospital=<?php echo $mostrar['Usuario'] ?>">
                                                <img src="../img/trash-var-flat.png" height="20px" width="20px">
                                            </a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </TABLE>
                    </div>
                    <!--termina tabla de usuarios registrados-->

                </div>
            </div>

            <div id="Hospitales" class="menuContent" style="display: none;">

                <div class="title">
                    <h1>Hospitales</h1>
                </div>
                <br><br>
                <button onclick="Hospital()">Añadir Hospital</button>
                <br><br>

                <div>
                    <form action="BuscarHospitales.php" method="post">
                        <input type="text" name="buscar">
                        <input type="submit" value="Buscar">
                    </form>
                </div>
                
                <BR>
                <div style="overflow-x: auto;" id="results">

                    <TABLE CLASS="TABLA-RESPONSIVA" id="tabla">

                        <thead>
                            <tr>
                                <th class="th-responsiva"><strong>Nombre</strong></th>
                                <th class="th-responsiva"><strong>Dirección</strong></th>
                                <th class="th-responsiva"><strong>Teléfono</strong></th>
                                <th class="th-responsiva"><strong>Estatus</strong></th>
                                <th class="th-responsiva"></th>
                                <th class="th-responsiva"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($mostrar = mysqli_fetch_array($resultSelect)) {
                            ?>
                                <tr>

                                    <td class="th-responsiva"><?php echo $mostrar['NombreHospital'] ?></td>
                                    <td class="th-responsiva"><?php echo $mostrar['Direccion'] ?></td>
                                    <td class="th-responsiva"><?php echo $mostrar['Telefono'] ?></td>
                                    <td class="th-responsiva"><?php echo $mostrar['Estatus'] ?></td>

                                    <td class="th-responsiva"><a href="modificarHospitales.php?  
                        hospital=<?php echo $mostrar['NombreHospital'] ?> &
                        direccion=<?php echo $mostrar['Direccion'] ?> &
                        telefono=<?php echo $mostrar['Telefono'] ?> &
                        estatus=<?php echo $mostrar['Estatus'] ?>">

                                            <img src="../img/icono.png" height="20px" width="20px">
                                        </a></td>

                                    <td class="th-responsiva"><a href="EliminarHospitales.php?
                        hospital=<?php echo $mostrar['NombreHospital'] ?>">
                                            <img src="../img/trash-var-flat.png" height="20px" width="20px">
                                        </a></td>
                                </tr>
                            <?php

                            }

                            ?>
                        </tbody>
                    </TABLE>
                </div>


            </div>
            <div id="Registro" class="menuContent" style="display: none;">
                <div class="title">
                    <h1>Registro de actividades</h1>


                </div>
            </div>
            <div id="Asignacion" class="menuContent" style="display: none;">
                <div class="title">
                    <h1>Asignación</h1>


                </div>
            </div>
        </div>
    </div>


</body>


</html>
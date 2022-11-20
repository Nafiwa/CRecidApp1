<?php

include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

$sqlSelect = "SELECT * FROM hospital WHERE Activo=1";
$resultSelect = mysqli_query($con, $sqlSelect);


$sqlSelectTU = "SELECT * FROM tipousuario";
$resultSelectTU = mysqli_query($con, $sqlSelectTU);



$sqlSelectU = "SELECT Usuario, Contrasena, Nombres, A_Paterno, A_Materno, Tipo FROM usuarios,tipousuario WHERE usuarios.idTUsuario = tipousuario.idTUsuario AND Activo=1";
$resultSelectUsuarios = mysqli_query($con, $sqlSelectU);

$sqlSelectA = "SELECT idAsignacion, FechaAsign, usuarios.Usuario, Nombres, A_Paterno, Descripcion, Areas FROM asignacion,turnos,areas,usuarios WHERE asignacion.idTurnos = turnos.idTurnos AND asignacion.idAreas = areas.idAreas AND asignacion.Usuario = usuarios.Usuario";
$resultSelectAsignacion = mysqli_query($con, $sqlSelectA);

$sqlSelectDescripcionInternos = "SELECT idDescInt, Nombres, A_Paterno, A_Materno, DescripcionInterno FROM descripcioninterno, usuarios WHERE descripcioninterno.Usuario = usuarios.Usuario";
$resultSelectDI = mysqli_query($con,$sqlSelectDescripcionInternos);

$sqlSelectDescripcionHospital="SELECT idDescHos, FechaDescHosp,DescripcionHosp,NombreHospital FROM descripcionhospital";
$resultSelectDH = mysqli_query($con,$sqlSelectDescripcionHospital);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" &amp;gt;>
    <link rel="stylesheet" href="../Css/style.css" type="text/css" />
    <script type="text/javascript" src="../javaScript/javascript.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet" />
    <title>C•Recid</title>
</head>

<body onload="pagLoad()">

    <div class="main">
        <!-- menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu-menu -->
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
        <!-- fin menu-fin menu-fin menu-fin menu-fin menu-fin menu-fin menu-fin menu-fin menu-fin menu-fin menu-fin menu-fin menu- -->

        <!-- Usuarios-Usuarios-Usuarios-Usuarios-Usuarios-Usuarios-Usuarios-Usuarios-Usuarios-Usuarios-Usuarios-Usuarios-Usuarios-Usuarios- -->
        <div id="Usuarios" class="menuContent">

            <div class="topnav">
                <div class="login-container">
                    <p>Usuarios</p>
                    <button type="button" onclick="location.href='RegTu.php'" class="titles">Añadir Tipo</button>
                    <button type="button" onclick="location.href='RegUsu.php'" class="titles">Añadir Usuario</button>
                </div>
            </div>
            <div>
                <!--empieza tabla de usuarios registrados-->

                <div class="topnav">
                <div class="login-container">
                <form action="BuscarUsuarios.php" method="post">
                        <label for="num">Usuario: </label>
                        <input type="text" name="buscar" placeholder="Ingresa la matricula">
                        <button type="submit" class="buscar">Buscar</button>
                    </form>

                    <form action="BuscarUsuarioXNombre.php" method="post">
                        <label for="num">Nombre: </label>
                        <input type="text" name="buscar" placeholder="Ingresa el nombre">
                        <button type="submit" class="buscar">Buscar</button>
                    </form>
                </div>
            </div>

                <div>
                    <TABLE CLASS="TABLA-RESPONSIVA">
                        <thead>
                            <tr>
                                <th class="th-responsiva1">Usuario</th>
                                <th class="th-responsiva1">Nombre</th>
                                <th class="th-responsiva1">Apellido Paterno</th>
                                <th class="th-responsiva1">Apellido Materno</th>
                                <th class="th-responsiva1">Tipo de Usuario</th>
                                <th class="th-responsiva1"></th>
                                <th class="th-responsiva1"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            mysqli_autocommit($con, FALSE);
                            while ($mostrar = mysqli_fetch_array($resultSelectUsuarios)) {
                            ?>
                                <tr>
                                    <td class="th-responsiva"><?php $rut = $mostrar['Usuario'];
                                                                echo $rut; ?></td>
                                    <td class="th-responsiva"><?php echo $mostrar['Nombres'] ?></td>
                                    <td class="th-responsiva"><?php echo $mostrar['A_Paterno'] ?></td>
                                    <td class="th-responsiva"><?php echo $mostrar['A_Materno'] ?></td>
                                    <td class="th-responsiva"><?php echo $mostrar['Tipo'] ?></td>
                                    <td class="th-responsiva"><a href="ModificarUsuario.php?  
                                        usuario=<?php echo $mostrar['Usuario'] ?> &
                                        nombre=<?php echo $mostrar['Nombres'] ?> &
                                        apellidoP=<?php echo $mostrar['A_Paterno'] ?> &
                                        apellidoM=<?php echo $mostrar['A_Materno'] ?> &
                                        id=<?php echo $mostrar['Tipo'] ?>">
                                            <img src="../img/icono.png" height="20px" width="20px">
                                        </a></td>
                                    <td class="th-responsiva"><a href="EliminarUsuarios.php?rut=<?php echo $rut; ?>" ;>
                                            <img src="../img/trash-var-flat.png" onclick="return confirmacionU()"height="20px" width="20px">
                                        </a></td>
                                </tr>
                                <script>
                            function confirmacionU(){
                            var respuesta = confirm("¿Seguro desea inactivar el usuario?. Para poder activarlo nuevamente necesitará llamar a su proveedor");
                                if(respuesta==true){
                                    return true;
                                }else{
                                    return false;
                                }
                            }
                            </script>
                            <?php
                            }
                            ?>
                        </tbody>
                    </TABLE>
                </div>
                <!--termina tabla de usuarios registrados-->

            </div>
        </div>
        <!-- fin Usuarios-fin Usuarios-fin Usuarios-fin Usuarios-fin Usuarios-fin Usuarios-fin Usuarios-fin Usuarios-fin Usuarios-fin Usuarios -->

        <!-- Hospitales-Hospitales-Hospitales-Hospitales-Hospitales-Hospitales-Hospitales-Hospitales-Hospitales-Hospitales-Hospitales-Hospitales- -->
        <div id="Hospitales" class="menuContent" style="display: none;"><br>

            <div class="topnav">
                <div class="login-container">
                    <p>Hospitales</p>
                    <button type="submit" onclick="location.href='RegHosp.php'" class="titles">Añadir Hospital</button>
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
            <div style="overflow-x: auto;" id="results">

                <TABLE CLASS="TABLA-RESPONSIVA" id="tabla">

                    <thead>
                        <tr>
                            <th class="th-responsiva1 th-content">Hospital</th>
                            <th class="th-responsiva1 th-content">Direccion</th>
                            <th class="th-responsiva1 th-content">Teléfono</th>

                            <th class="th-responsiva1 th-content"></th>
                            <th class="th-responsiva1 th-content"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($mostrar = mysqli_fetch_array($resultSelect)) {
                        ?>
                            <tr>

                                <td><?php $rut = $mostrar['NombreHospital'];
                                    echo $rut; ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['Direccion'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['Telefono'] ?></td>


                                <td class="th-responsiva"><a href="modificarHospitales.php?  
                                    hospital=<?php echo $mostrar['NombreHospital'] ?> &
                        direccion=<?php echo $mostrar['Direccion'] ?> &
                        telefono=<?php echo $mostrar['Telefono'] ?>">

                                        <img src="../img/icono.png" height="20px" width="20px">
                                    </a></td>

                                <td class="th-responsiva"><a href="EliminarHospitales.php?rut=<?php echo $rut; ?>" ;>
                                        <img src="../img/trash-var-flat.png" onclick="return confirmacionH()"height="20px" width="20px">
                                    </a></td>

                                    <script>
                            function confirmacionH(){
                          
                            var respuesta = confirm("¿Seguro desea inactivar el hospital <?php echo $mostrar['NombreHospital']; ?>?. Para poder activarlo nuevamente necesitará llamar a su proveedor");
                                if(respuesta==true){
                                    return true;
                                }else{
                                    return false;
                                }
                            }
                            </script>
                            </tr>
                            
                        <?php

                        }

                        ?>
                    </tbody>
                </TABLE>
            </div>


        </div>
        <!-- fin Hospitales-fin Hospitales-fin Hospitales-fin Hospitales-fin Hospitales-fin Hospitales-fin Hospitales-fin Hospitales-fin Hospitales- -->

        <!-- Registros de actividades-Registros de actividades-Registros de actividades-Registros de actividades-Registros de actividades-Registros de actividades- -->
        <div id="Registro" class="menuContent" style="display: none;">
            <div class="topnav">
                <div class="login-container">
                    <p>Registros de Actividades &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><br>
                </div>
            </div>

            <div class="reg">
                <button class="tablink" onclick="openPage('Home', this, '#79beb1')" id="defaultOpen">Hospital</button>
                <button class="tablink" onclick="openPage('News', this, '#79beb1')" >Internos</button>

                <div id="Home" class="tabcontent" style="display: block;">
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
                                while ($mostrar = mysqli_fetch_array($resultSelectDH)) {
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
                </div>

                <div id="News" class="tabcontent"  >
                    <h2>Registros de Internos</h2>
                    <!-- tabla de registros de internos -->
                    <div class="topnav">
                <div class="login-container">
                    <form action="BuscarDescInternos.php" method="post">
                        <label for="num">Interno: </label>
                        <input type="text" name="buscar" placeholder="Ingresa el nombre del interno">
                        <button type="submit" class="buscar">Buscar</button>
                    </form>
                </div>
            </div>
                    <div >
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
                                while ($mostrar = mysqli_fetch_array($resultSelectDI)) {
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
                    </div>
                </div>

            </div>
        </div>
        <!-- fin Registros de actividades-fin Registros de actividades-fin Registros de actividades-fin Registros de actividades-fin Registros de actividades-fin Registros de actividades- -->

        <!-- asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion-asignacion -->

        <div id="Asignacion" class="menuContent" style="display: none;">
            <div class="topnav">
                <div class="login-container">
                    <p>Asignación</p>
                    <button onclick="window.location.href='RegAsignacion.php'" class="titles">Nueva Asignación</button>
                </div>
            </div>

            <div class="topnav">
                <div class="login-container">
                    <form action="BuscarAsignaciones.php" method="post">
                        <label for="num">Usuario: </label>
                        <input type="text" name="buscar" placeholder="Ingresa un usuario">
                        <button type="submit" class="buscar">Buscar</button>
                    </form>

                    <form action="BuscarAsignacionesFecha.php" method="post">
                        <label for="num">Fecha: </label>
                        <input type="text" name="buscar" placeholder="Ingresa una fecha">
                        <button type="submit" class="buscar">Buscar</button>
                    </form>
                    
                </div>
            </div>
    

            <BR>
            <div style="overflow-x: auto;" id="results">

                <TABLE CLASS="TABLA-RESPONSIVA" id="tabla">

                    <thead>
                        <tr>
                            <th class="th-responsiva1">ID</th>
                            <th class="th-responsiva1">Fecha de Asignación</th>
                            <th class="th-responsiva1">Usuario</th>
                            <th class="th-responsiva1">Nombre</th>
                            <th class="th-responsiva1">Apellido</th>
                            <th class="th-responsiva1">Turno</th>
                            <th class="th-responsiva1">Area</th>
                            <th class="th-responsiva1"></th>
                            <th class="th-responsiva1"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($mostrar = mysqli_fetch_array($resultSelectAsignacion)) {
                        ?>
                            <tr>

                                <td class="th-responsiva"><?php echo $mostrar['idAsignacion'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['FechaAsign'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['Usuario'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['Nombres'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['A_Paterno'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['Descripcion'] ?></td>
                                <td class="th-responsiva"><?php echo $mostrar['Areas'] ?></td>

                                <td class="th-responsiva"><a href="modificarAsignacion.php?  
                        asignacion=<?php echo $mostrar['idAsignacion'] ?> &
                        fecha=<?php echo $mostrar['FechaAsign'] ?> &
                        usuario=<?php echo $mostrar['Usuario'] ?> &
                        turno=<?php echo $mostrar['Descripcion'] ?> &
                        area=<?php echo $mostrar['Areas'] ?>">

                                        <img src="../img/icono.png" height="20px" width="20px">
                                    </a></td>

                                <td class="th-responsiva"><a href="EliminarAsignacion.php?
                        asignacion=<?php echo $mostrar['idAsignacion'] ?>">
                        
                                        <img src="../img/trash-var-flat.png" onclick="return confirmacion()" height="20px" width="20px">
                                    </a></td>
                            </tr>

                         <script>
                            function confirmacion(){
                            var respuesta = confirm("¿Seguro deseas eliminar la asignación ?. Una ves eliminada la asignación no podrá recuperarse.");
                                if(respuesta==true){
                                    return true;
                                }else{
                                    return false;
                                }
                            }
                            </script>
                        <?php

                        }

                        ?>
                    </tbody>
                </TABLE>
            </div>
        </div>
        <!--  fin asignacion-fin asignacion-fin asignacion-fin asignacion-fin asignacion-fin asignacion-fin asignacion-fin asignacion-fin asignacion-fin asignacion-fin asignacion-fin asignacion-fin asignacion- -->

    </div>


</body>

</html>

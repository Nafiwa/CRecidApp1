<?php

include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

/*Buscar por la matricula*/
$buscarA = $_POST['buscar'];

$sqlBuscar = "SELECT Usuario, Contrasena, Nombres, A_Paterno, A_Materno, Tipo FROM usuarios,tipousuario WHERE usuarios.idTUsuario = tipousuario.idTUsuario AND Activo=1 AND Usuario LIKE '$buscarA' '%'";
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
                            if (mysqli_num_rows($resultBuscar)>0){
                            while ($mostrar = mysqli_fetch_array($resultBuscar)) {
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

    </div>
    </div>
</body>

</html>
<?php

include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

/*Buscar por la matricula*/
$buscarA = $_POST['buscar'];

$sqlBuscar = "SELECT idAsignacion, FechaAsign, usuarios.Usuario, Nombres, A_Paterno, Descripcion, Areas FROM asignacion,turnos,areas,usuarios WHERE asignacion.idTurnos = turnos.idTurnos AND asignacion.idAreas = areas.idAreas AND asignacion.Usuario = usuarios.Usuario AND usuarios.Usuario LIKE '$buscarA' '%'";
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
                    <p>Asignación</p>
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
                        <label for="num">Usuario: </label>
                        <input type="text" name="buscar" placeholder="Ingresa un usuario">
                        <button type="submit" class="buscar">Buscar</button>
                    </form>
                </div>
            </div>

            <BR>
            <div style="overflow-x: auto;">

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
     if (mysqli_num_rows($resultBuscar)>0){
    while ($mostrar = mysqli_fetch_array($resultBuscar)) {
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
        var respuesta = confirm("¿Seguro deseas eliminar la asignación?. Una ves eliminada la asignación no podrá recuperarse.");
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
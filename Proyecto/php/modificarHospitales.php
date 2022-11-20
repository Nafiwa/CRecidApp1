<?php
include_once("conexion.php");
$con=mysqli_connect('localhost','root','','crecid');

error_reporting(0);
        $hospital = $_GET["hospital"];
        $direccion = $_GET["direccion"];
        $telefono = $_GET["telefono"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>


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
            <img src="../img/logoCrecid.png"/>
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
 
    

        <BR>
            <div class="regitrarH">>

            <div class="title"> ACTUALIZAR HOSPITAL </div><br> <br>

            <div><?php echo isset($alert) ? $alert : ''; ?></div>
     
            <div class="formu"> 
        <form action="ModHosp.php" method="post">

                    <label for="hospital" >Nombre: &nbsp;&nbsp;&nbsp;</label>
                    <input  type="text" id="hospital" name="hospital" value="<?=$hospital?>"><br><br>
                    
                    <label for="direccion">Dirección:&nbsp; </label>
                    <input type="text" id="direccion" name="direccion" value="<?=$direccion?>"><br><br>
                    
                    <label for="telefono">Telefono: &nbsp;</label>
                    <input type="text" id="telefono" maxlength="10" name="telefono" value="<?=$telefono?>"><br><br>
                    
                    
                    <button type="submit" value="Enviar" id="btnEnviar" name="btnEnviar" onclick="validaForma()">Actualizar</button>
                    <td><a href="index.php">Cancelar</a></td>
            
                    
                </form>        
            </div>
            </div>
           
        </div>
</body>

</html>
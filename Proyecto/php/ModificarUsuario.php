<?php
include_once("conexion.php");
$con=mysqli_connect('localhost','root','','crecid');

error_reporting(0);
$usuariotipo = $_GET["id"];
$usuario = $_GET["usuario"];
$contrasena = $_GET["contrasena"];
$nombre = $_GET["nombre"];
$apellidoP = $_GET["apellidoP"];
$apellidoM = $_GET["apellidoM"];



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
        <div class="regitrarH">
            <div class="title"><h1>Usuarios</h1></div>
            <div class="sub"><h4>Actualizar un nuevo Usuario</h4></div>
            

            <div class="formu">
            <form action="ModU.php" id="frmAutentica" name="frmAutentica" method="post">
                    <label for="usuario" >
                        Usuario: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input  type="text" id="usuario" name="usuario" value="<?=$usuario?>">
                    <br><br>
                    <label for="contrasena" >
                        Contraseña: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input type="password" id="contrasena" name="contrasena" value="<?=$contrasena?>">
                    <br><br>
                    <label for="nombre" >
                        Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input  type="text" id="nombre" name="nombre" value="<?=$nombre?>"><br><br>

                    <label for="apellidoP" >Apellido Paterno: &nbsp;</label>
                    <input  type="text" id="apellidoP" name="apellidoP" value="<?=$apellidoP?>">
                    <br><br>
                    <label for="apellidoM">Apellido Materno: </label>
                    <input type="text" id="apellidoM" name="apellidoM" value="<?=$apellidoM?>">
                    <br><br>
                    
                    <label for="id">Tipo de Usuario: &nbsp;&nbsp;</label>
                    <select name="id" >
                    <option value="<?php echo $usuariotipo;?>"selected> <?php echo $usuariotipo;?></option>  
                        <?php 
                        $v= mysqli_query($con, "SELECT * FROM tipousuario ");
                        while($tipoUsu= mysqli_fetch_row($v)){
                            ?>
                        <option value="<?php echo $tipoUsu[0] ?>"><?php echo $tipoUsu[1] ?></option>
                        <?php } ?>
                    </select><br><br><br><br>


                    <button type="submit" value="Enviar" id="btnEnviar" name="btnEnviar" onclick="validaForma()">Actualizar</button>
                    <td><a href="index.php">Cancelar</a></td>   
                    <tr class=blanco height="60px">
			<td colspan="2">
				<font color="red">
					<div id="msgError"></div>
				</font>
			</td>
	</tr>
                </form>

            </div>


        </div>
        </div>
</body>

</html>
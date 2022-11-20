<?php
include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

error_reporting(0);
$id = $_GET["id"];
$usuario = $_GET["usuario"];

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
        <iv class="body">
            <div class="topnav">
                <div class="login-container">
                    <p>Usuarios</p>
                </div>
            </div>


            <div class="formu">
                <form action="QueryInsertTU.php" id="frmAutentica" name="frmAutentica" method="post">
                    <label for="usuario">
                        Tipo de Usuario: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input type="text"  onkeypress="return SoloLetras(event);" id="usuario" name="usuario" placeholder="Ingresa un tipo de usuario">
                    <br><br>
                    <button type="submit" value="Enviar" id="btnEnviar" name="btnEnviar" onclick="validaForma()" class="titles">Enviar</button>
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




            <script type="text/javascript" src="../javaScript/jquery.js"></script>
            <script type="text/javascript" src="../javaScript/jquery.validate.min.js"></script>
            <script type="text/javascript">

                function SoloLetras(e)
                {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toString();
                letras = " ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";

                especiales = [8,13];
                tecla_especial = false
                for(var i in especiales) {
                if(key == especiales[i]){
                tecla_especial = true;
                break;
                }
                }

                if(letras.indexOf(tecla) == -1 && !tecla_especial)
                {
                alert("Ingresar solo letras");
                return false;
                }
                }

                function validaForma() {
                    $("#frmAutentica").validate({
                        rules: {

                            usuario: "required"
                        },
                        messages: {
                            usuario: "Se requiere este dato."
                        },

                        submitHandler: function(frmAutentica) {
                            $.ajax({

                                url: 'QueryInsertTU.php',

                                type: 'post',

                                data: $('#frmAutentica').serialize(),

                                success: function(response) {
                                    $('#msgError').html(response);
                                }
                            });
                        }


                    });

                }
            </script>


    </div>
    </div>
</body>

</html>
<?php
include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

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

            <BR>

            <div><?php echo isset($alert) ? $alert : ''; ?></div>


                <div class="topnav">
                    <div class="login-container">
                        <p>Hospitales</p>
                    </div>
                </div>

                <div class="formu">
                    <form action="QueryInsertH.php" id="frmAutentica" name="frmAutentica" method="post">
                        <label for="hospital">Nombre: &nbsp;&nbsp;&nbsp;</label>
                        <input type="text"  onkeypress="return SoloLetras(event);" id="hospital" name="hospital" placeholder="Ingresa un hospital"><br><br>
                        <label for="direccion">Dirección:&nbsp; </label>
                        <input type="text" minlength="4" id="direccion" name="direccion" placeholder="Ingresa su dirección"><br><br>
                        <label for="telefono">Telefono: &nbsp;</label>
                        <input type="text" onkeypress="return SoloNumeros(event);" maxlength="10" id="telefono" name="telefono" placeholder="(844)000-0000"><br><br>
                        <button type="submit" value="Enviar" id="btnEnviar" name="btnEnviar" onclick="validaForma()" class="titles">Enviar</button>
                        <td><a href="index.php">Cancelar</a></td>
                        <br><br>
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
        <script type="text/javascript" src="../javaScript/jquery.js"></script>
        <script type="text/javascript" src="../javaScript/jquery.validate.min.js"></script>
        <script type="text/javascript">

             /*funcion para que solo acepte letras el input*/ 
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

                 /*funcion para que solo acepte numeros el input*/ 
                function SoloNumeros(evt)
                {
                if(window.event){
                keynum = evt.keyCode;
                }
                else{
                keynum = evt.which;
                }

                if((keynum > 47 && keynum < 58) || keynum == 8 || keynum== 13)
                {
                return true;
                }
                else
                {
                alert("Ingresar solo numeros");
                return false;
                }
                }


            function validaForma() {
                $("#frmAutentica").validate({
                    rules: {
                        hospital: "required",
                        direccion: "required",
                        telefono: "required"
                    },
                    messages: {
                        hospital: " <br> Se quiere este dato.",
                        direccion: "Se requiere este dato.",
                        telefono: "Se requiere este dato."
                    },

                    submitHandler: function(frmAutentica) {
                        $.ajax({

                            url: 'QueryInsertH.php',

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
</body>

</html>
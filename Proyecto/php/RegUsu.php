<?php
include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

error_reporting(0);
$usuario = $_GET["usuario"];
$contrasena = $_GET["contrasena"];
$nombre = $_GET["nombre"];
$apellidoP = $_GET["apellidoP"];
$apellidoM = $_GET["apellidoM"];
$tipo = $_GET["tipo"];
$estatus = $_GET["estatus"];
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                </div>
            </div>
            <div class="formu">
                <form action="QueryInsertU.php" id="frmAutentica" name="frmAutentica" method="post">
                    <label for="usuario">
                        Usuario: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input type="text" onkeypress="return SoloNumeros(event);" maxlength="8" id="usuario" name="usuario" placeholder="Ingresar matricula">
                    <br><br>
                    <label for="contrasena">
                        Contraseña: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input type="password" name="contrasena" placeholder="Password..." id="password">
                    <i id="visibilitybtn"><span id="icon" class="material-symbols-outlined">visibility</span></i>
                    <!-- <input type="password" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña"> -->
                    <br><br>
                    <div class="col">

                        <!-- checkbox que nos permite activar o desactivar la opcion -->
                        <!-- <div style="margin-top:15px;">
                            <input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña" />
                        </div> -->
                    </div>
                    <br>
                    <label for="nombre">
                        Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input type="text"  onkeypress="return SoloLetras(event);" id="nombre" name="nombre" placeholder="Ingresa tu nombre"><br><br>
                    <label for="apellidoP">Apellido Paterno: &nbsp;</label>
                    <input type="text"  onkeypress="return SoloLetras(event);" id="apellidoP" name="apellidoP" placeholder="Ingresa tu 1er apellido">
                    <br><br>
                    <label for="apellidoM">Apellido Materno: </label>
                    <input type="text"  onkeypress="return SoloLetras(event);" id="apellidoM" name="apellidoM" placeholder="Ingresa tu 2do apellido">
                    <br><br>
                    <label for="tipoU">Tipo de Usuario:</label>
                    <select name="tipoU" id="" require>
                        <option value="">Tipo de Usuario: &nbsp;&nbsp;</option>
                        <?php
                        $v = mysqli_query($con, "SELECT * FROM tipousuario ");
                        while ($tipoUsu = mysqli_fetch_row($v)) {
                        ?>
                            <option value="<?php echo $tipoUsu[0] ?>"><?php echo $tipoUsu[1] ?></option>
                        <?php } ?>
                    </select><br><br>
                    <button class="env" type="submit" value="Enviar" id="btnEnviar" name="btnEnviar" onclick="validaForma()">Enviar</button>
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

                /*funcion para que muestre la contraseña al ingresarla*/ 
            const visibilitybtn = document.getElementById("visibilitybtn")
            visibilitybtn.addEventListener("click", toggleVisibility)

            function toggleVisibility() {
                const passwordInput = document.getElementById("password")
                const icon = document.getElementById("icon")
                if (passwordInput.type === "password") {
                    passwordInput.type = "text",
                    icon.innerText = "visibility_off"
                } else {
                    passwordInput.type = "password",
                    icon.innerText = "visibility"
                }
            }

                /*funcion para que solo valide que todos los campos sean llenados obligatoriamente*/ 
            function validaForma() {
                $("#frmAutentica").validate({
                    rules: {
                        usuario: "required",
                        contrasena: "required",
                        apellidoP: "required",
                        apellidoM: "required",
                        estatus: "required"
                    },
                    messages: {
                        usuario: " <br> Se quiere este dato.",
                        contrasena: "Se requiere este dato.",
                        apellidoP: "Se requiere este dato.",
                        apellidoM: "Se requiere este dato.",
                        estatus: "Se requiere este dato."
                    },

                    submitHandler: function(frmAutentica) {
                        $.ajax({

                            url: 'QueryInsertU.php',

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
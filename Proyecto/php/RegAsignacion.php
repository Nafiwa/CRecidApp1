<?php
include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');

error_reporting(0);
$fecha = $_GET["fecha"];
$usuario = $_GET["usuario"];
$hospital = $_GET["hospital"];
$turno = $_GET["turno"];
$area = $_GET["area"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" &amp;gt;>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
                        <p>Asignaciones</p>
                    </div>
                </div>

            <div class="formu">
                <form action="QueryInsertAsignacion.php" id="frmAutentica" name="frmAutentica" method="post">
                    <label for="fecha">Fecha de Asignación:&nbsp; </label><br>
                    <input type="date" id="fecha" name="fecha" value="2022-11-02" min="2022-01-01"><br><br>

                    
                    <label for="usuario">Asignar a Usuario: &nbsp;</label><br>
                    <input type="text" name="usuario" id="usuario"> <br><br>

                        <div>
                     Nombre : <span id="selected_option"></span>
                     </div><br><br>

                    <label for="hospital">Hospital: &nbsp;</label><br>
                    <select name="hospital" id="" require>
                        <option value="">Elegir Hospital: &nbsp;&nbsp;</option>
                        <?php
                        $v = mysqli_query($con, "SELECT * FROM hospital ");
                        while ($TipoHospital = mysqli_fetch_row($v)) {
                        ?>
                            <option value="<?php echo $TipoHospital[0] ?>"><?php echo $TipoHospital[0] ?></option>
                        <?php } ?>
                    </select><br><br>

                    <label for="turno">Turnos: &nbsp;</label><br>
                    <select name="turno" id="" require>
                        <option value="">Elegir Turno: &nbsp;&nbsp;</option>
                        <?php
                        $v = mysqli_query($con, "SELECT * FROM turnos ");
                        while ($TipoTurno = mysqli_fetch_row($v)) {
                        ?>
                            <option value="<?php echo $TipoTurno[0] ?>"><?php echo $TipoTurno[1] ?></option>
                        <?php } ?>
                    </select><br><br>

                    <label for="area">Area: &nbsp;</label><br>
                    <select name="area" id="" require>
                        <option value="">Elegir Area: &nbsp;&nbsp;</option>
                        <?php
                        $v = mysqli_query($con, "SELECT * FROM areas ");
                        while ($TipoArea = mysqli_fetch_row($v)) {
                        ?>
                            <option value="<?php echo $TipoArea[0] ?>"><?php echo $TipoArea[1] ?></option>
                        <?php } ?>
                    </select><br><br>
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


    </div>
    <script type="text/javascript" src="../javaScript/jquery.js"></script>
    <script type="text/javascript" src="../javaScript/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.27/jquery.autocomplete.min.js"></script>
    <script type="text/javascript">
        
        $(document).ready(function(){
        var arrayReturn = [];
       $.ajax({
        url: "http://localhost/CRecidApp2/Proyecto/php/autocompletado.php",
        async: true,
        dataType: 'json',
        success: function (data){
            for(var i=0, len = data.length; i < len; i++){
                var usuario= (data[i].Usuario).toString();
                arrayReturn.push({'value' : data[i].Nombres, 'data' : usuario});
            }
            console.log(arrayReturn);
            loadSuggestions(arrayReturn);
            
        }
       });

       function loadSuggestions(options){
            $('#usuario').autocomplete({
                lookup: options,
                onSelect: function (suggestion){
                    $('#selected_option').html(suggestion.value);
                }
            });
       }
    });
        function validaForma() {
            $("#frmAutentica").validate({
                rules: {
                    fecha: "required",
                    usuario: "required",
                    hospital: "required",
                    turno: "required",
                    area: "required"
                },
                messages: {
                    asignacion: " <br> Se quiere este dato.",
                    fecha: "Se requiere este dato.",
                    usuario: "Se requiere este dato.",
                    hospital: "Se requiere este dato.",
                    turno: "Se requiere este dato.",
                    area: "Se requiere este dato."
                },

                submitHandler: function(frmAutentica) {
                    $.ajax({

                        url: 'QueryInsertAsignacion.php',

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
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
            <a href="#Internos">
            <img src="../img/logoCrecid.png"/>
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
 
        <BR>
            <div style="overflow-x: auto;">

            <div><?php echo isset($alert) ? $alert : ''; ?></div>
        <div style="overflow-x: auto;">
        
        <div class="regitrarH">
            <div class="title"><h1>Hospitales</h1></div><br><br>
            <div class="sub"><h4>Añadir un nuevo hospital</h4></div> <br><br>
           
            <div class="formu">
            <form action="QueryInsertH.php" id="frmAutentica" name="frmAutentica" method="post">
                    <label for="hospital" >Nombre: &nbsp;&nbsp;&nbsp;</label><br>
                    <input  type="text" id="hospital" name="hospital" placeholder="Hospital General..."><br>
                    <label for="direccion">Dirección:&nbsp; </label><br>
                    <input type="text" id="direccion" name="direccion" placeholder="Avenida . . . "><br>
                    <label for="telefono">Telefono: &nbsp;</label><br>
                    <input type="text" id="telefono" name="telefono" placeholder="(844)000-0000"><br><br>
                    <input type="submit" value="Enviar" id="btnEnviar" name="btnEnviar" onclick="validaForma()"><br>
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
        
            </div>
           
        </div>
        <script type="text/javascript" src="../javaScript/jquery.js"></script>
<script type="text/javascript" src="../javaScript/jquery.validate.min.js"></script>
<script type="text/javascript">

function validaForma(){
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
				
					data:$('#frmAutentica').serialize(),
			
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
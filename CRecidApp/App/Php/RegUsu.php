<?php

$con=mysqli_connect('localhost','root','','crecid');
include_once("conexion.php");


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <script type="text/javascript" src="../javaScript/javascript.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet" />
        <title>C•Recid</title>
    </head>
    <body>
        <div class="regitrarH">
            <div class="title"><h1>Usuarios</h1></div>
            <div class="sub"><h4>Añadir un nuevo Usuario</h4></div>
            

            <div class="formu">
            <form action="QueryInsertU.php" id="frmAutentica" name="frmAutentica" method="post">
                    <label for="usuario" >
                        Usuario: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input  type="text" id="usuario" name="usuario" placeholder="Ingresar matricula">
                    <br><br>
                    <label for="contrasena" >
                        Contraseña: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input type="password" id="Contrasena" name="contrasena" placeholder="********">
                    <br><br>
                    <label for="nombre" >
                        Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input  type="text" id="nombre" name="nombre" placeholder="Sofia"><br><br>
                    <label for="apellidoP" >Apellido Paterno: &nbsp;</label>
                    <input  type="text" id="apellidoP" name="apellidoP" placeholder="Garcia">
                    <br><br>
                    <label for="apellidoM">Apellido Materno: </label>
                    <input type="text" id="apellidoM" name="apellidoM" placeholder="Flores">
                    <br><br>
                    <label for="tipoU">Tipo de Usuario: &nbsp;&nbsp;</label>
                    <select name="tipoU" id="" require>
                        <option value="">Tipo de Usuario: &nbsp;&nbsp;</option>
                        <?php 
                        $v= mysqli_query($con, "SELECT * FROM tipousuario ");
                        while($tipoUsu= mysqli_fetch_row($v)){
                            ?>
                            <option value="<?php echo $tipoUsu[0] ?>"><?php echo $tipoUsu[1] ?></option>
                        <?php } ?>
                    </select><br><br>
                    <label for="estatus">
                        Estatus: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <input type="text" id="estatus" name="estatus" placeholder="Activo"><br><br>
                    <br>
                    <button type="submit" value="Enviar" id="btnEnviar" name="btnEnviar" onclick="validaForma()">enviar</button>
                
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

function validaForma(){
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
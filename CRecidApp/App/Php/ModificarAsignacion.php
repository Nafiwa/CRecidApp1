<?php
include_once("conexion.php");
$con=mysqli_connect('localhost','root','','crecid');

error_reporting(0);
        $fecha = $_GET["fecha"];
        $usuario = $_GET["usuario"];
        $hospital_obtener = $_GET["hospital"];
        $turno = $_GET["turno"];
        $area = $_GET["area"];
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
            <div class="title"><h1>Asignaciones y Turnos</h1></div><br><br>
            <div class="sub"><h4>Añadir Asignación</h4></div> <br><br>
           
            <div class="formu">
            <form action="ModAsign.php" method="post">
                    <label for="fecha">Fecha de Asignación:&nbsp; </label><br>
                    <input type="date" id="fecha" name="fecha" value="2022-11-02" min="2022-01-01" ><br>
                    <label for="usuario">Usuario: &nbsp;</label><br>
                    <input type="text" id="usuario" name="usuario" placeholder="matricula.." value="<?=$usuario?>"><br><br>
                    
                    <label for="hospital">Hospital: &nbsp;</label><br>
                    <select name="hospital" >
                    <?php 
                        $v= mysqli_query($con, "SELECT * FROM hospital ");
                        while($TipoHospital= mysqli_fetch_row($v)){
                           $id_hospital = $TipoHospital[0];
                            $hospital= $TipoHospital[3];
                            if($hospital == $hospital_obtener){
                               ?> <option value="<?php echo $id_hospital?>" selected> <?php echo $hospital;?></option>
                           <?php }
                            ?>
                    <option value="<?php echo $TipoHospital[0] ?>"><?php echo $TipoHospital[0] ?></option>
                    <?php } ?>
                    </select><br><br>
                  
                    <label for="turno">Turnos: &nbsp;</label><br>
                    <select name="turno" id="" require>
                    <option value="<?=$turno?>">Elegir Turno: &nbsp;&nbsp;</option>
                    <?php 
                        $v= mysqli_query($con, "SELECT * FROM turnos ");
                        while($TipoTurno= mysqli_fetch_row($v)){
                            ?>
                    <option value="<?php echo $TipoTurno[0] ?>"><?php echo $TipoTurno[1] ?></option>
                    <?php } ?>
                    </select><br><br>

                    <label for="area">Area: &nbsp;</label><br>
                    <select name="area" id="" require>
                    <option value="<?=$area?>">Elegir Area: &nbsp;&nbsp;</option>
                    <?php 
                        $v= mysqli_query($con, "SELECT * FROM areas ");
                        while($TipoArea= mysqli_fetch_row($v)){
                            ?>
                    <option value="<?php echo $TipoArea[0] ?>"><?php echo $TipoArea[1] ?></option>
                    <?php } ?>
                    </select><br><br>

                    <input type="submit" value="Actualizar">
                    <td><a href="index.php">Cancelar</a></td>
		
                </form>

            </div>


        </div>

        </div>
        
            </div>
        
        </div>
    
</body>

</html>
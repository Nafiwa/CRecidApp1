<?php

include_once("conexion.php");
$con = mysqli_connect('localhost', 'root', '', 'crecid');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Css/style.css" type="text/css" />
    <script type="text/javascript" src="../javaScript/javascript.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>C•Recid</title>
</head>

<body class="background">
    <div class="main">
        <div class="login">
            <img src="../img/logoCrecid.png">
            <br><br><br>
            <form action="validarLogin.php" id="frmAutentica" name="frmAutentica" method="POST">
                <label for="Usuario">Usuario:</label><br>
                <input type="text" id="Usuario" name="Usuario" placeholder="19051131"><br>
                <label for="Contrasena">Contraseña:</label><br>
                <input type="password" id="Contrasena" name="Contrasena" placeholder="*********"><br><br>
                <div> <?php echo isset($alert) ? $alert : '' ?> </div>
                <button type="submit" id="Ingresar">Ingresar</button>
            </form>
        </div> 
        <div>
            <!-- Container for the image gallery -->
            <div class="container">

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <!-- Full-width images with number text -->
                <div class="mySlides" style="display: block;">
                    <img src="../img/img.jpg" style="width:90%">
                </div>

                <div class="mySlides">
                    <img src="../img/img1.jpg" style="width:90%">
                </div>

                <div class="mySlides">
                    <img src="../img/img3.jpg" style="width:90%">
                </div>

                <div class="mySlides">
                    <img src="../img/img.jpg" style="width:90%">
                </div>

                <div class="mySlides">
                    <img src="../img/img1.jpg" style="width:90%">
                </div>

                <div class="mySlides">
                    <img src="../img/img3.jpg" style="width:90%">
                </div>

                <!-- Thumbnail images -->
                <div class="row">
                    <div class="column">
                        <img class="demo cursor" src="../img/img.jpg" style="width:92%" onclick="currentSlide(1)" alt="">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../img/img1.jpg" style="width:92%" onclick="currentSlide(2)" alt="">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../img/img3.jpg" style="width:92%" onclick="currentSlide(3)" alt="">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../img/img.jpg" style="width:92%" onclick="currentSlide(4)" alt="">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../img/img1.jpg" style="width:92%" onclick="currentSlide(5)" alt="">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="../img/img3.jpg" style="width:92%" onclick="currentSlide(6)" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../javaScript/jquery.js"></script>
    <script type="text/javascript" src="../javaScript/jquery.validate.min.js"></script>
    <script type="text/javascript">
        function validaForma() {
            $("#frmAutentica").validate({
                rules: {
                    Usuario: "required",
                    Contrasena: "required"

                },
                messages: {
                    Usuario: " <br> Se quiere este dato.",
                    Contrasena: "Se requiere este dato.",

                },

                submitHandler: function(frmAutentica) {
                    $.ajax({

                        url: 'validarLogin.php',

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
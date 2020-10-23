<?php
session_start();
if(isset($_SESSION["usuario"])){
    if($_SESSION["perfil"]=="usuario"){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Pagina de Usuario</title>
        <style>
            .slider{
                height: 350px;
                background:#777;
            }
            body {
                background:#242323;
            }
            .col-12 col-sm-6 col-md-4 {
                background:red;
            }
            .adminmensaje {
                color:#ff1900;
            }
        </style>
        </head>
        <body>
        <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <h4 class="adminmensaje">Bienvenido <?php echo $_SESSION["usuario"]?></h4>
            </div>
            <div class="col-12 col-sm-6 col-md-8 bg-warning">
                <p>Menú de navegación</p>
            </div>
        </div>
        <div class="row slider align-items-center justify-content-center">
            <div class="col-8 bg-success">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque dolorem eos inventore doloribus itaque dolore quasi id labore,
                     sapiente eligendi rem voluptate, quibusdam cumque est? Animi aliquid officiis placeat illo.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 bg-success">
                <h3>Título 1</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum pariatur consectetur laboriosam facere quia laudantium maxime harum, odio,
                     quos fugiat quam eius tenetur repellat a doloremque velit? Esse, minus impedit!</p>
            </div>
            <div class="col-12 col-sm-6 col-md-4 bg-info">
                <h3>Título 2</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum pariatur consectetur laboriosam facere quia laudantium maxime harum, odio,
                     quos fugiat quam eius tenetur repellat a doloremque velit? Esse, minus impedit!</p>
            </div>
            <div class="col-12 col-md-4 bg-success">
                <h3>Título 3</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum pariatur consectetur laboriosam facere quia laudantium maxime harum, odio,
                     quos fugiat quam eius tenetur repellat a doloremque velit? Esse, minus impedit!</p>
            </div>
        </div>
        
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    } else {
        ?>
        <script lang="JavaScript">
                    window.location.href="formulario.html";
                </script>
        <?php
    }
    session_destroy();
}
?>
<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();

if(isset($_SESSION["usuario"])){
    if($_SESSION["perfil"]=="admin"){
        ?>
        <!DOCTYPE html>
        <html>
        <head>

        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

        <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Pagina de Admin</title>
        <style>
            img {
                width:300px;
                height:200px;
            }
            .slider{
                height: 350px;
                background:#777;
            }
            body {
                background:white;
            }
            .col-12 col-sm-6 col-md-4 {
                background:red;
            }
            .adminmensaje {
                color:red;
            }
            #cajacookies {
                box-shadow: 0px 0px 5px 5px #808080;
                background-color: white;
                color: black;
                padding: 10px;
                margin-left: -15px;
                margin-right: -15px;
                margin-bottom: 0px;
                position: fixed;
                top: 0px;
                width: 100%;
            }

            #cajacookies button {
                color: black;
            }
        </style>
        </head>
        <body>

        <?php
            $cookie_name = "user";
            $cookie_value = "John Doe";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        ?>

        <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <h4 class="adminmensaje">Bienvenido <?php echo $_SESSION["perfil"]?></h4>
            </div>
            <div class="col-12 col-sm-6 col-md-8 bg-warning">
                <p>Menú de navegación</p>
                <a href="registro.php"><p>Dar de alta un usuario </p></a>
                <a href="consultaUsuarios.php"><p>Consultar usuarios</p></a>
                <a href="formularioBorrar.php"><p>Borrar</p></a>
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
                <p><img src="<?php echo $_SESSION["foto"]?>"></p>
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
                    window.location.href="index.php";
                </script>
        <?php
    }
}
?>
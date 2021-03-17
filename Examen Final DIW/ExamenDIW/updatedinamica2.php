<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["perfil"] == "admin") {
?>
        <!DOCTYPE html>
        <html>
        <meta http-equiv="Refresh" content="5;url=sesionAdmin.php">

        <head>


            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAru1Nod25l7JxIguUfBK3rhpd1vPf0xxI&callback=initMap&libraries=&v=weekly" defer></script>

            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

            <title>Pagina de Admin</title>
            <style>
                #map {
                    height: 100%;
                    height: 500px;
                }

                .slider {
                    height: 350px;
                    background: #777;
                }

                body {
                    background: white;
                    height: 100%;
                }

                .col-12 col-sm-6 col-md-4 {
                    background: red;
                }

                .adminmensaje {
                    color: red;
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
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand text-danger"><b>Bienvenido <?php echo $_SESSION["perfil"] ?></b></a>
                    <a class="navbar-brand text-white" href="sesionAdmin.php">Inicio</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="paginaciones.php">Paginación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="paginaciones.php">Paginación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="seleccionmultiple.php">Selección múltiple</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="wheredinamica.php">Where dinamica</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="update.php">Update dinamico</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="cerrarSesion.php">Cerrar sesion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <?php

                include('conexiones.php');

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //Buscar para comprobar si se repite en la base de datos

                $parametro = array();
                $urlvalida = true;

                $sql = "UPDATE articulos";

                //Recojo los datos del formulario con los datos a editar

                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                }

                $sqlConsulta = "SELECT * FROM articulos WHERE id='$id'";
                $result = $conn->query($sqlConsulta);
                $row = $result->fetch_assoc();

                if (isset($_POST['categoria'])) {
                    $categoria = $_POST['categoria'];

                    if ($categoria != $row["categoria"] && $categoria != "") {
                        $parametro[] = 'categoria ="' . $categoria . '"';
                    }
                }
                echo $categoria;

                if (isset($_POST['precio'])) {
                    $precio = $_POST['precio'];

                    if ($precio != $row["precio"] && $precio != "") {
                        $parametro[] = 'precio ="' . $precio . '"';
                    }
                }
                if (isset($_POST['peso'])) {
                    $peso = $_POST['peso'];

                    if ($peso != $row["peso"] && $peso != "") {
                        $parametro[] = 'peso ="' . $peso . '"';
                    }
                }
                if (isset($_POST['descripcion'])) {
                    $descripcion = $_POST['descripcion'];

                    if ($descripcion != $row["descripcion"] && $descripcion != "") {
                        $parametro[] = 'descripcion ="' . $descripcion . '"';
                    }
                }
                if (isset($_POST['url'])) {
                    $url = $_POST['url'];

                    if ($url != $row["url"] && $url != "") {
                        $parametro[] = 'url ="' . $url . '"';
                        if (!filter_var($url, FILTER_VALIDATE_URL)) {
                            $urlvalida = false;
                        }
                    }
                }



                if ($urlvalida) {
                    if (count($parametro) > 0) {
                        $sql .= ' SET ' . implode(' , ', $parametro) . " WHERE id='" . $id . "';";
                        $result = mysqli_query($conn, $sql);
                ?>
                        <div class="alert alert-success text-center mt-5" role="alert">
                            <b>Update realizada con éxito : <?= $sql ?></b>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger text-center mt-5" role="alert">
                            <b>No se ha actualizado ningún registro porque son iguales</b>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                        <div class="alert alert-warning text-center mt-5" role="alert">
                            <b>El correo no tiene un formato válido></b>
                        </div>
                    <?php
                }

                ?>


            </div>
            <!-- Selección múltiple -->
            <!-- Footer -->
            <footer class="bg-dark p-4 text-center text-white mt-5 fixed-bottom">
                <b>Proyecto DIW Ismael</b>
                <img src="" style="width: 5%;" class="img-fluid">
            </footer>
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
            window.location.href = "formulario.html";
        </script>
<?php
    }
}
?>
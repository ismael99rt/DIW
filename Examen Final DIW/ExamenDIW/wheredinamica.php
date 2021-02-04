<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["perfil"] == "admin") {
?>
        <!DOCTYPE html>
        <html>

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
            <form action="seleccionlike.php" method="post" class="mt-5">
                        <b>Filtrar por nombre: </b><input type="text" name="nombre">
                        <input type="submit" class="btn btn-success">
                    </form>
                <div class="row">

                    <?php
                    /* API: AIzaSyB7r1_X2TWJgmKunPNWcB4SAgu8TakAN3Y */
                    //Habilitar cookies
                    $cookie_name = "user";
                    $cookie_value = "John Doe";
                    //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                    ?>

                    <?php

                    include('conexiones.php');

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    //define total number of results you want per page  
                    $resultadoPorPaginas = 9;

                    //find the total number of results stored in the database  
                    $query = "select  * from productos";
                    $result = mysqli_query($conn, $query);
                    $totalResultados = mysqli_num_rows($result);

                    //determine the total number of pages available  
                    $numeroPaginas = ceil($totalResultados / $resultadoPorPaginas);

                    //determine which page number visitor is currently on  
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    //determine the sql LIMIT starting number for the results on the displaying page  
                    $primeraPagina = ($page - 1) * $resultadoPorPaginas;

                    //retrieve the selected results from database   
                    $query = "SELECT * FROM productos";
                    $result = mysqli_query($conn, $query);

                    //$checked_contador = count($_POST['tenis']); //Variable contador

                    //display the retrieved result on the webpage  
                    ?>

                    

                    <!-- Selección múltiple -->
                    <form action="selecciondinamica.php" method="post" class="mt-5">
                        <h3 class="text-success"><b>Filtrar por Productos</b></h3>
                       Raquetas:<input type="checkbox" name="idCategoria1" value="Raquetas"><br>
                        Pelotas:<input type="checkbox" name="idCategoria2" value="Pelotas"><br>
                        Equipaje:<input type="checkbox" name="idCategoria3" value="Equipajes"><br>
                        <hr>
                        <h3 class="text-success"><b>Precio</b></h3>
                        > 30 euros:<input type="radio" name="precio" value="30" checked><br>
                        > 60 euros:<input type="radio" name="precio" value="60"><br>
                        > 90 euros <input type="radio" name="precio" value="90"><br>
                        > 100 euros<input type="radio" name="precio" value="100"><br>
                        <hr>
                        <input type="submit">
                    </form>
                </div>
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
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

                if (count($_POST) > 0) {

                    if (isset($_POST['iduser'])) {
                        $id = $_POST['iduser'];
                    }
                }

                //echo $id;

                //find the total number of results stored in the database  
                $query = "select  * from articulos WHERE id=" . $id;
                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                ?>

                        <h1 class="mt-5 text-success">Editar articulo</h1>
                        <hr>
                        <form class="mt-5 col-md-6" action="updatedinamica2.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"><b>Categoria</b></label>
                                <select name="categoria">
                                    <option value=""><?= $row['categoria'] ?></option>
                                    <option value="Raquetas">Raquetas</option>
                                    <option value="Pelotas">Pelotas</option>
                                    <option value="Equipajes">Equipajes</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Nombre</b></label>
                                <div class="col-sm-10">
                                    <input type="email" name="nombre" class="form-control" id="nombre" placeholder="<?= $row["nombre"] ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"><b>Nombre fabricante</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombre_fabricante" class="form-control" id="nombre_fabricante" placeholder="<?= $row["nombre_fabricante"] ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"><b>Precio</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="precio" class="form-control" id="precio" placeholder="<?= $row["precio"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"><b>Peso</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="peso" class="form-control" id="peso" placeholder="<?= $row["peso"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"><b>Descripcion</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="<?= $row["descripcion"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"><b>URL</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="url" class="form-control" id="url" placeholder="<?= $row["url"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"><b>Fecha</b></label>
                                <div class="col-sm-10">
                                    <input type="text" name="fecha" class="form-control" id="fecha" placeholder="<?= $row["fecha"] ?>" disabled>
                                </div>
                            </div>
                            <hr>
                            <input type="submit" name="enviar" class="btn btn-success" value="Modificar usuario">
                        </form>

                <?php
                    }
                }
                ?>


            </div>
            <!-- Selección múltiple -->
            <!-- Footer -->
            <footer class="bg-dark p-4 text-center text-white mt-5">
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
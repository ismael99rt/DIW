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
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAru1Nod25l7JxIguUfBK3rhpd1vPf0xxI&callback=initMap&libraries=&v=weekly"
            defer
        ></script>

        <script>
            let map;
            function initMap() {
                const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: { lat: 36.854817396509915, lng: -6.039870001845592 },
                
            });
                marker = new google.maps.Marker({
                map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: { lat: 36.854817396509915, lng: -6.039870001845592 },
            });
                marker.addListener("click", toggleBounce);
            }

            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
                } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }
        </script>

        <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Pagina de Admin</title>
        <style>
        
            #map {
                height: 100%;
                height:500px;
            }
            .slider{
                height: 350px;
                background:#777;
            }
            body {
                background:white;
                height:100%;
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
        /* API: AIzaSyB7r1_X2TWJgmKunPNWcB4SAgu8TakAN3Y */
            //Habilitar cookies
            $cookie_name = "user";
            $cookie_value = "John Doe";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        ?>

        <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <h4 class="adminmensaje">Bienvenido <?php echo $_SESSION["perfil"]?></h4>
                <p style="color:black">Haz clic en el boton para activar tu ubicacion</p>
                <button onclick="getLocation()">Geolocalizacion</button>
                <p id="demo" style="color:black">Prueba</p>
                <script>
                    var x = document.getElementById("demo");

                    function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else { 
                        x.innerHTML = "Geolocation no esta soportado para tu navegador.";
                    }
                    }

                    function showPosition(position) {
                    x.innerHTML = "Latitude: " + position.coords.latitude + 
                    "<br>Longitude: " + position.coords.longitude;
                    }
                </script>
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
            <!-- GOOGLE MAPS -->
            <div class="col-12 col-md-4 bg-success container mb-5" style="width:200px">
                <h3>Google Maps</h3>
                 <div id="map"></div>
            </div>
        </div> 
        <!-- Footer -->
        <footer class="bg-danger p-4 text-center text-white mt-5">
            <b>Proyecto DIW Ismael</b>
            <img src="" style="width: 5%;" class="img-fluid">
        </footer>
        <!-- Footer -->   
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAru1Nod25l7JxIguUfBK3rhpd1vPf0xxI&callback=initMap&libraries=&v=weekly"
            defer
        ></script>
    <style>
        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <?php

    $servername = "localhost";
    $username = "oukqmvok_diw";
    $password = "Trebujena2020";
    $dbname = "oukqmvok_diw";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tabladiw";
    $result = $conn->query($sql);

    ?>
    <script lang="javascript">
        function initMap() {

            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 37.38415925429511,
                    lng: -5.970674109536306
                },
                zoom: 8,
            });

            <?php while ($row = $result->fetch_assoc()) { ?> 

                coords = {
                    lat: <?= $row["altitud"] ?>,
                    lng: <?= $row["longitud"] ?>
                }; // coordenadas

                var icon = { 
                    url: "img/<?= $row["foto"]?>", 
                    scaledSize: new google.maps.Size(50, 50), 
                    origin: new google.maps.Point(0, 0), 

                };

                new google.maps.Marker({ 
                    position: coords,
                    map,
                    icon: icon,
                    title: "Estoy aquí",
                });
            <?php } ?> 
        }
    </script>
    <div id="map"></div>
</body>

</html>
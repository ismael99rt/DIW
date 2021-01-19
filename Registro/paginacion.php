<html>

<head>
    <title> Pagination </title>
</head>

<body>

    <?php

    //database connection  
    
            // Create connection
            $conn = new mysqli("localhost", "root", "", "practicasesiones");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

    //define total number of results you want per page  
    $resultadoPorPaginas = 10;

    //find the total number of results stored in the database  
    $query = "select  nombreProducto from productos";
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
    $query = "SELECT nombreProducto FROM productos LIMIT " . $primeraPagina . ',' . $resultadoPorPaginas;
    $result = mysqli_query($conn, $query);

    //display the retrieved result on the webpage  
    while ($row = mysqli_fetch_array($result)) {
        echo $row['nombreProducto'] . '</br>';
    }


    //display the link of the pages in URL  
    for ($page = 1; $page <= $numeroPaginas; $page++) {
        echo '<a href = "paginacion.php?page=' . $page . '">' . $page . ' </a>';
    }

    ?>
</body>

</html>
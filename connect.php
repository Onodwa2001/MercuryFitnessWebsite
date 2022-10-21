<?php

    $conn = mysqli_connect('localhost', 'mercury_fitness', 'mercuryheat', 'mercury_fitness');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }


?>

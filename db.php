<?php
    // Polącznie się z MySQL. (MariaDB)
    // serwer, user, password, nazwabazydanych
    $con = mysqli_connect("localhost", "phpchatter_admin", "phpchatter_admin", "control_of_expenses");

    // test połączenia
    if (mysqli_connect_errno()) {
        echo("Nie można połączyć się z bazą danych. " . $mysqli_connect_error());
    }
?>
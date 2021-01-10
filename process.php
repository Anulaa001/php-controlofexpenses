<?php 
include "db.php";

// Polączenie się z bazą 

// sprawdzam czy formularz jest zatwierdzony (submitted)
// zmienne ktore zostały przekazane przez metode post
if (isset($_POST["submitBtn"]))
    // proba wyciągnięcia z tego posta - imie, komunikat
    //mysqli_real_escape_string - sprawdza, czy nie ma dziwnego (znaki specjalne, kod js) tekstu i ewentualnie go wycina
    $title = mysqli_real_escape_string($con, $_POST["title"]);
    $description = mysqli_real_escape_string($con, $_POST["description"]);
    $amount = mysqli_real_escape_string($con,$_POST["amount"]);
    $category = mysqli_real_escape_string($con,$_POST["category"]);

    // czas
    date_default_timezone_set("Europe/Warsaw");
    $czas = new DateTime('NOW');
    $czas_String = $czas->format('Y-m-d H:i:s');


    // walidacja danych
    if ((!isset($title) || $title == "") || (!isset($amount) || $amount == "") || (!isset($category) || $category == "")) {
        header("Location: index.php?errorvalidation=".urlencode($error));
        exit();
    }else{
        // wszystko w porządku
        $query = "INSERT INTO list (title, description, amount, category, data) VALUES ('$title', '$description', '$amount', '$category', '$czas_String')";

        // jesli nie nie uda
        if (!mysqli_query($con, $query)) {
            // przerwanie aplikacji
            die("Błąd: ".mysqli_error($con));
            header("Location: index.php?error=".urlencode($error));
            exit();
        }else{
            // jesli sie uda
            // przeskakuje do index.php
            header("Location: index.php");
            exit();
        }
    }
?>
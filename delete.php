<?php 
include "db.php";

// Polączenie się z bazą 

// sprawdzam czy formularz jest zatwierdzony (submitted)
// zmienne ktore zostały przekazane przez metode post
$a = trim($_GET['a']); 
$index = trim($_GET['index']); 
 
if($a == 'del' and !empty($index)) { 
 
    /* usuwamy rekord */ 
    $query = "DELETE FROM list WHERE id ='$index'";
    
 
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
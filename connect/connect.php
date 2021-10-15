<?php 
    $host = "localhost";
    $user = "chobs98";
    $pass = "infinite98!";
    $db = "chobs98";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if( mysqli_connect_errno() ){
        echo "Database Connect False";
    } else {
        //echo "Database Connect True";
    }
?>
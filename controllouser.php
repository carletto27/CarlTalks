<?php

if(isset($_GET["username"])){
    
    $conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());
    $username = mysqli_real_escape_string($conn, $_GET["username"]);
    $query = "SELECT * FROM utenti WHERE nomeutente = '".$username."'";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){
        echo 1;

    }else {
        echo 0;
        
    }
    
    mysqli_close($conn);

}
?>
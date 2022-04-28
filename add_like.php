<?php

  
    session_start();
    
    if(!isset($_SESSION['username']))
    {
       
        header("Location: login.php");
        exit;
    }

    


$id1 = $_GET['id'];
$username1 = $_SESSION['username'];





$conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());

$id = mysqli_real_escape_string($conn, $id1);
$username = mysqli_real_escape_string($conn, $username1);

mysqli_query($conn, "INSERT INTO mipiace(id,utente_like) VALUES(\"$id\", \"$username\")");





$ris = "ok fatto";
echo json_encode($id);








?>

<?php

    session_start();
   
    if(!isset($_SESSION['username']))
    {
        
        header("Location: login.php");
        exit;
    }

    


$conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());
$utente_segue = mysqli_real_escape_string($conn, $_SESSION['username']);

$query = "SELECT utente_seguito FROM follower WHERE  utente_segue = '".$utente_segue."' and utente_seguito = '".$utente_segue."'       ";
$res = mysqli_query($conn, $query);


while($row= mysqli_fetch_assoc($res)) {
    $ris[]=$row;
}

mysqli_close($conn);


echo json_encode($ris);

?>
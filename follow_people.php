<?php

    
    session_start();
    
    if(!isset($_SESSION['username']))
    {
        
        header("Location: login.php");
        exit;
    }


$utente_seguito1 = $_GET["username"];

$utente_segue1 = $_SESSION['username'];
$conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());

$utente_seguito = mysqli_real_escape_string($conn, $utente_seguito1);
$utente_segue = mysqli_real_escape_string($conn, $utente_segue1);


$query = "SELECT * FROM follower WHERE utente_seguito = '".$utente_seguito."' AND utente_segue = '".$utente_segue."'";
$res = mysqli_query($conn, $query);



if($utente_segue === $utente_seguito){
$ris = "Non puoi seguire te stesso";
}
else if($utente_segue !== $utente_seguito){
    
    if(mysqli_num_rows($res) > 0)
    {
        $ris="Utente già seguito";
    }else{
       
    mysqli_query($conn, "INSERT INTO follower(utente_seguito, utente_segue) VALUES(\"$utente_seguito\", \"$utente_segue\" )");
    $ris = $utente_seguito;
   
    }
}

mysqli_close($conn);

echo $ris;


?>

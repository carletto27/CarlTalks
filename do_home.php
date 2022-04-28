<?php

 
    session_start();
    
    if(!isset($_SESSION['username']))
    {
       
        header("Location: login.php");
        exit;
    }

   
$utente1 = $_SESSION['username'];



$conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());

$utente = mysqli_real_escape_string($conn, $utente1);

   
    mysqli_query($conn, "INSERT INTO follower(utente_seguito, utente_segue) VALUES(\"$utente\", \"$utente\")");
  
  
    $query = "SELECT * FROM follower,post WHERE follower.utente_seguito = post.username and follower.utente_segue = '".$utente."' order by data DESC,ora DESC";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){  
    while($row= mysqli_fetch_assoc($res)) {
       
        $ris[]=$row;
    }
    
}else {
    $ris= "Nessun risultato";
}
   

echo json_encode($ris);







?>
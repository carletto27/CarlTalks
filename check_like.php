<?php

  
    session_start();
   
    if(!isset($_SESSION['username']))
    {
       
        header("Location: login.php");
        exit;
    }

    


    
    $conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);


    $query = "SELECT id FROM mipiace WHERE utente_like = '".$username."'";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0){   
    
        while($row= mysqli_fetch_assoc($res)) {
            $ris[]=$row;
        }
 }else{
  
 $ris = "nessun risultato trovato";
 }



mysqli_close($conn);
echo json_encode($ris);




?>

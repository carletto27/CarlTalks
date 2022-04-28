<?php

    
    session_start();
    
    if(!isset($_SESSION['username']))
    {
        
        header("Location: login.php");
        exit;
    }

    
    $idd1 = $_GET['id'];


    $conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());

    $idd = mysqli_real_escape_string($conn, $idd1);


    $res = mysqli_query ($conn, "select utente_like from mipiace where id='".$idd."'" );
         if(mysqli_num_rows($res) > 0){  
             while($row= mysqli_fetch_assoc($res)) {
             $ris[]=$row;
         }
         }else {
         $ris = "0 like";
     }
    


     mysqli_close($conn);
     echo json_encode ($ris);





    ?>
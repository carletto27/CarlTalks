<?php

    
    session_start();
    
    if(!isset($_SESSION['username']))
    {
        
        header("Location: login.php");
        exit;
    }


 $id1 = $_GET["idd"];
 


 $conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());

 $id = mysqli_real_escape_string($conn, $id1);



$query="select count(id) from mipiace where id='".$id."'";
$res = mysqli_query($conn, $query);


while($row= mysqli_fetch_row($res)) {
    $ris[]=$row;
}

echo json_encode($ris);


    ?>
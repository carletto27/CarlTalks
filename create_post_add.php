<?php

   
    session_start();
  
    if(!isset($_SESSION['username']))
    {
      
        header("Location: login.php");
        exit;
    }

?>

<?php
  
  $conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());
  
  $passa = mysqli_real_escape_string($conn, $_GET["passa"]);
  $testo = mysqli_real_escape_string($conn, $_GET["testo"]);
  $username = mysqli_real_escape_string($conn, $_SESSION["username"]);
 
$data = date("Y-m-d");
$ora = date("H:i:s");

$query =  "SELECT * FROM post";
$res = mysqli_query($conn, $query);
$num_post = mysqli_num_rows($res)+1;

  
    mysqli_query($conn, "INSERT INTO post(id,data,ora,img,testo,username) VALUES(\"$num_post\",\"$data\",\"$ora\", \"$passa\", \"$testo\" , \"$username\")");
    mysqli_close($conn);

  
?>

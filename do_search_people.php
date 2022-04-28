<?php

    
    session_start();
    
    if(!isset($_SESSION['username']))
    {
        
        header("Location: login.php");
        exit;
    }



$ricerca=$_GET["testo"];
$tipo=$_GET["tipo"];
$conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());

$ricerca1 = mysqli_real_escape_string($conn, $_GET["testo"]);


if($tipo == "nome"){
    $query = "SELECT nome,cognome,nomeutente,immagineprofilo FROM utenti WHERE nome = '".$ricerca1."'";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res) > 0){   
       while($row= mysqli_fetch_assoc($res)) {
           $ris[]=$row;
       }
}else

$ris = "errore";
}
else if($tipo == "cognome"){
    $query = "SELECT nome,cognome,nomeutente,immagineprofilo FROM utenti WHERE cognome = '".$ricerca1."'";
    $res = mysqli_query($conn, $query);  
    if(mysqli_num_rows($res) > 0){
     
        while($row= mysqli_fetch_assoc($res)) {
            $ris[]=$row;
        }
        }else{
            $ris = "errore";
        }
     
}else {
$res = "ciao2";
$query = "SELECT nome,cognome,nomeutente,immagineprofilo FROM utenti WHERE nomeutente = '".$ricerca1."'";
$res = mysqli_query($conn, $query);
if(mysqli_num_rows($res) > 0){
    while($row= mysqli_fetch_assoc($res)) {
        $ris[]=$row;
    }
    }else{
        $ris = "errore";
    }

}
mysqli_close($conn);


echo json_encode($ris);

    ?>
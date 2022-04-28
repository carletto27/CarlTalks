<?php

    
    session_start();
   
    if(!isset($_SESSION['username']))
    {
      
        header("Location: login.php");
        exit;
    }

    $var1 = "immagini";
    $cerca = $_GET["cerca"];
   
    $api = '563492ad6f91700001000001a21fa766c1f440298be449e4304d7b21';
  
    $stringa = urlencode($cerca);


    if($_GET["servizio"]===$var1) {   
        
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, "https://api.pexels.com/v1/search?query=".$stringa."&per_page=20&page=1");
        
        $headers = array("Authorization: Bearer ".$api);
        
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result= curl_exec($curl);
        curl_close($curl); 
      
    }else {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://www.breakingbadapi.com/api/characters?name=".$stringa);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result= curl_exec($curl);
        curl_close($curl);   
               
    }

  echo $result;




?>


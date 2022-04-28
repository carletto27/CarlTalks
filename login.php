<?php

    
    session_start();
   
    if(isset($_SESSION["username"]))
    {
        
        header("Location: home.php");
        exit;
    }
     
     if(isset($_POST["username"]) && isset($_POST["password"]))
     {
        
        $conn = mysqli_connect("151.97.9.184", "lentini_calogero", "6819463881", "lentini_calogero") or die(mysqli_connect_error());
         
         $username = mysqli_real_escape_string($conn, $_POST["username"]);
         $password = mysqli_real_escape_string($conn, $_POST["password"]);
         
         $query = "SELECT * FROM utenti WHERE nomeutente = '".$username."' AND password = '".$password."'";
         $res = mysqli_query($conn, $query);
         mysqli_close($conn);
         
         if(mysqli_num_rows($res) > 0)
         {
           
             $_SESSION["username"] = $_POST["username"];
             
             header("Location: home.php");
             exit;
         }
         else
         {
             
             $errore = true;
         }
     }

    ?>


<html>
    <head>
        <link rel='stylesheet' href='login.css'>
        <script src='login.js' defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>CarlTalks: Accedi</title> 
    </head>
    <body>
<h1>CarlTalks</h1>
        <?php
            
            if(isset($errore))
            {
                
                echo "<p class='errore'>";
                echo "Credenziali non valide.";
                echo "</p>";
            }
        ?>

        <main>
            <form name='login_form' method='post'>
                <p>
                    <label> Username <input type='text' name='username'></label>
                </p>
                <p>
                    <label>Password <input type='password' name='password'></label>
                </p>
                <p>
                    <label>&nbsp;<input type='submit' value = "Accedi"></label>
                </p>
            </form>           
        </main>
        <p>Non sei ancora registrato? <a href='signup.php'> Registrati </p>
    </body>
</html>












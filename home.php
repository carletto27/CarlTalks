<?php

    
    session_start();
   
    if(!isset($_SESSION['username']))
    {
       
        header("Location: login.php");
        exit;
    }

?>


<html>

    <head>
    <script src='home.js' defer></script>
    <link rel="stylesheet" href="home.css">
    <meta charset="utf-8">
    <title>CarlTalks: Home</title> 
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>


    <body>
    <header>
      <nav>
       <span id=social> CarlTalks </span>
       
     
       <div id="orie">
          <a href='home.php'>Home</a>
          <a href='create_post.php' >Nuovo post</a>
          <a href='search_people.php'>Ricerca utenti</a>
          <a href='logout.php'>Logout</a>



          
</div>


      </nav>
    </header>


    

<section id="post">

</section>

<section id="modal-view" class="hidden">  
</section>


        
    </body>
</html>
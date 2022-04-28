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
       <meta charset="utf-8">
         <title>CarlTalks: crea post</title>
        <link rel='stylesheet' href='create_post.css'>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap" rel="stylesheet">
        <script src='create_post.js' defer></script>
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

       
        <main>
            <form name='search_form' method='post'>
                <p>
                    <label>Cerca il contenuto multimediale per il tuo post: <input type='text' name='cerca'></label>
                </p>
                <p>
                    Seleziona il tipo di servio che vuoi utilizzare:
                    <select name='servizio'>
                    <option value='immagini'>Immagini(ricerca in inglese)</option>
                    <option value='breakingbad'>Breaking Bad(nome personaggio) </option>
                </p>
                <p>
                    <label>&nbsp;<input type='submit' value = 'Cerca'></label>
</p>
            </form>           
        </main>


        <section id="album-view">
    </section>

<section>  
    <section id="modal-view" class="hidden">   
<form name = 'nomeform' method='post' class='hidden'>
<label> Inserisci il testo : <input type='text' name='testo'> </label>
<label> &nbsp; <input type='submit' value='Crea post'> </label>
</form>
    </section>

    <section id="album-view">
    </section>

<section>  
    <section id="modal-view" class="hidden">   
<form name = 'nomeform' method='post' class='hidden'>
<label> Inserisci il testo : <input type='text' name='testo'> </label>
<label> &nbsp; <input type='submit' value='Crea post'> </label>
</form>
    </section>



    </body>
</html>



      
  
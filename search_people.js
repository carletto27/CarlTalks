function ricerca(event){
    let arr=[];

    
    const testo = event.currentTarget.testo.value;
    const tipo = event.currentTarget.tipo.value;
    

    function onJson(json) {  
        
       let err = json;
      
       let stringa = "errore";



if (err === stringa){
    const library = document.querySelector('#post');
    
    library.innerHTML = '';
    
    const caption3 = document.createElement('div');
    caption3.classList.add('errore');
    caption3.textContent = "Nessun risultato";
    library.appendChild(caption3);   
}else{   
    
    console.log(json);
    
        const library = document.querySelector('#post');
       
        library.innerHTML = '';
        const results = json;
        
        arr = json;
        
        for(let i=0; i<results.length; i++){
       
           const album_data = results[i]
           const nome = album_data.nome;
           const cognome = album_data.cognome;
           const image = album_data.immagineprofilo;
           const username = album_data.nomeutente;
           
           const album = document.createElement('div');
           
           album.classList.add('album');
            
            const img = document.createElement('img');
            img.src = image;
      
        const caption = document.createElement('div');
        const caption2 = document.createElement('div');
        caption.textContent = nome + " " + cognome + " "; 
        caption2.textContent = username;
        
        const bottone1 = document.createElement('button');
        bottone1.textContent ="segui";
      
        album.appendChild(img);
        album.appendChild(caption);
        album.appendChild(caption2);
        album.appendChild(bottone1); 
        
        library.appendChild(album);
        
        bottone1.addEventListener('click', follow);

 

function onJson6(json){

    console.log(username);
    console.log(json[0].utente_seguito);
   
    if(json[0].utente_seguito === username){
        bottone1.classList.add('hidden');
    }
}

function onResponse6(response) {
    return response.json();
  }


fetch("http://151.97.9.184/lentini_calogero/hw1/controlloseguiti2.php?").then(onResponse6).then(onJson6); 




function onJson4(json){
  

for(let i=0; i<json.length;i++){
    if(json[i].utente_seguito === username){
        bottone1.textContent = "Segui già";
    }
}


}


function onResponse5(response) {
    return response.json();
  }


fetch("http://151.97.9.184/lentini_calogero/hw1/controlloseguiti.php?").then(onResponse5).then(onJson4); 




        }
    }
    }
    

    function onResponse(response) {
        return response.json();
      }
    
    
   
    fetch("http://151.97.9.184/lentini_calogero/hw1/do_search_people.php?testo=" + testo + "&tipo="+tipo).then(onResponse).then(onJson); 



event.preventDefault();
}


function tutti(event){

    function onJson1(json) {
        console.log(json);
        const library = document.querySelector('#post');
        library.innerHTML = '';
        const results = json;
        for(let i=0; i<results.length; i++){
         
           const album_data = results[i]
           const nome = album_data.nome;
           const cognome = album_data.cognome;
           const image = album_data.immagineprofilo;
           const username = album_data.nomeutente;
        
           const album = document.createElement('div');
           album.classList.add('album');
           
            const img = document.createElement('img');
            img.src = image;
      
        const caption = document.createElement('div');
        const caption2 = document.createElement('div');
        caption.textContent = nome + " " + cognome;
        caption2.textContent = username;
        const bottone1 = document.createElement('button');
        bottone1.textContent ="segui";

       
        album.appendChild(img);
        album.appendChild(caption);
        album.appendChild(caption2);
        album.appendChild(bottone1);
        
        
        library.appendChild(album);
        bottone1.addEventListener('click', follow);




function onJson6(json){

    console.log(username);
    console.log(json[0].utente_seguito);
    
    if(json[0].utente_seguito === username){
        bottone1.classList.add('hidden');
    }
}

function onResponse6(response) {
    return response.json();
  }


fetch("http://151.97.9.184/lentini_calogero/hw1/controlloseguiti2.php?").then(onResponse6).then(onJson6); 




function onJson4(json){
    console.log(json);
    console.log(username);
    

for(let i=0; i<json.length;i++){
    if(json[i].utente_seguito === username){
        bottone1.textContent = "Segui già";
    }
}


}

function onResponse5(response) {
    return response.json();
  }


fetch("http://151.97.9.184/lentini_calogero/hw1/controlloseguiti.php?").then(onResponse5).then(onJson4); 





    }
    
}

    function onResponse1(response) {
        return response.json();
      }


    fetch("http://151.97.9.184/lentini_calogero/hw1/do_search_people2.php?").then(onResponse1).then(onJson1); 
}


function follow(event){
 
const ciao = event.currentTarget.parentElement;

const username1 = ciao.children[2];

const username = username1.innerHTML;
const bottone = event.currentTarget;


function onText(text){
    console.log(text);

    let stringa1 = "Non puoi seguire te stesso";
    let stringa2 = "Utente già seguito";
   
    if(text === stringa1){
        alert("Non puoi seguire te stesso");
    }else if(text === stringa2){
        alert("Utente già seguito");
        bottone.textContent ="Segui già";
    }else {
        console.log(bottone);
        
        bottone.textContent ="Segui già";
    }
}

function onResponse2(response) {
    return response.text();
  }

  
fetch("http://151.97.9.184/lentini_calogero/hw1/follow_people.php?username="+username).then(onResponse2).then(onText);
}





const bottone = document.querySelector("button");

bottone.addEventListener('click', tutti);



const form = document.forms['search_people_form'];

form.addEventListener('submit', ricerca);

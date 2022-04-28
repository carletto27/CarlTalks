
const post = document.querySelector('#post');

function onJson(json) {
    console.log(json);
    let err = "Nessun risultato";
    post.innerHTML = '';
    

if(json === err){

  const album = document.createElement('div');
  album.textContent = "Nessun post trovato";
  post.appendChild(album);
  post.classList.add('errore');
}else{

for (let i=0; i<json.length; i++){  
   const album_data = json[i];
   let titolo= album_data.testo;
   let image = album_data.img;
   let data = album_data.data;
   let ora = album_data.ora;
   let username = album_data.username;
   let idd = album_data.id;

   const album = document.createElement('div');
   album.classList.add('album');
  
   const img = document.createElement('img');
   img.src = image;
   const caption = document.createElement('div');
   caption.classList.add('testo');
   const caption1 = document.createElement('div');
   caption1.classList.add('caption1');
   const caption2 = document.createElement('div');
   caption2.classList.add('caption1');
   const caption3 = document.createElement('div');
   caption3.classList.add('caption');
   const bottone = document.createElement("button");
   bottone.classList.add('bottone');
   const link = document.createElement("span");
   link.classList.add('caption2');
   const id = document.createElement("p");

   caption.textContent =titolo ;
   caption1.textContent = data;
   caption2.textContent = ora;
   caption3.textContent = username;
   bottone.textContent = "Metti like";
   id.textContent = idd;


   album.appendChild(img);
   album.appendChild(caption3);
   album.appendChild(caption);
   album.appendChild(caption1);
   album.appendChild(caption2);
   album.appendChild(bottone);
   album.appendChild(link);
   album.appendChild(id);
   post.appendChild(album);
   id.classList.add('hidden');



function onJson8(json){
  console.log(json);

for(let i=0; i<json.length; i++){
 
if(idd === json[i].id) {
  console.log(json[i].id);
  console.log(idd);
  console.log("esiste");
  bottone.textContent="like già inserito";
}
}


}

function onResponse8(response) {
  return response.json();
}



fetch("http://151.97.9.184/lentini_calogero/hw1/check_like.php").then(onResponse8).then(onJson8);




   function onJson5(json){
     
     let num = json[0];
    
    link.textContent= "Piace a " + num + " persone";
   }


   function onResponse5(response) {
    return response.json();
  }

 
   fetch("http://151.97.9.184/lentini_calogero/hw1/search_num_like.php?idd="+idd).then(onResponse5).then(onJson5);

   
   link.addEventListener('click',trova_like);
   
   bottone.addEventListener('click', aggiungi_like);

}
}
}


function onResponse2(response) {
    return response.json();
  }


fetch("http://151.97.9.184/lentini_calogero/hw1/do_home.php").then(onResponse2).then(onJson);



function aggiungi_like(event){

  window.location.reload();
  
  console.log("aggiungo like");

  const padre = event.currentTarget.parentElement;
  const padre1 = event.currentTarget;

  const id1 = padre.children[7];

  const id = id1.innerHTML;
  console.log(id);

  function onJson1(json) {
    console.log(json);
 
  }

  function onResponse1(response) {
    return response.json();
  }


  fetch("http://151.97.9.184/lentini_calogero/hw1/add_like.php?id="+ id).then(onResponse1).then(onJson1);

}


function trova_like(event){
  console.log("trovo like");

  const padre2 = event.currentTarget.parentElement;

  const id3 = padre2.children[7];
 
  const id = id3.innerHTML;
  console.log(id);
    
  function onJson7(json){
    console.log(json);
    const h1= document.createElement('h1');
    h1.textContent = "Piace a...";
   
    
    let err = "0 like";

    if(json === err){
      const div = document.createElement('div');
      const did = document.createElement('div');
      did.textContent = "Nessun like inserito";
      div.appendChild(did);
      modalView.appendChild(div);
      document.body.classList.add('no-scroll');
      modalView.style.top = window.pageYOffset + 'px';
      modalView.classList.remove('hidden');
    }else{
      modalView.appendChild(h1);
      h1.classList.add('piace');
    for(let i=0; i<json.length; i++){
  
      const info = json[i];
      let username = info.utente_like;
  
      const div = document.createElement('div');
      const did = document.createElement('div');
   
      did.textContent = username;    
  
      
      div.appendChild(did);
      
     
      
      modalView.appendChild(div);
     
      document.body.classList.add('no-scroll');
      modalView.style.top = window.pageYOffset + 'px';
      modalView.classList.remove('hidden');
      
    }
  }
   
  }
  

  function onResponse7(response) {
    return response.json();
  }

  fetch("http://151.97.9.184/lentini_calogero/hw1/nomi_like.php?id="+ id).then(onResponse7).then(onJson7);
}

function onModalClick(event){
 
  document.body.classList.remove('no-scroll');
  modalView.classList.add('hidden');
  modalView.innerHTML = '';
}


const modalView = document.querySelector('#modal-view');

     modalView.addEventListener('click',onModalClick);

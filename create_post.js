let passa;


function ricerca(event){
let cerca = form.cerca.value;
let servizio = form.servizio.value;


function onJson(json) {
  console.log(json);

  if (json.length === 0  || json.total_results === 0){
    const library = document.querySelector('#album-view');
    library.innerHTML = '';
    const caption3 = document.createElement('div');
    caption3.classList.add('errore');
    caption3.textContent = "Nessun risultato";
    library.appendChild(caption3);   
}else{
if(servizio == "immagini") {
  const library = document.querySelector('#album-view');

  library.innerHTML = '';
  const results = json.photos;
  let num_results = results.length;
  if(num_results > 10)
  num_results = 10;
  for(let i=0; i<num_results; i++){
     const album_data = results[i];
     const images = album_data.src.large;
      const img = document.createElement('img');
      img.src = images;
  library.appendChild(img);
  }
}else{
  const library = document.querySelector('#album-view');
  library.innerHTML = '';
  const results = json;
  let num_results = results.length;
  for(let i=0; i<num_results; i++){
     const album_data = results[i]
     const images = album_data.img;
      const img = document.createElement('img');
      img.src = images;
  library.appendChild(img);
  }
  
}
}
const boxes = document.querySelectorAll('#album-view img');
for (const box of boxes){
box.addEventListener('click', checked);
}
}

function onResponse(response) {
    return response.json();
  }

    fetch("http://151.97.9.184/lentini_calogero/hw1/do_search_content.php?cerca=" + cerca + "&servizio=" + servizio).then(onResponse).then(onJson);
event.preventDefault();
}


function checked(event){
  const div = document.createElement('div');
  const image = document.createElement('img');
  image.src = event.currentTarget.src;
  passa = event.currentTarget.src;
  let ilform=document.createElement('form');
  ilform=formModal;
  formModal.classList.remove('hidden');
  div.appendChild(ilform);
  div.appendChild(image);
  document.body.classList.add('no-scroll');
  modalView.style.top = window.pageYOffset + 'px';
  modalView.appendChild(div);
  modalView.classList.remove('hidden');
  const non = document.querySelector('#modal-view div');
  non.addEventListener('click',onModalClick);
}

function onModalClick() {
  if(event.currentTarget === modalView){
    console.log("clicco modale");
  document.body.classList.remove('no-scroll');
  modalView.classList.add('hidden');
  modalView.innerHTML = '';
  }else {
    console.log('hai cliccato sul div');
    event.stopPropagation();
  }
}

function creazione(event){
  let testo = event.currentTarget.testo.value;

  fetch("http://151.97.9.184/lentini_calogero/hw1/create_post_add.php?passa=" + passa + "&testo=" + testo);
  

}

const modalView = document.querySelector('#modal-view');
modalView.addEventListener('click', onModalClick);

const formModal = document.querySelector("#modal-view form");


formModal.addEventListener('submit', creazione);



const form = document.forms['search_form'];
form.addEventListener('submit', ricerca);


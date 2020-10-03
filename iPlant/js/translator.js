var english = document.getElementById('en_click'),
    shqip = document.getElementById('sq_click'),
    en_txt = document.querySelectorAll('.en'),
    sq_txt = document.querySelectorAll('.sq'),
    nb_en = en_txt.length,
    nb_sq = sq_txt.length;

english.addEventListener('click', function() {
    langue(english,shqip);
}, false);

shqip.addEventListener('click', function() {
    langue(shqip,english);
}, false);

function langue(langueOn,langueOff){
    if (!langueOn.classList.contains('current_lang')) {
        langueOn.classList.toggle('current_lang');
        langueOff.classList.toggle('current_lang');
    }
    if(langueOn.innerHTML == '<img src="img/en.png" width="25px" height="20px">'){
        afficher(en_txt, nb_en);
        cacher(sq_txt, nb_sq);
    }
    else if(langueOn.innerHTML == '<img src="img/sq.png" width="25px" height="16px">'){
        afficher(sq_txt, nb_sq);
        cacher(en_txt, nb_en);
    }
}

function afficher(txt,nb){
    txt.forEach(el => {
        el.style.display = "block"
    })
}
function cacher(txt,nb){
    txt.forEach(el => {
        el.style.display = "none"
    })
}
function init(){
    langue(english,shqip);
}
init();
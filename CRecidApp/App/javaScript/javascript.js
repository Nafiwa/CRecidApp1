function tabs(evt, menu) {
    sessionStorage.setItem('showTab',menu);
    var i, menuContent, tablinks;
    menuContent = document.getElementsByClassName("menuContent");
    for (i = 0; i < menuContent.length; i++) {
    menuContent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(menu).style.display = "block";
    evt.currentTarget.className += " active";
}

function newInt() {
    let form = prompt();
    if (form != null) {
        document.getElementById(aInterno).innerHTML = prompt("Interno registrado");
    }
}

let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}

function Usuario() {
    var myWindow = window.open("../Php/RegUsu.php","myWindow", "top=150px,left=250,width=500,height=650,toolbar=false,scrollbars=false,resizable=false");
}
function Tipo() {
    var myWindow = window.open("../Php/Tipo.php","myWindow", "top=150px,left=250,width=500,height=650,toolbar=false,scrollbars=false,resizable=false");
}
function Hospital() {
    var myWindow = window.open("../Php/RegHosp.php","myWindow", "top=150px,left=250,width=530,height=430,toolbar=false,scrollbars=false,resizable=false");
    
}

function pagLoad(){
    var menu = sessionStorage.getItem('showTab');
    if(menu != null){
        tabs("evento",menu);
    }
}

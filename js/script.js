// ---------------------------------** nav menu **------------------------------------
const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.navMenu');
    const navMenu = document.querySelectorAll('.navMenu li');

    //toggle nav
    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');
        //animate links
        navMenu.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 3s ease forwards ${index / 9 - 1 }s`;
            }
        });
        //animate close menu
        burger.classList.toggle('toggle');
    });

}
navSlide();
// -----------------------------** fin nav menu **--------------------------------
// ---------------------------** T I T L E - A N I M A T I O N **--------------------------------
const text = document.getElementById('myTitle');
const strText = text.textContent;
const splitText = strText.split("");
text.textContent = "";
console.log(text);
console.log(splitText);
for (let i = 0; i < splitText.length; i++) {
    text.innerHTML += "<span>" + splitText[i] + "</span>";
}

let char = 0;
let timer = setInterval(onTick, 50);

function onTick() {
    const span = text.querySelectorAll('span')[char];
    span.classList.add('fade');
    char++
    
    if (char == splitText.length) {
        complete();
        return;
    }
}

function complete() {
    clearInterval(timer);
    timer = null;
}
// ---------------------------** P A R A G R A P H - A N I M A T I O N **----------------------------------------
var i = 0;
var txt = "et je suis un auto-entreproneur travailler sur des projets de clients dans certaines agences numériques marocaines et des clients individuels. J'ai un ensemble diversifié de compétences, allant de la conception, au html et css, javascript et php, wordpress et prestashop.";
var speed = 50;

function typeWriter(){
    if(i < txt.length){
        document.getElementById("para").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    }
}
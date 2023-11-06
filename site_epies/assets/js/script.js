// console.log('hello');
let left = document.querySelector('.left');
// console.log(left);
let automatic = document.querySelector('.automatique i');
console.log(automatic);
let right = document.querySelector('.right');


let img = document.querySelector('.caresole');
// console.log(caresole);
let i = 7;
let j = 0;
left.addEventListener('click',reculerSlider);
function reculerSlider (){
    
    i--;
    img.setAttribute("src", "assets/img/" + i + ".jpg");
if(i == 1){

    i=7;
    
}
}

right.addEventListener('click',avanceSlider);
function avanceSlider (){
    
    j++;
    img.setAttribute("src", "assets/img/" + j + ".jpg");
if(j == 6){

    j=0;
    
}
}
////////////////////pour dashboard//////////////////////
let backoffice = document.querySelector('.backoffmenu');
let dashmenu = document.querySelector('.test');
let lii =document.querySelector('.dash li');
let aa = document.querySelector('.dash a')
backoffice.addEventListener('click',dropdowndash);
function dropdowndash (){
    dashmenu.classList.toggle('dash');
    lii.classList.toggle('dash li');
    aa.classList.toggle('dash a');
}

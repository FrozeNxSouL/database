let menu = document.querySelector('#menubut');
let set = document.querySelector('#setbut');
let sub = document.querySelector('#submenubut');

function emenu() {
    menu.style.opacity = '1';
    set.style.opacity = '0.6';
    sub.style.opacity = '0.6';
}
function eset() {
    menu.style.opacity = '0.6';
    set.style.opacity = '1';
    sub.style.opacity = '0.6';
}
function esub() {
    menu.style.opacity = '0.6';
    set.style.opacity = '0.6';
    sub.style.opacity = '1';
}
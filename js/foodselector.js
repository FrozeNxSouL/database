let burger = document.querySelector('#burger');
let set = document.querySelector('#set');
let other = document.querySelector('#other');

function cburger() {
    burger.style.display = 'block';
    set.style.display = 'none';
    other.style.display = 'none';
}
function cset() {
    burger.style.display = 'none';
    set.style.display = 'block';
    other.style.display = 'none';
}
function csub() {
    burger.style.display = 'none';
    set.style.display = 'none';
    other.style.display = 'block';
}
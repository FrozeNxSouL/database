const quantity = document.querySelector('#iquantity');
const increaseBtn = document.querySelector('#increase_cart');
const decreaseBtn = document.querySelector('#decrease_cart');

increaseBtn.addEventListener('click', ()=> {
    if (quantity.value >= 0) {
        quantity.value++;
    }
})
decreaseBtn.addEventListener('click', ()=> {
    if (quantity.value > 1) {
        quantity.value--;
    }
})
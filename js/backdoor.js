const btn = document.querySelectorAll('#edit-btn');

const food_id_input = document.querySelector('#edit_food_id');
const food_name_input = document.querySelector('#edit_food_name');
const food_picture_input = document.querySelector('#edit_food_pict');
const food_price_input = document.querySelector('#edit_food_price');

btn.forEach(element => {
    element.addEventListener('click', ()=> {
        let id = element.closest('.list-info').querySelector('h5').textContent.replace("ID ", "");
        food_id_input.setAttribute('value', '7')

        const option = food_id_input.querySelector(`option[value="${id}"]`);
        if (option) {
          option.selected = true;
        }
        
    })
});
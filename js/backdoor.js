const food_edit_form = document.querySelector('#edit-item-module');

const btn = document.querySelectorAll('#edit-btn');

const food_id_input = document.querySelector('#edit_food_id');
const food_name_input = document.querySelector('#edit_food_name');
const food_category_input = document.querySelector('#edit_food_category');
const food_picture_input = document.querySelector('#edit_food_pict');
const food_price_input = document.querySelector('#edit_food_price');

btn.forEach(element => {
    element.addEventListener('click', ()=> {
        let id = element.closest('.list-info').querySelector('h5').textContent.replace("ID ", "");
        let name = element.closest('.list-info').querySelector('h6').textContent.replace("ชื่อ ", "");
        let category = element.closest('.list-info').querySelector('h6').nextElementSibling.textContent.replace("ประเภท ", "");
        let price = element.closest('.list-info').querySelector('h6').nextElementSibling.nextElementSibling.textContent.replace("ราคา ", "").replace("฿", "");
        let picture = element.closest('.list-edit-item').querySelector('.list-img img').getAttribute('src');
        
        food_id_input.setAttribute('value', id)
        food_name_input.setAttribute('value', name)
        food_category_input.setAttribute('value', category)
        food_price_input.setAttribute('value', price)
        food_picture_input.setAttribute('value', picture)

        const cate_option = food_category_input.querySelector(`option[value="${category}"]`);
        if (cate_option) {
          cate_option.selected = true;
        }
        food_edit_form.classList.remove("hide");
    })
});

const cancel_edit = document.getElementById('cancel-edit');

cancel_edit.addEventListener('click', ()=> {
  food_edit_form.classList.add("hide");
})

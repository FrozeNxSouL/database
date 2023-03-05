// const btn = document.querySelectorAll('#order_button');

// const food_id = document.querySelector('#fid');
// const food_name = document.querySelector('#fname');
// const food_category = document.querySelector('#fcategory');
// const food_picture = document.querySelector('#fpict');
// const food_price = document.querySelector('#fprice');

// btn.forEach(element => {
//     element.addEventListener('click', ()=> {
//         var id = element.closest('.form-submit').querySelector('#fid').val();
//         var name = element.closest('.form-submit').querySelector('#fname').val();
//         var category = element.closest('.form-submit').querySelector('#fcategory').val();
//         var price = element.closest('.form-submit').querySelector('#fprice').val();
//         var picture = element.closest('.form-submit').querySelector('#fpict').val();
        
//         food_id_input.setAttribute('value', id)
//         food_name_input.setAttribute('value', name)
//         food_category_input.setAttribute('value', category)
//         food_price_input.setAttribute('value', price)
//         food_picture_input.setAttribute('value', picture)

//         const id_option = food_id_input.querySelector(`option[value="${id}"]`);
//         if (id_option) {
//           id_option.selected = true;
//         }
//         const cate_option = food_category_input.querySelector(`option[value="${category}"]`);
//         if (cate_option) {
//           cate_option.selected = true;
//         }
//         food_edit_form.classList.remove("hide");
//     })
// });

// $(document).ready(function(){
//     $("#orderbutton").on("click",function(){
//         var btn = document.querySelectorAll('#order_button');
//         btn.forEach(element => {
//             element.addEventListener('click', ()=> {
//                 var fid = element.closest('.form-submit').querySelector('#fid').val();
//                 var fname = element.closest('.form-submit').querySelector('#fname').val();
//                 var fcategory = element.closest('.form-submit').querySelector('#fcategory').val();
//                 var fprice = element.closest('.form-submit').querySelector('#fprice').val();
//                 var fpict = element.closest('.form-submit').querySelector('#fpict').val();

//         $.ajax({
//             url: "OurFood.php",
//             method: "post",
//             data: {'send':1,'fid':fid,'fname':fname,'fprice':fprice,'fpict':fpict,'fcategory':fcategory},
//             success:function(response){
//                 if (response == "yee") {
//                     alert(gay);
//                 }
//             }
//         });
//         })
//     });
//     });
// });
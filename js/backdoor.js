var btn = document.querySelectorAll('#edit-btn');

btn.forEach(element => {
    element.addEventListener('click', ()=> {
        let id = element.closest('.list-info').querySelector('input').getAttribute("placeholder");
        console.log(id);
    })
});
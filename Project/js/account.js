const bgSignForm = document.querySelector('#sign-opt-bg');
const signInForm = document.querySelector('#sign-in-form');
const signUpForm = document.querySelector('#sign-up-form');
const signForm = document.querySelector('#sign-form');
// const summitlogin = document.querySelector('#summitlogin');
// const summitsignin = document.querySelector('#summitsignin');
// const userpic = document.querySelector('#material-symbols-outlined')
// const check = document.getElementById("summit");
// const phone = document.querySelector('#inputphonenum');
// const warning = document.querySelector('#warning');

bgSignForm.addEventListener('click', ()=> {
    signForm.style.display = 'none';
    signInForm.style.display = 'none';
    signUpForm.style.display = 'none';
    bgSignForm.style.display = 'none';
    // userpic.style.display = 'inline-block';
    // warning.style.display = 'none';
})

function signup() {
    signInForm.style.display = 'none';
    signUpForm.style.display = 'block';
}
function signin() {
    signForm.style.display = 'block';
    signInForm.style.display = 'block';
    bgSignForm.style.display = 'block';
    signUpForm.style.display = 'none';
}

// function checking() {
    
    
// }
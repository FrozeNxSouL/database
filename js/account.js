const bgSignForm = document.querySelector('#sign-opt-bg');
const signInForm = document.querySelector('#sign-in-form');
const signUpForm = document.querySelector('#sign-up-form');
const signForm = document.querySelector('#sign-form');
const profile = document.querySelector('#profile');
// const summitlogin = document.querySelector('#summitlogin');
// const summitsignin = document.querySelector('#summitsignin');
const userpic = document.querySelector('#material-symbols-outlined');
const userpic1 = document.querySelector('#material-symbols-outlined1');
// const check = document.getElementById("summit");
// const phone = document.querySelector('#inputphonenum');
// const warning = document.querySelector('#warning');

bgSignForm.addEventListener('click', ()=> {
    signForm.style.display = 'none';
    signInForm.style.display = 'none';
    signUpForm.style.display = 'none';
    bgSignForm.style.display = 'none';
    profile.style.display = 'none';
    // userpic.style.display =  'block';
    // userpic1.style.display = 'none';
    // userpic.style.display = 'inline-block';
    // warning.style.display = 'none';
})

function signup() {
    signInForm.style.display = 'none';
    bgSignForm.style.display = 'block';
    signUpForm.style.display = 'block';
    profile.style.display = 'none';
}
function signin() {
    signForm.style.display = 'block';
    signInForm.style.display = 'block';
    bgSignForm.style.display = 'block';
    signUpForm.style.display = 'none';
    profile.style.display = 'none';
}

function login() {
    signInForm.style.display = 'none';
    signUpForm.style.display = 'none';
    profile.style.display = 'block'; 
    userpic1.style.display =  'block';
    userpic.style.display = 'none';
}

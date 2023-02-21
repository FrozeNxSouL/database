const bgSignForm = document.querySelector('#sign-opt-bg');
const signInForm = document.querySelector('#sign-in-form');
const signUpForm = document.querySelector('#sign-up-form');
const signForm = document.querySelector('#sign-form');

bgSignForm.addEventListener('click', ()=> {
    signForm.style.display = 'none';
    signInForm.style.display = 'none';
    signUpForm.style.display = 'none';
    bgSignForm.style.display = 'none';
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
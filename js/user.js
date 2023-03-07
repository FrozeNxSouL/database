const info = document.getElementById('info');
const transaction = document.getElementById('transaction');
const receipt = document.getElementById('receipt');
const warning = document.getElementById('warningbar');
const logoutbar = document.getElementById('logoutbar');


function user(page) {
    
}

function delacc() {
    warning.classList.add('warningbar-slide');
}
function exit() {
    warning.classList.remove('warningbar-slide');
}
function delconfirm() {
    window.location.href='index.php';
}
function logout() {
    logoutbar.classList.add('logoutbar-slide');
}
function logoutexit() {
    logoutbar.classList.remove('logoutbar-slide');
}



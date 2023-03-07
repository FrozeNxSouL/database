<?php 
session_start();
if (isset($_SESSION['email']) && ($_SESSION['role']==1)) {
    echo '<script>console.log("wowza");</script>';}
?>


<nav class='navbar navbar-expand-lg bg-body-tertiary'>
    <div class='container-fluid'>

        <a class='navbar-brand' href='index.php'>
            <img src='assets/logo.png' alt='icon.png' width='45vh' height='fit-content'>
        </a>

        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarSupportedContent'>

            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                    <a class='nav-link' href='OurFood.php'>Our Food</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='storelocate.php'>Store Location</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='delivery.php'>Delivery</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='user.php'>User</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='backdoor.php'>Aodmon</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='mycart.php'>Cart</a>
                </li>
            </ul>

            <a class='navbar-brand' href='#'>
                <div class='circleblock'>
                    <span class='material-symbols-outlined' style='line-height: 2rem;display: block;' id='material-symbols-outlined' onclick='signin()'>person</span>
                    <span class='material-symbols-outlined1' style='line-height: 2rem;display: none;' id='material-symbols-outlined1' onclick='login()' >person</span>
                </div>
            </a>

        </div>
    </div>
</nav>
   
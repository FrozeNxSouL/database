
<?php 
    session_start();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
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
            </ul>
                <a class='navbar-brand' href='mycart.php'>
                    
                    <span class="badge text-bg-danger" style="font-size: .6rem"><?php echo $count; ?></span>
                    <span class="material-symbols-outlined">shopping_basket</span>
                </a>
                <?php 
                        if (isset($_SESSION['email'])) {
                            echo '
                                <div class="logged-in">
                                    <a class="navbar-brand" href="user.php" style="font-size: 1rem">' . $_SESSION['email'] . '</a>
                                    <ul class="user-content">
                                        <li id="backdoor-page" class="nav-item">
                                            <a class="nav-link" href="user.php">Edit profile</a>
                                        </li>';
                            if ($_SESSION['role'] == 1) {
                                echo '<li id="backdoor-page" class="nav-item"><a class="nav-link" href="edit-user.php">Backend</a></li>';
                            }
                            echo '
                                        <li id="backdoor-page" class="nav-item">
                                            <form action="index.php" method="post">
                                                <button type="submit" name="logout" style="border:none;background-color: transparent;" class="nav-link">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>';
                        } else {
                            echo '
                                <a class="navbar-brand" href="#" onclick="signin()">
                                    <span class="material-symbols-outlined" style="line-height: 2rem" id="material-symbols-outlined">person</span>
                                </a>';
                        }
                ?>

        </div>
    </div>
</nav>
<?php 
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: index.php');
    }
?>
   
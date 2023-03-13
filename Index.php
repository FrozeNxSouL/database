<?php
session_start();
require_once('php/connect.php');
require_once('php/process.php'); 
if (isset($_POST['logout'])) {
  session_destroy();
  header('location: index.php');
}


?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <title>MC</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
</head>
<body>

      <div class="contain">
          <header id="header">
              <?php require 'php/module/navbar.php'?>
          </header>
      </div>
    <main>
        <!-- start main section -->

        <!-- start Sign in/ Sign up form -->
        <?php require('login-signin.php'); ?>

        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://d1vs91ctevllei.cloudfront.net/images/banner/th1673513523230103_MCD_mc-a-wish_Tourist-01_Web-Banner_2000x695px_Final_CO_CS6.jpg" class="d-block w-100 ads-contain" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://d1vs91ctevllei.cloudfront.net/images/banner/th1673513739230103_MCD_mc-a-wish_Tourist-02_Web-Banner_2000x695px_Final_CO_CS6.jpg" class="d-block w-100 ads-contain" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://d1vs91ctevllei.cloudfront.net/images/banner/th_responsive166196625206_Banner_web_re_motherday-set_2000x695px.jpg" class="d-block w-100 ads-contain" alt="...">
              </div>        
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        <!-- end slide -->

        <!-- start content -->
          <div class="content-header">
          <?php
            $recsql = "SELECT * FROM food_menu WHERE rec_status = 1 LIMIT 3";
            $recresult = $conn->query($recsql);
            while ($rec = mysqli_fetch_array($recresult)) {
          ?>
            <div class="promo-item">
              <div class="promo-pict">
                <img src=<?php echo $rec['food_pict']; ?> alt="">
              </div>
              <div class="promo-text">
                <p class="title"><?php echo $rec['food_name']; ?></p>
                <p class="price"><?php echo $rec['food_price']; ?></p>
              </div>
            </div>
          <?php
            }
          ?>
          </div>
        <!-- end content -->

        <!-- end main section -->
    </main>
    <?php include 'php/module/footer.html'?>
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <script src="js/logincheckfunc.js" ></script>
    <script src="js/checkfunc.js" ></script>
    <script src="js/footer.js"></script>
    <script src="js/account.js"></script>
    <script src="js/alerts.js"></script>

</body>

</html>
<?php mysqli_close($conn); ?>
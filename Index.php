<?php
session_start();
require_once('php/connect.php');
require_once('php/process.php'); 



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
    <!-- <?php
      // if (isset($_SESSION['login'])) {
    ?>
        <header id="header"></header>
        <script src="js/headerlogin.js"></script>
    <?php
      // }
      // else {
    ?>
        <header id="header"></header>
        <script src="js/header.js"></script>

      <?php  
      // } 
      ?> -->
      <div class="contain">
          <header id="header">
              <?php require 'php/module/navbar.php'?>
          </header>
      </div>
    <main>
        <!-- start main section -->

        <!-- start Sign in/ Sign up form -->
        <div class="sign-form" id="sign-form">
            <form class="row g-3 sign-up" id="sign-up-form"  method="POST">
                <h1>SIGN UP</h1>
                <div class="mb-3">
                    <label for="inputName" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="inputName" name="name">
                    <label for="inputName" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" id="inputphonenum" name="phonenum">
                </div>
                <div class="mb-3">
                    <label for="sign-up-email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="sign-up-email" name="email">
                    <label for="sign-up-pw" class="form-label">Password</label>
                    <input type="password" class="form-control" id="sign-up-pw" name="password">
                </div>
                <div class="mb-3">
                    <label for="inputCity" class="form-label">ที่อยู่</label>
                    <input type="text" class="form-control" id="inputaddress" name="address">
                </div>
                <div class="outer">
                  <div class="col">
                    <label for="sign-up-subdistrict" class="form-label">ตำบล</label>
                    <input type="text" class="form-control" id="inputsubdis" name="subdis">
                  </div>
                  <div class="col">
                    <label for="sign-up-district" class="form-label">อำเภอ</label>
                    <input type="text" class="form-control" id="inputdis" name="dis">
                  </div>
                  <div class="col">
                    <label for="sign-up-district" class="form-label">จังหวัด</label>
                    <input type="text" class="form-control" id="inputprovice" name="provice">
                  </div> 
                </div>  
                  <div class="mb-3">
                    <label for="sign-up-district" class="form-label">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" id="inputpostal" name="postal">
                  </div> 
                
                <p id="errorinput"></p>
                <button type="button" name="submit" class="btn btn-danger btn-form" id="submitsignin">Sign up</button> 
            </form>

            <form class="sign-in" id="sign-in-form" method="POST" >
                <h1>Login</h1>
                <div>
                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" name="acc" placeholder="EMAIL ACCOUNT" >
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="acc_password" placeholder="PASSWORD" >
                  </div>
                </div>
                <a href="#" id="errorinput1" class="e3"></a>
                <button type="button" name="submit" class="btn btn-danger btn-form" id="submitlogin">login</button>
                <p>No Account? <a href="#" style="color: #ffc600" onclick="signup()">SIGN UP</a></p>
            </form>
        </div>

        <div class="sign-bg" id="sign-opt-bg"></div>
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
              <img src=<?php echo $rec['food_pict']; ?> alt="">
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
            

</body>

</html>
<?php mysqli_close($conn); ?>
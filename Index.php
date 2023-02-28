<?php
session_start();
include('process.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <title>MC</title>
</head>
<body>
    <header id="header"></header>
    <script src="js/header.js"></script>
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
                <p id="errorinput"></p>
                <button type="button" name="submit" class="btn btn-danger btn-form" id="submitsignin">Sign up</button> 
            </form>

            <form class="sign-in" id="sign-in-form" method="POST">
                <h1>Login</h1>
                <div>
                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" name="acc" placeholder="EMAIL ACCOUNT">
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="acc_password" placeholder="PASSWORD">
                  </div>
                </div>
                <a href="#" id="errorinput1" class="e3"></a>
                <button type="button" name="submit" class="btn btn-danger btn-form" id="submitlogin">login</button>
                <p>No Account? <a href="#" style="color: #ffc600" onclick="signup()">SIGN UP</a></p>
            </form>

            <?php 
              require_once("acc.php");
              $row = fetchuser($db,'acc'); 
            ?>
            <div class="profile" id="profile">
              <h1>Profile</h1>
              <div class="nameblock">
                <span class="tt">NAME :</span>
                <label id="cus_name" class="cus_name"><?php echo $row['name']; ?></label><br>
              </div>
              <div class="emailblock">
                <span class="tt">EMAIL :</span>
                <label id="cus_email" class="cus_email"><?php echo $row['email']; ?></label>
              </div>
              <div class="addressblock">
                <span class="tt">ADDRESS</span>
                <label id="cus_ad" class="cus_ad"><?php echo $row['address']; ?></label><br>
                <label id="cus_subdis" class="cus_subdis"><?php echo $row['subdis']; ?></label>
                <label id="cus_dis" class="cus_dis"><?php echo $row['dis']; ?></label>
                <label id="cus_provice" class="cus_provice"><?php echo $row['provice']; ?></label>
              </div>
              <div class="otherblock">

              </div>
              <div class="buttonblock">
                <button id="adjust-button" class="adjust-button">manage_accounts</button>
                <button id="del-button" class="del-button">DELETE</button>
                <button id="logout-button" class="logout-button">Logout</button>
              </div>
            </div>

        </div>

        <div class="sign-bg" id="sign-opt-bg"></div>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://www.truemoney.com/wp-content/uploads/2021/08/truemoneywallet-mcdonalds-delivery-promotion-banner-20220215-1100X550-a.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://www.truemoney.com/wp-content/uploads/2021/05/truemoneywallet_mcdonalds-delivery-retail-pro-051_banner_19072021.jpeg" class="d-block w-100" alt="...">
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
            <div class="promo-item">
              <img src="https://d1vs91ctevllei.cloudfront.net/images/product/1673445513WOS_600x400-nambang-chic.png" alt="">
              <div class="promo-text">
                <p class="title">เบอร์เกอร์นัมบังไก่</p>
                <p class="price">109</p>
              </div>
            </div>
            <div class="promo-item">
              <img src="https://d1vs91ctevllei.cloudfront.net/images/product/1657623608WOS-600x400-alc-qpc.png" alt="">
              <div class="promo-text">
                <p class="title">ควอเตอร์ พาวน์เดอร์ วิท ชีส</p>
                <p class="price">155</p>
              </div>
            </div>
            <div class="promo-item">
              <img src="https://d1vs91ctevllei.cloudfront.net/images/product/167344732306_WOS_McFlurryKiss_600x400px.png" alt="">
              <div class="promo-text">
                <p class="title">แมคเฟลอร์รี่ คิส</p>
                <p class="price">59</p>
              </div>
            </div>
          </div>
        <!-- end content -->

        <!-- end main section -->
    </main>
    <footer id="footer">
      <div class="contain" >
        <div class="block1" >
          <h6>ABOUT US</h6>
          <span></span>
        </div>
        <div class="block1" >
          
        </div>
        <div class="block1" >

        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <script src="js/logincheckfunc.js" ></script>
    <script src="js/checkfunc.js" ></script>
    <script src="js/footer.js"></script>
    <script src="js/account.js"></script>
</body>

</html>
<?php
session_destroy();
?>
<?php
require('php/connect.php');


$sql = 'SELECT * FROM food_menu WHERE food_category = 1;';
$burgermenu = $conn->query($sql);

$sql1 = 'SELECT * FROM food_menu WHERE food_category = 2;';
$othermenu = $conn->query($sql1);


$sql2 = 'SELECT * FROM menuset;';
$menuset = $conn->query($sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/OurFood.css"> 
    <title>MC</title>  
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</head>

<body>
    <div class="contain">
        <header id="header">
            <?php require 'php/module/navbar.html'?>
        </header>
    </div>
    <div class="content-header">
        <ul class="nav-sub">
            <li><a class="nav-sublink" href="#"  onclick="cburger()">Burger</a></li>
            <li><a class="nav-sublink" href="#"  onclick="cset()">Set menu</a></li>
            <li><a class="nav-sublink" href="#"  onclick="csub()">Other menu</a></li>
        </ul>
    </div>
    <div id="message"></div>
    <div class="burgercontent" id="burger">
        <div class="menu-title">
            <h2 style="font-weight: 700">Menu</h2>
        </div>
        <div class="menu">
            <?php
            while ($row = mysqli_fetch_assoc($burgermenu)) {

                
            ?>
                <div class="ourfood-card">
                    <div class="pic-container" >
                        <?php echo '<img class="ourfood-img" src=" '.($row["food_pict"]).'">';?>
                    </div>
                    <div class="text-container">
                        <h4 class="food-name"><?php echo $row["food_name"]; ?></h4>
                    </div>
                    <p class="pricehead" >Price</p>
                    <h5>฿<?php echo number_format($row["food_price"]) ?></h5>
                    <form action="" class="form-submit">
                        <input type="hidden" class="fid" value="<?php $row["food_id"] ?>">
                        <input type="hidden" class="fname" value="<?php $row["food_name"] ?>">
                        <input type="hidden" class="fprice" value="<?php $row["food_price"] ?>">
                        <input type="hidden" class="fpict" value="<?php $row["food_pict"] ?>">
                        <input type="hidden" class="fcategory" value="<?php $row["food_category"] ?>">
                        <button class="btn btn-danger addItemBtn">Order</button>
                    </form>
                </div>
            <?php
                }
            ?>

        </div>
    </div>

    <div class="setcontent" id="set">
        <div class="menu-title">
            <h2 style="font-weight: 700">Set Menu</h2>
        </div>
        <div class="menu">
            <?php
            while ($row = mysqli_fetch_assoc($menuset)) {

            ?>
                <div class="ourfood-card">
                    <div class="pic-container" >
                        <?php echo '<img class="ourfood-img" src=" '.($row["menuset_pict"]).'">';?>
                    </div>
                    <div class="text-container">
                        <h4 class="food-name"><?php echo $row["menuset_name"]; ?></h4>
                    </div>
                    <p class="pricehead" >Price</p>
                    <h5>฿<?php echo number_format($row["menuset_price"]) ?></h5>
                    <button class="btn btn-danger">Order</button>
                </div>
            <?php
                }
            ?>

        </div>
    </div>

    <div class="submenucontent" id="other">
        <div class="menu-title">
            <h2 style="font-weight: 700">Other Menu</h2>
        </div>
        <div class="menu">
            <?php
            while ($row = mysqli_fetch_assoc($othermenu)) {

            ?>
                <div class="ourfood-card">
                    <div class="pic-container" >
                        <?php echo '<img class="ourfood-img" src=" '.($row["food_pict"]).'">';?>
                    </div>
                    <div class="text-container">
                        <h4 class="food-name"><?php echo $row["food_name"]; ?></h4>
                    </div>
                    <p class="pricehead" >Price</p>
                    <h5>฿<?php echo number_format($row["food_price"]) ?></h5>
                    <button class="btn btn-danger">Order</button>
                </div>
            <?php
                }
            ?>

        </div>
    </div>

    <script src="js/foodselector.js"></script>
    <?php require 'php/module/footer.html'?>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btn btn-danger addItemBtn").click(function(e){
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var fid = $form.find(".fid").val();
                var fname = $form.find(".fname").val();
                var fprice = $form.find(".fprice").val();
                var fpict = $form.find(".fpict").val();
                var fcategory = $form.find(".fcategory").val();

                $.ajax({
                    url: "action.php",
                    method: "post",
                    data: {fid:fid,fname:fname,fprice:fprice,fpict:fpict,fcategory:fcategory},
                    success:function(response){
                        $("message").html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php
    mysqli_close($conn);
?>

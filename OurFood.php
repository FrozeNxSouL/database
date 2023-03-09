<?php
require('php/connect.php');
session_start();

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
<?php

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['Add_To_Cart']))
        {
            if(isset($_SESSION['cart']))
            {
                $myfood=array_column($_SESSION['cart'],'food_name');
                if(in_array($_POST['food_name'],$myfood))
                {
                    ?>
                    <script>alert('food Already Added');</script>    
                    <?php header('location: OurFood.php'); ?>
<?php
                }
                else
                {
                    $count=count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('food_id'=>$_POST['food_id'],'food_name'=>$_POST['food_name'],'food_price'=>$_POST['food_price'],'food_quantity'=>1); 
                    ?>
                    <script type='text/javascript'>alert('food Added');</script>    
                    <?php header('location: OurFood.php'); ?>
<?php
                }
            }
            else
            {
                $_SESSION['cart'][0]=array('food_id'=>$_POST['food_id'],'food_name'=>$_POST['food_name'],'food_price'=>$_POST['food_price'],'food_quantity'=>1);
                ?>
                <script>alert('food Added');</script>    
                <?php header('location: OurFood.php'); ?>
<?php
            }
        }
        if(isset($_POST['Remove_Food']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    ?>
                    <script>alert('food Removed');</script>    
                    <?php header('location: OurFood.php'); ?>
<?php
                }
            }
        }
        if(isset($_POST['Mod_Quantity']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    $_SESSION['cart'][$key]['food_quantity']=$_POST['Mod_Quantity'];
                    echo"<script>
                        window.location.href='mycart.php';
                    </script>";
                }
            }
        }
    }

?>

    <div class="contain">
        <header id="header">
            <?php require 'php/module/navbar.php' ?>
        </header>
    </div>
    <div class="content-header">
        <ul class="nav-sub">
            <li><a class="nav-sublink" href="#" onclick="cburger()">Burger</a></li>
            <li><a class="nav-sublink" href="#" onclick="cset()">Set menu</a></li>
            <li><a class="nav-sublink" href="#" onclick="csub()">Other menu</a></li>
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
                <form action="OurFood.php" method="POST">
                    <div class="ourfood-card">
                        <div class="pic-container">
                            <?php echo '<img class="ourfood-img" src=" ' . ($row["food_pict"]) . '">'; ?>
                        </div>
                        <div class="text-container">
                            <h4 class="food-name"><?php echo $row["food_name"]; ?></h4>
                        </div>
                        <p class="pricehead">Price</p>
                        <h5>฿<?php echo ($row['food_price'] == (int)$row['food_price']) ? $row['food_price'] : number_format($row['food_price'], 2);?></h5>
                        <button type="submit" name="Add_To_Cart" class="btn btn-danger">Order</button>
                        <input type="hidden" name ="food_id" value = "<?php echo $row['food_id']; ?>" >
                        <input type="hidden" name ="food_name" value = "<?php echo ($row['food_name']); ?>" >
                        <input type="hidden" name ="food_price" value = "<?php echo $row['food_price']; ?>" >
                        <input type="hidden" name ="food_pict" value = "<?php echo $row['food_pict']; ?>" >
                    </div>
                </form>
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
                    <div class="pic-container">
                        <?php echo '<img class="ourfood-img" src=" ' . ($row["menuset_pict"]) . '">'; ?>
                    </div>
                    <div class="text-container">
                        <h4 class="food-name"><?php echo $row["menuset_name"]; ?></h4>
                    </div>
                    <p class="pricehead">Price</p>
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
                    <div class="pic-container">
                        <?php echo '<img class="ourfood-img" src=" ' . ($row["food_pict"]) . '">'; ?>
                    </div>
                    <div class="text-container">
                        <h4 class="food-name"><?php echo $row["food_name"]; ?></h4>
                    </div>
                    <p class="pricehead">Price</p>
                    <h5>฿<?php echo number_format($row["food_price"]) ?></h5>
                    <button class="btn btn-danger">Order</button>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
    <script src="js/foodselector.js"></script>
    <?php require 'php/module/footer.html' ?>
</body>

</html>

<?php
mysqli_close($conn);
?>
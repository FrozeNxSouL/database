<?php
session_start();
require_once('php/connect.php');

$sql = 'SELECT * FROM food_menu WHERE food_category = 1;';
$burgermenu = $conn->query($sql);

$sql1 = 'SELECT * FROM food_menu WHERE food_category = 2;';
$othermenu = $conn->query($sql1);


$sql2 = 'SELECT * FROM set_menu;';
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
    <style>
		select[multiple] {
			width: 100%;
			height: 150px;
			padding: 5px;
			font-size: 16px;
			border: 1px solid #ccc;
			border-radius: 4px;
			background-color: #fff;
			overflow-y: auto;
		}

		select[multiple] option {
			padding: 5px;
			font-size: 16px;
			border-bottom: 1px solid #ccc;
			background-color: #fff;
		}

		select[multiple] option:last-child {
			border-bottom: none;
		}
	</style>
</head>

<body>
<?php

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['Add_To_Set']))
        {
            if(isset($_SESSION['setting']))
            {
                $myset=array_column($_SESSION['setting'],'food_name');
                if(in_array($_POST['food_name'],$myset))
                {
                    ?>
                    <script>alert('food Already Added');</script>    
                    <?php header('location: edit-OurSet.php'); ?>
<?php
                }
                else
                {
                    $count=count($_SESSION['setting']);
                    $_SESSION['setting'][$count] = array('food_id'=>$_POST['food_id'],'food_name'=>$_POST['food_name'],'food_price'=>$_POST['food_price'],'food_quantity'=>1); 
                    ?>
                    <script type='text/javascript'>alert('food Added');</script>    
                    <?php header('location: edit-OurSet.php'); ?>
<?php
                }
            }
            else
            {
                $_SESSION['setting'][0]=array('food_id'=>$_POST['food_id'],'food_name'=>$_POST['food_name'],'food_price'=>$_POST['food_price'],'food_quantity'=>1);
                ?>
                <script>alert('food Added');</script>    
                <?php header('location: edit-OurSet.php'); ?>
<?php
            }
        }
        if(isset($_POST['Remove_Food']))
        {
            foreach($_SESSION['setting'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    unset($_SESSION['setting'][$key]);
                    $_SESSION['setting']=array_values($_SESSION['setting']);
                    ?>
                    <script>alert('food Removed');</script>    
                    <?php header('location: edit-OurSet.php'); ?>
<?php
                }
            }
        }
        if(isset($_POST['Mod_Quantity']))
        {
            foreach($_SESSION['setting'] as $key => $value)
            {
                if($value['food_name']==$_POST['food_name'])
                {
                    $_SESSION['setting'][$key]['food_quantity']=$_POST['Mod_Quantity'];
                    echo"<script>
                        window.location.href='myset.php';
                    </script>";
                }
            }
        }
    }

?>
    <?php require('login-signin.php'); ?>

    <div class="contain">
        <header id="header">
            <?php require 'php/module/navbar.php'?>
        </header>
    </div>

    <?php include 'php/module/subnav-backdoor.html' ?>
    <div id="message"></div>
    <div class="burgercontent" id="burger">
        <div class="menu-title">
            <h2 style="font-weight: 700">Menu</h2>
        </div>
        <div class="menu">
            <?php
            while ($row = mysqli_fetch_assoc($burgermenu)) {


            ?>
                <form action="edit-OurSet.php" method="POST">
                    <div class="ourfood-card">
                        <div class="pic-container">
                            <?php echo '<img class="ourfood-img" src=" ' . ($row["food_pict"]) . '">'; ?>
                        </div>
                        <div class="text-container">
                            <h4 class="food-name"><?php echo $row["food_name"]; ?></h4>
                        </div>
                        <p class="pricehead">Price</p>
                        <h5>฿<?php echo ($row['food_price'] == (int)$row['food_price']) ? $row['food_price'] : number_format($row['food_price'], 2);?></h5>
                        <button type="submit" name="Add_To_Set" class="btn btn-danger">Add To Set</button>
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

    <div class="submenucontent" id="other">
        <div class="menu-title">
            <h2 style="font-weight: 700">Other Menu</h2>
        </div>
        <div class="menu">
            <?php
            while ($row = mysqli_fetch_assoc($othermenu)) {


                ?>
                    <form action="edit-OurSet.php" method="POST">
                        <div class="ourfood-card">
                            <div class="pic-container">
                                <?php echo '<img class="ourfood-img" src=" ' . ($row["food_pict"]) . '">'; ?>
                            </div>
                            <div class="text-container">
                                <h4 class="food-name"><?php echo $row["food_name"]; ?></h4>
                            </div>
                            <p class="pricehead">Price</p>
                            <h5>฿<?php echo ($row['food_price'] == (int)$row['food_price']) ? $row['food_price'] : number_format($row['food_price'], 2);?></h5>
                            <button type="submit" name="Add_To_Set" class="btn btn-danger">Add To Set</button>
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
        <form>
        <label for="fruits">Choose your favorite fruits:</label><br>
        <select id="fruits" name="fruits" multiple>
            <option value="apple">Apple</option>
            <option value="banana">Banana</option>
            <option value="orange">Orange</option>
            <option value="pear">Pear</option>
            <option value="strawberry">Strawberry</option>
        </select><br><br>
        <input type="submit" value="Submit">
        </form>

        <script>
        var select = document.getElementById("fruits");
        var isDragging = false;
        var startX;
        var startY;

        select.addEventListener("mousedown", function(e) {
            e.preventDefault();
            isDragging = false;
            startX = e.clientX;
            startY = e.clientY;
        });

        select.addEventListener("mousemove", function(e) {
            if (isDragging) {
            var x = e.clientX;
            var y = e.clientY;
            var delta = y - startY;
            select.scrollTop += delta;
            startX = x;
            startY = y;
            }
        });

        select.addEventListener("mouseup", function(e) {
            if (!isDragging) {
            var clickedOption = e.target;
            if (clickedOption.tagName === 'OPTION') {
                clickedOption.selected = !clickedOption.selected;
            }
            }
            isDragging = false;
        });

        select.addEventListener("mouseleave", function(e) {
            isDragging = false;
        });

        select.addEventListener("mouseenter", function(e) {
            isDragging = false;
        });
        </script>
    </div>
    <script src="js/foodselector.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <script src="js/logincheckfunc.js" ></script>
    <script src="js/checkfunc.js" ></script>
    <script src="js/account.js"></script>
    <?php require 'php/module/footer.html' ?>
</body>

</html>

<?php
mysqli_close($conn);
?>
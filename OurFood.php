<?php
require('php/connect.php');

$sql = 'SELECT * FROM burger;';
$all_burger = $conn->query($sql);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</head>

<body>
    <div class="contain">
        <header id="header"></header>
        <script src="js/header.js"></script>
    </div>
    <div class="content-header">
        <ul class="nav-sub">
            <li><a class="nav-sublink" href="#">Burger</a></li>
            <li><a class="nav-sublink" href="#">Set menu</a></li>
            <li><a class="nav-sublink" href="#">Other menu</a></li>
        </ul>
    </div>

    <div class="content-main">
        <div class="menu-title">
            <h2 style="font-weight: 700">Menu</h2>
        </div>
        <div class="menu">
            <?php
            while ($row = mysqli_fetch_assoc($all_burger)) {

            ?>
                <div class="ourfood-card">
                    <div class="pic-container" >
                        <?php echo '<img class="ourfood-img" src=" '.($row["burger_pict"]).'">';?>
                    </div>
                    <h3 class="food-name"><?php echo $row["burger_name"]; ?></h3>
                    <h5>฿<?php echo $row["burger_price"]; ?></h5>
                    <button class="btn btn-danger">Order</button>
                </div>
            <?php
                }
            ?>

        </div>
    </div>
</body>
</html>

<?php
    mysqli_close($conn);
?>

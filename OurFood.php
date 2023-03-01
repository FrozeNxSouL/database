<?php

require_once 'connect.php';

$sql = "SELECT * FROM burger";
$all_burger = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/OurFood.css">
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
</head>

<body>
    <div class="contain">
        <header id="header"></header>
        <script src="js/header.js"></script>
    </div>
    <div class="head">
        <div class="line">
        </div>
        <h1>MENU</h1>
    </div>
    <div class="menu">
        <div class="contain_menu">
        <?php
        while ($row = mysqli_fetch_assoc($all_burger)) {

        ?>
            <div class="burger1">
                <h1><?php echo $row["burger_name"]; ?></h1>
                <div class="contain_pic">
                    <?php echo '<img src="data:image;base64,'.base64_encode($row["burger_pict"]).'">';?>
                </div>
                
                <h2>$<?php echo $row["burger_price"]; ?></h2>
                <div class="order">
                    <p>order</p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
<h1> Upload / Insert an IMAGE into DataBase using PHP Mysql</h1>
    <form action="" method="POST" enctype="multipart/form-data">

        <label> Choose an picture: </label>
        <input type="file" name="burger_pict" id="image" /><br>

        <label> Enter a burger name: </label>
        <input type="text" name="burger_name" placeholder="Enter a burger name" /><br>

        <label> Enter a burger price: </label>
        <input type="text" name="burger_price" placeholder="Enter a burger price" /><br>

        <input type="submit" name="upload" value="Upload Image/Data" /><br>
        
    </form>
</html>

<?php

$conn = mysqli_connect($servername, $username, $password, $dbname);
$db = mysqli_select_db($conn,'mc');
if(isset($_POST['upload']))
{
    $file = addslashes(file_get_contents($_FILES["burger_pict"]["tmp_name"]));
    $burger_name = $_POST['burger_name'];
    $burger_price = $_POST['burger_price'];

    $query = "INSERT INTO `burger`(`burger_pict`,`burger_name`,`burger_price`) VALUES ('$file','$burger_name','$burger_price')";
    $query_run = mysqli_query($conn,$query);



}
?>

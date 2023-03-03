<?php

require('php/connect.php');

// delete function 
$delete_ID  = $_REQUEST['burger_id'];

$delsql = '
    DELETE FROM burger
    WHERE burger_id = ' . $delete_ID . ';
    ';

$objQuery = mysqli_query($conn, $delsql);

// query function
$sql = 'SELECT * FROM burger;';
$all_burger = $conn->query($sql);

// edit function
$updatesql = "
	UPDATE burger
	SET 
    burger_name = '" . $burger_name . "',  
	burger_price = '" . $burger_price . "', 
	burger_pic = '" . $burger_pic . "', 
    WHERE burger_id = " . $burger_id . " ; ";

$burger_id    = $_REQUEST['burger_id'];
$burger_name = $_REQUEST['burger_name'];
$burger_price = $_REQUEST['burger_price'];
$burger_pic = $_REQUEST['burger_pic'];

$objQuery = mysqli_query($conn, $updatesql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/backdoor.css">
    <meta charset="UTF-8">
    <title>MC</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
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
            <li class="nav-tab"><a class="nav-sublink" href="#">Banner</a></li>
            <li class="nav-tab"><a class="nav-sublink" href="#">User</a></li>
            <li class="nav-tab"><a class="nav-sublink" href="#">Menu</a></li>
            <li class="nav-tab"><a class="nav-sublink" href="#">Delivery</a></li>
        </ul>
    </div>

    <div class="typeselector">
        <div class="menubut" id="menubut" onclick="emenu()">
            <p>Burger</p>
        </div>
        <div class="menubut" id="setbut" onclick="eset()">
            <p>Set</p>
        </div>
        <div class="menubut" id="submenubut" onclick="esub()">
            <p>Other</p>
        </div>
    </div>
    <div class="content-main">
        <div class="list-edit" id="menu-section">
            <form class="form-edit" method="POST">
                <div class="mb-3">
                    <input class="form-control" type="text" name="burger_name" placeholder="Enter a burger name" required>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <div class="input-group-text">฿</div>
                        <input type="text" class="form-control" name="burger_price" placeholder="Enter a burger price" required>
                    </div>
                </div>
                <div class="mb-3">
                        <input type="url" class="form-control" name="burger_pict" placeholder="Enter a burger image" required>
                </div>

                <button class="btn btn-primary" type="submit" name="upload">Add new menu</button>
                <button class="btn btn-danger" type="reset" name="upload">Clear</button>

            </form>
            
            <?php
                while ($row = mysqli_fetch_assoc($all_burger)) {
            ?>

                    <div class="list-edit-item">
                        <div class="list-img">
                        <img src="<?php echo $row['burger_pict']; ?>">
                        </div>
                        <div class="list-info">
                            <h4><?php echo $row["burger_name"]; ?></h4>
                            <span>฿<?php echo $row["burger_price"]; ?></span>
                            <div class="col">
                                <a class="btn btn-danger" href="?burger_id=<?php echo $row["burger_id"]; ?>">Delete</a>
                                <a class="btn btn-warning">Edit</a>
                            </div>
                            
                        </div>
                    </div>

            <?php
                }
            ?>

        </div>
    </div>
    <script src="js/backdoor.js"></script>
    <script src="js/editmenuselector.js"></script>
</body>
</html>

<?php

if(isset($_POST['upload']))
{
    $burger_pict = $_POST['burger_pict'];
    $burger_name = $_POST['burger_name'];
    $burger_price = $_POST['burger_price'];

    $query = "INSERT INTO `burger`(`burger_pict`,`burger_name`,`burger_price`) VALUES ('$burger_pict','$burger_name','$burger_price')";
    $query_run = mysqli_query($conn,$query);

    mysqli_close($conn);
}
?>

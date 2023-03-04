<?php

require('php/connect.php');

// delete function 
$delete_ID  = $_REQUEST['food_id'];

$delsql = '
    DELETE FROM food_menu
    WHERE food_id = ' . $delete_ID . ';
    ';

$objQuery = mysqli_query($conn, $delsql);

// query function
$sql = 'SELECT * FROM food_menu;';
$all_food = $conn->query($sql);

// query food cate

$catesql = 'SELECT * FROM category;';
$all_cate = $conn->query($catesql);

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
        <header id="header">
            <?php require 'php/module/navbar.html'?>
        </header>
    </div>

    <?php include 'php/module/subnav-backdoor.html' ?>
    <div class="content-main">
        <div class="list-edit">
            <form class="form-edit" method="POST">
                <div class="row g-3">
                    <div class="col-12">
                            <input type="url" class="form-control" name="food_pict" placeholder="Image URL" required>
                    </div>

                    <div class="col-12">
                        <div class="input-group">
                            <input class="form-control" type="text" name="food_name" placeholder="Name" required>
                            <select class="form-select" name="food_category">

                                <?php
                                    while ($cate = mysqli_fetch_assoc($all_cate)) {
                                ?>
                                <option value="<?php echo $cate["category_id"]; ?>"><?php echo $cate["category_name"]; ?></option>

                                <?php } ?>
                            </select>
                            <div class="input-group-text">฿</div>
                            <input type="text" class="form-control" name="food_price" placeholder="Price" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" name="add_menu">Add new menu</button>
                        <button class="btn btn-danger" type="reset">Clear</button>
                    </div>
                </div>
            </form>
            <div class="list-edit">
                <form id="edit-item-module" class="form-edit hide" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="input-group">
                                <div class="input-group-text">ID</div>
                                <input id="edit_food_id" class="form-control" name="edit_food_id" style="pointer-events:none">
                            </div>
                        </div>
                        <div class="col-12">
                                <input id="edit_food_pict" type="url" class="form-control" name="edit_food_pict" placeholder="pic" required>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <input id="edit_food_name" class="form-control" type="text" name="edit_food_name" placeholder="name" required>
                                <select id="edit_food_category" class="form-select" name="edit_food_category">

                                    <?php
                                        $all_cate = $conn->query($catesql);
                                        while ($cate = mysqli_fetch_assoc($all_cate)) {
                                    ?>
                                        <option value="<?php echo $cate["category_id"]; ?>"><?php echo $cate["category_name"]; ?></option>

                                    <?php } ?>

                                </select>
                                <div class="input-group-text">฿</div>
                                <input id="edit_food_price" type="text" class="form-control" name="edit_food_price" placeholder="Price" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <button id="save-edit" class="btn btn-primary" type="submit" name="save_edit">Save</button>
                            <button id="cancel-edit" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>

                </form>
            </div>
            
            <?php
                $all_food = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($all_food)) {
            ?>

                    <div class="list-edit-item">
                        <div class="list-img">
                            <img id="foodpic" src="<?php echo $row['food_pict']; ?>">
                        </div>
                        <div class="list-info">
                                <h5><span class="badge bg-warning">ID</span> <?php echo $row['food_id']; ?></h5>
                                <h6><span class="badge bg-secondary">ชื่อ</span> <?php echo $row['food_name']; ?></h6>
                                <h6><span class="badge bg-secondary">ประเภท</span> <?php echo $row['food_category']; ?></h6>
                                <h6><span class="badge bg-secondary">ราคา</span> <?php echo $row['food_price']; ?>฿</h6>
                            <div class="col">
                                <a class="btn btn-danger" href="?food_id=<?php echo $row["food_id"]; ?>">Delete</a>
                                <a class="btn btn-secondary" id="edit-btn" href="#">Edit</a>
                            </div>
                            
                        </div>
                    </div>

            <?php
                }
            ?>

                    </div>

        </div>
    </div>
    <?php include 'php/module/footer.html'?>
    <script src="js/backdoor.js"></script>
</body>
</html>

<?php

if(isset($_POST['add_menu']))
{
    $food_pict = $_POST['food_pict'];
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $food_category = $_POST['food_category'];

    $query = "INSERT INTO `food_menu`(`food_pict`,`food_name`,`food_price`,`food_category`) VALUES ('$food_pict','$food_name','$food_price', '$food_category')";
    $query_run = mysqli_query($conn,$query);
    
}
if(isset($_POST['save_edit'])) {
    $edit_food_id = $_POST['edit_food_id']; 
    $edit_food_name = $_POST['edit_food_name'];
    $edit_food_category = $_POST['edit_food_category'];
    $edit_food_pict = $_POST['edit_food_pict'];
    $edit_food_price = $_POST['edit_food_price'];
    
    $sqledit = "
        UPDATE food_menu
        SET food_name = '$edit_food_name',  
        food_price = '$edit_food_price', 
        food_pict = '$edit_food_pict', 
        food_category = '$edit_food_category'
        WHERE food_id = '$edit_food_id' ; ";
    
    $queryedit = mysqli_query($conn, $sqledit);
}
    mysqli_close($conn);
?>

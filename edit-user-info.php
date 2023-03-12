
<?php
    require('php/connect.php');
    require('php/process.php');
    $get_cus_email = $_REQUEST['cus_email'];

    // get edit user info
    $usersql = "SELECT * FROM customer WHERE cus_email = '$get_cus_email' ;";

    $objQuery = mysqli_query($conn, $usersql) or die("Error Query [" . $sql . "]");
    $row = mysqli_fetch_assoc($objQuery);


?>
<!DOCTYPE html>
<html lang="en">
<head>
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
            <?php require 'php/module/navbar.php'?>
        </header>
    </div>
    <?php include 'php/module/subnav-backdoor.html' ?>
    <div class="content-main">
        <form id="edit-item-module" class="form-edit" method="POST">
            <div class="row g-3">
                <div class="col-10">
                    <div class="input-group">
                        <div class="input-group-text">Email</div>
                        <input id="edit_cus_email" class="form-control" name="cus_email" value="<?php echo $get_cus_email ?>" >
                    </div>
                </div>
                <div class="col-2">
                    <select id="edit_cus_role" class="form-control" name="user_role">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="col-6">
                    <div class="input-group">
                    <div class="input-group-text">Name</div>
                    <input name="name" id="edit_cus_name" type="text" class="form-control" placeholder="Enter your full name" value="<?php echo $row['name']; ?>" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                    <div class="input-group-text">Phone</div>
                    <input  id="edit_cus_phone" type="text" class="form-control" placeholder="Enter your phone number" value="<?php echo $row['phone_num']; ?>" required>
                    </div> 
                </div>
                
                <div class="col-12">
                    <input name="address" id="edit_cus_address" class="form-control" type="text" placeholder="Address" value="<?php echo $row['address']; ?>" required>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <input list="listsubdis" name="subdistrict" id="edit_cus_subdistrict" type="text" class="form-control" placeholder="Subdistrict" value="<?php echo $row['subdistrict']; ?>" required>
                        <datalist id="listsubdis">
                                <?php
                                    $subdistrictsql = "SELECT name_th FROM districts WHERE name_th NOT LIKE '%*%'";
                                    $subdistrict = $conn->query($subdistrictsql);
                                    while ($poption = mysqli_fetch_assoc($subdistrict))  {
                                ?>
                                    <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                                <?php } ?>
                        </datalist>

                        <input list="listdis" name="district" id="edit_cus_district" type="text" class="form-control" placeholder="District" value="<?php echo $row['district']; ?>" required>
                        <datalist  id="listdis">
                            <?php
                                $districtsql = "SELECT name_th FROM amphures WHERE name_th NOT LIKE '%*%'";
                                $district = $conn->query($districtsql);
                                while ($poption = mysqli_fetch_assoc($district))  {
                            ?>
                                <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                            <?php } ?>
                        </datalist>

                        <input list="listprovice" name="provice" id="edit_cus_provice" type="text" class="form-control" placeholder="Province" value="<?php echo $row['provice']; ?>" required>
                        <datalist id="listprovice">
                                <?php
                                    $provincesql = "SELECT name_th FROM provinces";
                                    $province = $conn->query($provincesql);
                                    while ($poption = mysqli_fetch_assoc($province))  {
                                ?>
                                    <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                                <?php } ?>
                        </datalist>
                        
                        <input list="listpostal" id="edit_cus_zip" type="text" class="form-control" placeholder="Postal Code" value="<?php echo $row['postal_num']; ?>" required>
                        <datalist id="listpostal">
                                <?php
                                    $postsql = "SELECT zip_code FROM districts WHERE zip_code != 0";
                                    $postqr = $conn->query($postsql);
                                    while ($poption = mysqli_fetch_assoc($postqr))  {
                                ?>
                                    <option value="<?php echo $poption['zip_code']; ?>"><?php echo $poption['zip_code']; ?></option>
                                <?php } ?>
                        </datalist>
                    </div>
                        
                </div>
                <p id="errorinput"></p>
                <div class="col-12">
                    <button id="save-edit" class="btn btn-primary">Save</button>
                    <a id="cancel-edit" class="btn btn-danger" href="edit-user.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <?php include 'php/module/footer.html'?>
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <script src="js/user_validation.js"></script>
    <script src="js/alerts.js"></script>
</body>
</html>
<?php

    mysqli_close($conn);
?>

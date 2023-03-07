<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>

<?php
    require('php/connect.php');

    $get_cus_email = $_REQUEST['cus_email'];

    // get edit user info
    $usersql = "SELECT * FROM customer WHERE cus_email = '$get_cus_email' ;";

    $objQuery = mysqli_query($conn, $usersql) or die("Error Query [" . $sql . "]");
    $row = mysqli_fetch_array($objQuery)

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
                        <input id="edit_cus_email" class="form-control" name="cus_email">
                    </div>
                </div>
                <div class="col-2">
                    <select id="edit_cus_role" class="form-control">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="col-6">
                    <div class="input-group">
                    <div class="input-group-text">Name</div>
                    <input name="name" id="edit_cus_name" type="text" class="form-control" placeholder="Enter your full name" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                    <div class="input-group-text">Phone</div>
                    <input name="phone_num" id="edit_cus_phone" type="text" class="form-control" placeholder="Enter your phone number" required>
                    </div> 
                </div>
                
                <div class="col-12">
                    <input name="address" id="edit_cus_address" class="form-control" type="text" placeholder="Address" required>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <input name="subdistrict" id="edit_cus_subdistrict" type="text" class="form-control" placeholder="Subdistrict" required>
                        <input name="district" id="edit_cus_district" type="text" class="form-control" placeholder="District" required>
                        <input name="province" id="edit_cus_province" type="text" class="form-control" placeholder="Province" required>
                        <input id="edit_cus_zip" type="text" class="form-control" placeholder="Zip code" required>
                    </div>
                        
                </div>

                <div class="col-12">
                    <button id="save-edit" class="btn btn-primary" type="submit" name="save_edit">Save</button>
                    <a id="cancel-edit" class="btn btn-danger" href="edit-user.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        var input_email = document.getElementById('edit_cus_email');
        var input_role = document.getElementById('edit_cus_role');
        var input_name = document.getElementById('edit_cus_name');
        var input_phone = document.getElementById('edit_cus_phone');
        var input_address = document.getElementById('edit_cus_address');
        var input_subdistrict = document.getElementById('edit_cus_subdistrict');
        var input_district = document.getElementById('edit_cus_district');
        var input_province = document.getElementById('edit_cus_province');
        var input_zipcode = document.getElementById('edit_cus_zipcode');

        function changeVal() {

            input_email.value = '<?php echo $get_cus_email ?>';
            input_name.value = '<?php echo $row['name']; ?>';
            input_phone.value = '<?php echo $row['phone_num']; ?>';
            input_address.value = '<?php echo $row['address']; ?>';
            input_subdistrict.value = '<?php echo $row['subdistrict']; ?>';
            input_district.value = '<?php echo $row['district']; ?>';
            input_province.value = '<?php echo $row['province']; ?>';
        }
        
        input_email.addEventListener('input', ()=> {
            changeVal();
        })
        changeVal();
    </script>
    <?php include 'php/module/footer.html'?>
</body>
</html>
<?php

if(isset($_POST['save_edit'])) {

    $cus_email    = $_REQUEST['cus_email'];
    $name		  = $_REQUEST['name'];
    $phone_num 		  = $_REQUEST['phone_num '];
    $address		  = $_REQUEST['address'];
    $subdistrict	  = $_REQUEST['subdistrict'];
    $district	  = $_REQUEST['district'];
    $province	  = $_REQUEST['province'];
    $user_role = $_REQUEST['user_role'];

    $sql = "
        UPDATE customer
        SET name = '" . $name . "',  
        phone_num = '" . $phone_num . "', 
        address = '" . $address . "', 
        subdistrict = '" . $subdistrict . "', 
        district = '" . $district . "', 
        province = '" . $province . "' ,
        user_role = '" . $user_role . "'
        WHERE cus_email = " . $cus_email . " ; ";
    
    $objQuery = mysqli_query($conn, $sql);

}
    mysqli_close($conn);
?>

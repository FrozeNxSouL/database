<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>

<?php
    require('php/connect.php');
    $get_id = $_REQUEST['branchID'];

    // get edit user info
    $branchsql = "SELECT * FROM branch WHERE branchID = '$get_id';";

    $objQuery = mysqli_query($conn, $branchsql) or die("Error Query [" . $sql . "]");
    $row = mysqli_fetch_array($objQuery);

    // select subdistrict district province
    $sqllocation = "SELECT provinces.id, provinces.name_th, districts.id, districts.name_th, amphures.id, amphures.name_th;
    FROM provinces, districts, amphures;
    WHERE districts.amphure_id = amphures.id, amphures.province_id = provinces.id;";

    $locationQuery = mysqli_query($conn, $sqllocation);
    $all_locate = mysqli_fetch_array($locationQuery);

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
                <div class="col-6">
                    <div class="input-group">
                        <div class="input-group-text">ID</div>
                        <input id="edit_branch_id" class="form-control" name="branchID">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                    <div class="input-group-text">Name</div>
                    <input name="branchName" id="edit_branch_name" type="text" class="form-control" placeholder="Enter branch name" required>
                    </div>
                </div>
                
                <div class="col-12">
                    <input name="branch_address" id="edit_branch_address" class="form-control" type="text" placeholder="Address" required>
                </div>
                <div class="col-12">
                    <div class="input-group">
                        <input list="listsubdis" name="branch_subdistrict" id="edit_branch_subdistrict" type="text" class="form-control" placeholder="Subdistrict" required>
                        <datalist id="listsubdis">
                                <?php
                                    $subdistrictsql = "SELECT name_th FROM districts WHERE name_th NOT LIKE '%*%'";
                                    $subdistrict = $conn->query($subdistrictsql);
                                    while ($poption = mysqli_fetch_assoc($subdistrict))  {
                                ?>
                                    <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                                <?php } ?>
                        </datalist>

                        <input list="listdis" name="branch_district" id="edit_branch_district" type="text" class="form-control" placeholder="District" required>
                        <datalist  id="listdis">
                            <?php
                                $districtsql = "SELECT name_th FROM amphures WHERE name_th NOT LIKE '%*%'";
                                $district = $conn->query($districtsql);
                                while ($poption = mysqli_fetch_assoc($district))  {
                            ?>
                                <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                            <?php } ?>
                        </datalist>
                        
                        <input list="listprovice" name="branch_province" id="edit_branch_province" type="text" class="form-control" placeholder="Province" required>
                        <datalist id="listprovice">
                                <?php
                                    $provincesql = "SELECT name_th FROM provinces";
                                    $province = $conn->query($provincesql);
                                    while ($poption = mysqli_fetch_assoc($province))  {
                                ?>
                                    <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                                <?php } ?>
                        </datalist>
                    </div>
                        
                </div>

                <div class="col-12">
                    <button id="save-edit" class="btn btn-primary" type="submit" name="save_edit">Save</button>
                    <a id="cancel-edit" class="btn btn-danger" href="edit-branch.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        var input_id = document.getElementById('edit_branch_id');
        var input_name = document.getElementById('edit_branch_name');
        var input_address = document.getElementById('edit_branch_address');
        var input_subdistrict = document.getElementById('edit_branch_subdistrict');
        var input_district = document.getElementById('edit_branch_district');
        var input_provice = document.getElementById('edit_branch_provice');

        function changeVal() {

            input_id.value = '<?php echo $get_id ?>';
            input_name.value = '<?php echo $row['branchName']; ?>';
            input_address.value = '<?php echo $row['branch_address']; ?>';
            input_subdistrict.value = '<?php echo $row['branch_subdistrict']; ?>';
            input_district.value = '<?php echo $row['branch_district']; ?>';
            input_provice.value = '<?php echo $row['branch_province']; ?>';
        }
        
        input_id.addEventListener('input', ()=> {
            changeVal();
        })
        changeVal();
    </script>
    <?php include 'php/module/footer.html'?>
</body>
</html>
<?php

if(isset($_POST['save_edit'])) {

    $branchID   = $_REQUEST['branchID'];
    $branchName		  = $_REQUEST['branchName'];
    $branch_address		  = $_REQUEST['branch_address'];
    $branch_subdistrict	  = $_REQUEST['branch_subdistrict'];
    $branch_district	  = $_REQUEST['branch_district'];
    $branch_province	  = $_REQUEST['branch_province'];

    $sql = "
        UPDATE branch
        SET branchName = '$branchName',  
        branch_address = '$branch_address', 
        branch_subdistrict = '$branch_subdistrict', 
        branch_district = '$branch_district', 
        branch_province = '$branch_province'
        WHERE branchID = '$get_id'; ";
    
    $objQuery = mysqli_query($conn, $sql);
    header('Location: edit-branch.php');

}
    mysqli_close($conn);
?>

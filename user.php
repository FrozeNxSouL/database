<?php 

    require_once('php/connect.php');
    require_once('php/process.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MC</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/user.css">
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
        <header id="header">
            <?php include 'php/module/navbar.php'?>
        </header>
    </div>
    <div class="content-header">
        <ul class="nav-sub">
            <li><a class="nav-sublink" href="#">Personal info</a></li>
            <li><a class="nav-sublink" href="transaction.php">Transaction</a></li>
            <!-- <li><a class="nav-sublink" href="#">Receipt</a></li> -->
        </ul>
    </div>
    <div id="info" class="content-main">
    <?php 
        $data = $_SESSION['email'];
        $sql = "SELECT * FROM customer WHERE cus_email = '$data'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    ?>
    <div class="head">
        <h1 style="font-weight: 500">Profile</h1>
    </div>
    <form method="POST" >
        <div class="row g-3">
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text">Email</span>
                    <input type="email" id="sign-up-email" type="text" class="form-control" value="<?php echo $row['cus_email']; ?>" disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text">Name</span>
                    <input id="inputName" type="text" class="form-control" value="<?php echo $row['name']; ?>">
                </div>
            </div>
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text">Phone</span>
                    <input id="inputphonenum" type="text" class="form-control" value="<?php echo $row['phone_num']; ?>">
                </div>
            </div>
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text">Address</span>
                    <input id="inputaddress" type="text" class="form-control" value="<?php echo $row['address']; ?>">
                </div>
            </div>
                <div class="col-4">
                    <div class="input-group">
                        <span class="input-group-text">Subdistrict</span>
                        <input list="listsubdis" class="form-control" id="inputsubdis" value="<?php echo $row['subdistrict']; ?>">
                        <datalist id="listsubdis">
                            <?php
                                $subdistrictsql = "SELECT name_th FROM districts WHERE name_th NOT LIKE '%*%'";
                                $subdistrict = $conn->query($subdistrictsql);
                                while ($poption = mysqli_fetch_assoc($subdistrict))  {
                            ?>
                                <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                            <?php } ?>
                        </datalist>
                    </div>
                </div>

                <div class="col-4">
                    <div class="input-group">
                        <span class="input-group-text">District</span>
                        <input list="listdis" class="form-control" id="inputdis" value="<?php echo $row['district']; ?>">
                        <datalist  id="listdis">
                                <?php
                                    $districtsql = "SELECT name_th FROM amphures WHERE name_th NOT LIKE '%*%'";
                                    $district = $conn->query($districtsql);
                                    while ($poption = mysqli_fetch_assoc($district))  {
                                ?>
                                    <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                                <?php } ?>
                        </datalist>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="input-group">
                        <span class="input-group-text">Province</span>
                        <input list="listprovice" class="form-control" id="inputprovice" value="<?php echo $row['provice']; ?>">
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
                <div class="input-group">
                    <span class="input-group-text">Postal Number</span>
                    <input id="inputpostal" type="text" class="form-control" value="<?php echo $row['postal_num']; ?>">
                </div>
            </div>
                <p id="errorinput"></p>    
                <div class="col-12" style="text-align: center;">
                    <button id="user_save" class="btn btn-primary" type="button">Save</button>
                    <button data-id="<?php echo $row['cus_email']; ?>" class="btn btn-danger delete-btn">DELETE</button>
                </div>
        </div>
    
    </form>
     
</div>
    <script src="js/user.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <script src="js/edituserselector.js"></script>
    <?php include 'php/module/footer.html' ?>
    <script src="js/alerts.js"></script>
</body>
</html>
<?php 
    if (isset($_REQUEST['delete'])) {
        $delete_ID  = $_REQUEST['delete'];
        $delsql = "
        DELETE FROM customer
        WHERE cus_email = '$delete_ID';
        ";
        $objQuery = mysqli_query($conn, $delsql);
        session_destroy();
    }
    mysqli_close($conn); 
?>
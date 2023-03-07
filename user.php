<?php 
    session_start();
    require_once('php/connect.php');
    require_once('php/process.php'); 

    if (isset($_REQUEST['cus_email'])) {
        $delete_ID  = $_REQUEST['cus_email'];
        $delsql = "
        DELETE FROM customer
        WHERE cus_email = '$delete_ID';
        ";
        $objQuery = mysqli_query($conn, $delsql);
        session_destroy();
        header('location: index.php');
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: index.php');
    }
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
            <li><a class="nav-sublink" href="#">Transaction</a></li>
            <li><a class="nav-sublink" href="#">Receipt</a></li>
        </ul>
    </div>
    <div id="info" class="content-main">
    <?php 
        $data = $_SESSION['email'];
        $sql = "SELECT * FROM customer WHERE cus_email = '$data'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    ?>
    <form method="post" id="profileconfigure">
        <div class="row g-3">
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text">Email</span>
                    <input type="email" id="sign-up-email" type="text" class="form-control" value="<?php echo $row['cus_email']; ?>">
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
                        <select id="inputsubdis" class="form-control">
                            <?php
                                $subdistrictsql = "SELECT name_th FROM districts";
                                $subdistrict = $conn->query($subdistrictsql);
                                while ($poption = mysqli_fetch_assoc($subdistrict))  {
                            ?>
                                <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="input-group">
                        <span class="input-group-text">District</span>
                        <select id="inputdis" class="form-control">
                            <?php
                                $districtsql = "SELECT name_th FROM amphures";
                                $district = $conn->query($districtsql);
                                while ($poption = mysqli_fetch_assoc($district))  {
                            ?>
                                <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="input-group">
                        <span class="input-group-text">Province</span>
                        <select id="inputprovice" class="form-control">
                            <?php
                                $provincesql = "SELECT name_th FROM provinces";
                                $province = $conn->query($provincesql);
                                while ($poption = mysqli_fetch_assoc($province))  {
                            ?>
                                <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-12" style="text-align: center;">
                    <button id="save" class="btn btn-primary" type="submit" name="submit">Save</button>
                </div>
        </div>
    
    </form>
    <button id="del-button" class="btn btn-danger" onclick="delacc()">DELETE</button>
    <button id="logout-button" class="btn btn-secondary" onclick="logout()">Logout</button>
     
        <form class="profileconfigure" id="profileconfigure" method="post" >
            <h1>Profile / configure</h1>
            <div class="nameblock">
                <h5 class="tt">NAME</h5>
                <input type="text" id="inputName" class="form-control" value="<?php echo $row['name']; ?>">
            </div>
            <div class="emailblock">
                <h5 class="tt">EMAIL</h5>
                <input type="email" id="sign-up-email" class="form-control" value="<?php echo $row['cus_email']; ?>" disabled>
            </div>
            <div class="phonenumblock">
                <h5 class="tt">Phone Number</h5>
                <input type="text" id="inputphonenum" class="form-control" value="<?php echo $row['phone_num']; ?>">
            </div>
            <div class="addressblock">
                <h5 class="tt">ADDRESS</h5>
                <input type="text" id="inputaddress" class="form-control" value="<?php echo $row['address']; ?>" >
                <div class="addressfield">
                    <div class="col">
                        <h5>Subdistrict</h5>
                        <input type="text" id="inputsubdis" class="form-control" value="<?php echo $row['subdistrict']; ?>" >
                    </div>
                    <div class="col">
                        <h5>District</h5>
                        <input type="text" id="inputdis" class="form-control" value="<?php echo $row['district']; ?>" >
                    </div>
                    <div class="col">
                        <h5>Province</h5>
                        <input type="text" id="inputprovice" class="form-control" value="<?php echo $row['provice']; ?>" >
                    </div>
                </div>
                <h5>Postal Number</h5>
                <input type="text" id="inputpostal" class="form-control" value="<?php echo $row['postal_num']; ?>" >
            </div>
            <div class="otherblock">

            </div>
            <p id="errorinput"></p>       
                <a id="save" class="btn btn-primary" type="button" name="submit" >Confirm</a>
                <a id="clear" class="btn btn-danger" onclick="cancel()">Cancel</a>
        </form>
    </div>
    <div class="warningbar" id="warningbar">
        <a href="#" class="closebtn" onclick="exit()">close</a>
        <p class="warningtext" id="warningtext" >Are you fuckin' gay?</p>
        <a href="?cus_email=<?php echo $row["cus_email"]; ?>" class="btn btn-danger" onclick="delconfirm()">ACCEPT</a>   
    </div>

    <form class="logoutbar" id="logoutbar" method="post">
        <a href="#" class="closebtn" onclick="logoutexit()">close</a>
        <p class="warningtext" id="warningtext" >Logout? Or Gay?</p>
        <button type="submit" name="logout" class="btn btn-danger">LOG OUT</button>   
    </form>

    <script src="js/user.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <script src="js/edituserselector.js"></script>
    <?php include 'php/module/footer.html' ?>
</body>
</html>
<?php mysqli_close($conn); ?>
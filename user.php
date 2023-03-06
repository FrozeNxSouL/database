<?php 
    require('php/connect.php');
    session_start();
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
            <?php include 'php/module/navbar.html'?>
        </header>
    </div>
    <div class="content-header">
        <ul class="nav-sub">
            <li><a class="nav-sublink" href="#" onclick="user(info)">Personal info</a></li>
            <li><a class="nav-sublink" href="#" onclick="user(transaction)">Transaction</a></li>
            <li><a class="nav-sublink" href="#" onclick="user(receipt)">Receipt</a></li>
        </ul>
        <p><?php $_SESSION['login']; ?></p>
    </div>
    <div id="info" class="content-main">
    <?php 
        // $data = $_SESSION["email"];
        // $sql = "SELECT * FROM customer WHERE email = '$data'";
        // $result = mysqli_query($conn,$sql);
        // $row = mysqli_fetch_array($result);

    ?>
        <div class="profile" id="profile">
            <h1>Profile</h1>
            <div class="nameblock">
                <span class="tt">NAME :</span>
                <label id="cus_name" class="cus_name"><?php echo $row["name"]; ?></label><br>
            </div>
            <div class="emailblock">
                <span class="tt">EMAIL :</span>
                <label id="cus_email" class="cus_email"><?php echo $row['email']; ?></label>
            </div>
            <div class="addressblock">
                <span class="tt">ADDRESS</span>
                <label id="cus_ad" class="cus_ad"><?php echo $row['address']; ?></label>
                <div class="addressfield">
                    <div class="subadfield">
                        <h5 class="adhead">Subdistrict</h5>
                        <label id="cus_subdis" class="cus_subdis"><?php echo $row['subdistrict']; ?></label>
                    </div>
                    <div class="subadfield">
                        <h5 class="adhead">District</h5>
                        <label id="cus_dis" class="cus_dis"><?php echo $row['district']; ?></label>
                    </div>
                    <div class="subadfield">
                        <h5 class="adhead">Province</h5>
                        <label id="cus_provice" class="cus_provice"><?php echo $row['provice']; ?></label>
                    </div>
                </div>
            </div>
            <div class="otherblock">

            </div>
            <div class="buttonblock">
                <button id="adjust-button" class="adjust-button">manage_accounts</button>
                <button id="del-button" class="del-button" onclick="config()">DELETE</button>
                <button id="logout-button" class="logout-button">Logout</button>
            </div>
        </div>

        <div class="profileconfigure" id="profileconfigure">
        <h1>Profile / configure</h1>
        <div class="nameblock">
        <span class="tt">NAME :</span>
        <label id="cus_name" class="cus_name"><?php echo $row["name"]; ?></label><br>
        </div>
        <div class="emailblock">
        <span class="tt">EMAIL :</span>
        <label id="cus_email" class="cus_email"><?php echo $row['email']; ?></label>
        </div>
        <div class="addressblock">
        <span class="tt">ADDRESS</span>
        <label id="cus_ad" class="cus_ad"><?php echo $row['address']; ?></label>
        <div class="addressfield">
            <div class="subadfield">
            <span class="adhead">Subdistrict</span>
            <label id="cus_subdis" class="cus_subdis"><?php echo $row['subdistrict']; ?></label>
            </div>
            <div class="subadfield">
            <span class="adhead">District</span>
            <label id="cus_dis" class="cus_dis"><?php echo $row['district']; ?></label>
            </div>
            <div class="subadfield">
            <span class="adhead">Province</span>
            <label id="cus_provice" class="cus_provice"><?php echo $row['provice']; ?></label>
            </div>
        </div>
        </div>
        <div class="otherblock">

        </div>
        <div class="buttonblock">
        <button id="adjust-button" class="adjust-button">manage_accounts</button>
        <button id="del-button" class="del-button" onclick="config()">DELETE</button>
        <button id="logout-button" class="logout-button">Logout</button>
        </div>
        </div>

        <div class="warningbar" id="warningbar">
        <h6 id="warningtext"></h6>
        </div>
        <?php
        // }
        ?>
        </div>
    </div>
    <div id="transaction" class="content-main">
        transaction
    </div>
    <div id="receipt" class="content-main">
        receipt
    </div>
    <script src="js/user.js"></script>
    <?php include 'php/module/footer.html' ?>
</body>
</html>
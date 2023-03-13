<?php
    session_start();
    require_once('php/connect.php');
    require_once('php/process.php'); 
    $storesql = "SELECT * FROM branch";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MC</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/store.css">
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

    <?php require('login-signin.php');
    
    $count=0;
                if(isset($_SESSION['cart']))
                {
                    $count=count($_SESSION['cart']);
                }

    ?>
    <div class="contain">
        <header id="header">
            <?php include 'php/module/navbar.php' ?>
        </header>
    </div>
    
    <div class="content-header">
        <div class="head-input">
            <form class="input-container" method="POST">
                
                <select name="select-province" id="select-province" class="select-province">
                    <?php
                        $provincesql = "SELECT name_th FROM provinces";
                        $province = $conn->query($provincesql);
                        while ($poption = mysqli_fetch_assoc($province))  {
                    ?>
                        <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                    <?php } ?>
                </select>

                <input type="text" class="searchbar" id="searchstore" name="search" placeholder="Search">
                <button type="submit" class="searchbtn" name="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="content-main">
        <div class="locatetype" >
            <a href="#" id="listview" class="listview" onclick="cdlist()">LIST VIEW</a>
            <a href="#" id="mapview" class="mapview" onclick="cdmap()">MAP VIEW</a>
        </div>
        <div id="listcontent" class="listcontent">
            <?php 
                if(isset($_POST['submit'])) {
                    $slpro = $_POST['select-province'];
                    $search = $_POST['search'];
                    if ($search == '') {
                        $storesql = "SELECT * FROM branch WHERE branch_province LIKE '%$slpro%'";
                    }
                    else {
                        $storesql = "SELECT * FROM branch WHERE branch_province LIKE '%$slpro%' AND (branchName LIKE '%$search%' OR branch_subdistrict LIKE '%$search%' OR branch_district LIKE '%$search%') ";
                    }    
                }
                $qr = $conn->query($storesql);
                while ($store = mysqli_fetch_assoc($qr)) {
            ?>
            <div class="itemcard">
                <h6><?php echo $store['branchName'] ?></h6>
                <p><?php echo $store['branch_address'];?> <?php echo $store['branch_subdistrict'];?>,<?php echo $store['branch_district'];?>,<?php echo $store['branch_province']; ?></p>
            </div>
            <?php } ?>
        </div>
        <div id="mapcontent" class="mapcontent">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.3312523723316!2d100.51073740510338!3d13.819137000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b877800c9af%3A0xd754c571fc7177b!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lie4Lij4Liw4LiI4Lit4Lih4LmA4LiB4Lil4LmJ4Liy4Lie4Lij4Liw4LiZ4LiE4Lij4LmA4Lir4LiZ4Li34Lit!5e0!3m2!1sth!2sth!4v1677977869587!5m2!1sth!2sth" width="780" height="760" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <script src="js/storelocate.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <script src="js/logincheckfunc.js" ></script>
    <script src="js/checkfunc.js" ></script>
    <script src="js/account.js"></script>
    <script src="js/alerts.js"></script>
    <?php include 'php/module/footer.html' ?>
</body>
</html>
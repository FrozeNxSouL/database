<?php 
    require('php/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MC</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/backdoor.css">
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
    
    <div class="content-header">
        <ul class="nav-sub">
            <li class="nav-subitem"><a class="nav-sublink" href="#">Banner</a></li>
            <li class="nav-subitem"><a class="nav-sublink" href="edit-user.php">User</a></li>
            <li class="nav-subitem"><a class="nav-sublink" href="edit-OurFood.php">Menu</a></li>
            <li class="nav-subitem"><a class="nav-sublink" href="#">Delivery</a></li>
        </ul>
    </div>

    <div class="contain">
        <header id="header"></header>
        <script src="js/header.js"></script>
    </div>
    
    <div class="content-container">
        <div class="button-set">
            <a href="#" class="topbutton" id="edit" onclick="cdedit()" >Update</a>
            <a href="#" class="topbutton" id="delete" onclick="cddelete()">Delete</a>
            <a href="#" class="topbutton" id="insert" onclick="cdinsert()">Insert</a>
            <a href="#" class="topbutton" id="print" onclick="cdprint()">Print</a>
        </div>
    </div>    
    <div class="print-container">
        <div class="print-area" id="print-area">
            <div class="print-cell" id="print-cell">
                <p class="tablehead"  >Name</p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="tablehead"  >Phone Number</p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="tablehead"  >Email</p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="tablehead"  >Address</p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="tablehead"  >Subdistrict</p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="tablehead"  >District</p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="tablehead"  >Province</p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="tablehead"  >Role</p>
            </div>
        </div>
        <?php
              $sql = "SELECT * FROM customer";
              $result = mysqli_query($conn,$sql);
              while  ($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="print-row" id="print-row">
            <div class="print-cell" id="print-cell">
                <p class="print-value" id="print-value"><?php echo $row["name"]; ?></p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="print-value" id="print-value"><?php echo $row["phone_num"]; ?></p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="print-value" id="print-value"><?php echo $row["email"]; ?></p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="print-value" id="print-value"><?php echo $row["address"]; ?></p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="print-value" id="print-value"><?php echo $row["subdistrict"]; ?></p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="print-value" id="print-value"><?php echo $row["district"]; ?></p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="print-value" id="print-value"><?php echo $row["provice"]; ?></p>
            </div>
            <div class="print-cell" id="print-cell">
                <p class="print-value" id="print-value"><?php echo $row["user_role"]; ?></p>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="insert-container">
        <div class="insert-form">
            <form class="insert-inside" method="POST">
                <h2>INSERT USER</h2>
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" >
                <input type="text" class="form-control" id="inputphonenum" name="phonenum" placeholder="Phone Number" >
                <input type="text" class="form-control" id="inputName" name="email" placeholder="Email" >
                <input type="text" class="form-control" id="inputphonenum" name="password" placeholder="Password" >
                <input type="text" class="form-control" id="inputaddress" name="address" placeholder="Address" >           
                <div class="outer">
                <div class="col">
                    <input type="text" class="form-control" id="inputsubdis" name="subdis" placeholder="Subdistrict">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="inputdis" name="dis" placeholder="District">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="inputprovice" name="province" placeholder="Province">
                </div> 
                </div>  
                <select id="adjust_role" class="form-select" name="user_role">
                <?php
                    $sql1 = "SELECT * FROM user_role";
                    $qr = $conn->query($sql1);
                    while ($role = mysqli_fetch_assoc($qr)) {
                ?>
                    <option value="<?php echo $role["role_id"]; ?>"><?php echo $role["role_name"]; ?></option>

                <?php } ?>
                </select>
                <div class="btn-insertform" >
                    <button type="submit" name="inserted" class="btn btn-primary">Add User</button> 
                    <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </form>
        </div>

        <?php
            if (isset($_POST['inserted'])) {
                $name= $_POST['name'];
                $password = $_POST['password'];
                $hashpass = md5($password) ;
                $email = $_POST['email'];
                $phonenum = $_POST['phonenum'];
                $address = $_POST['address'];
                $subdis = $_POST['subdis'];
                $dis = $_POST['dis'];
                $provice = $_POST['province']; 
                $role = $_POST['role'];

                $sqlinsert = "INSERT INTO customer(email,password,name,phone_num,address,subdistrict,district,provice,user_role) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sqlinsert)) {
                    echo "<script type='text/javascript'>alert('error');</script>";
                } 
                else {
                    mysqli_stmt_bind_param($stmt,"ssssssssi",$email,$hashpass,$name, $phonenum,$address,$subdis,$dis,$provice,$role);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    echo "<script type='text/javascript'>alert('INSERTED');</script>";
                }
            }
        ?>
    </div>
</body>
</html>
<?php 
    require('php/connect.php');
    $dissql = "SELECT name_th FROM amphures";
    $disqr = $conn->query($dissql);

    $subdissql = "SELECT name_th FROM districts";
    $subdisqr = $conn->query($subdissql);

    $prosql = "SELECT name_th FROM provinces";
    $proqr = $conn->query($prosql);
    
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
    
    <div class="contain">
        <header id="header">
            <?php include 'php/module/navbar.php'?>
        </header>
    </div>

    <?php include 'php/module/subnav-backdoor.html' ?>

    <div class="content-main">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>

        <tbody>

        <?php
              $sql = "SELECT * FROM branch";
              $result = mysqli_query($conn,$sql);
              while  ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row["branchName"]; ?></td>
                <td><?php echo $row["branch_address"]; ?><br><?php echo $row["branch_subdistrict"]; ?> <?php echo $row["branch_district"]; ?> <?php echo $row["branch_province"]; ?></td>
                <td><button class="btn btn-secondary">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>

        <?php
            }
        ?>
        </tbody>
        </table>
    </div>
    <div class="insert-container">
        <div class="insert-form">
            <form class="insert-inside" method="POST">
                <h2>INSERT BRANCH</h2>
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" >
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
                <div class="btn-insertform" >
                    <button type="submit" name="inserted" class="btn btn-primary">Add Branch</button> 
                    <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </form>
        </div>

        <?php
            if (isset($_POST['inserted'])) {
                $id = '';
                $name= $_POST['name'];
                $address = $_POST['address'];
                $subdis = $_POST['subdis'];
                $dis = $_POST['dis'];
                $province = $_POST['province']; 

                while ($row = mysqli_fetch_assoc($proqr)) {
                    if ($row['name_th'] != $provice) {
                        echo "<script type='text/javascript'>alert('wrongp');</script>";
                        break;
                    }
                    else {
                        while ($row1 = mysqli_fetch_assoc($disqr)) {
                            if ($row1['name_th'] != $dis) {
                                echo "<script type='text/javascript'>alert('wrongd');</script>";
                                break;
                            }
                            else {
                                while ($row2 = mysqli_fetch_assoc($subdisqr)) {
                                    if ($row2['name_th'] != $subdis) {
                                        echo "<script type='text/javascript'>alert('wrongs');</script>";
                                        break;
                                    }
                                    else {
                                        $sqlinsert = "INSERT INTO branch(branchID,branchName,branch_address,branch_subdistrict,branch_district,branch_province) VALUES ( ?, ?, ?, ?, ?, ?)";
                                        $stmt = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt,$sqlinsert)) {
                                            echo "<script type='text/javascript'>alert('error');</script>";
                                        } 
                                        else {
                                            mysqli_stmt_bind_param($stmt,"isssss",$id,$name,$address,$subdis,$dis,$province);
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_close($stmt);
                                            echo "<script type='text/javascript'>alert('INSERTED');</script>";
                                        }
                                    }
                                }
                            }
                        }
                    }

                }
            }
        ?>
    </div>
</body>
</html>
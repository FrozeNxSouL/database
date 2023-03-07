<?php 
   require('php/connect.php');
   
    $delete_id  = $_REQUEST['branchID'];

    $delsql = "
        DELETE FROM branch
        WHERE branchID = '$delete_id';
        ";

    $delbranchquery = mysqli_query($conn, $delsql);

    if (isset($_POST['add_menu'])) {
        $branchid = '';
        $branch_name = $_POST['branch_name'];
        $branch_address = $_POST['branch_address'];
        $branch_phone = $_POST['branch_phone'];
        $branch_subdis = $_POST['branch_subdistrict'];
        $branch_dis = $_POST['branch_district'];
        $branch_province = $_POST['branch_province'];

        $insertbsql = "INSERT INTO branch(branchID,branchName,branch_address,branch_subdistrict,branch_district,branch_province,branch_phone) VALUES (?,?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$insertbsql)) {
            echo    "<script>alert('Error');</script>";
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt,"issssss",$branchid,$branch_name,$branch_address,$branch_subdis,$branch_dis,$branch_province,$branch_phone);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    } 
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
        <form class="form-edit" method="POST" action="edit-branch.php">
            <div class="row g-3">
                <div class="col-12">
                        <input type="text" class="form-control" name="branch_name" placeholder="Name" required>
                </div>
                <div class="col-12">
                        <input type="text" class="form-control" name="branch_address" placeholder="Address" required>
                </div>
                <div class="col-12">
                        <input type="text" class="form-control" name="branch_phone" placeholder="Phone Number" required>
                </div>
                <div class="col-12">
                    <div class="input-group">
                    <select class="form-control" name="branch_subdistrict">
                            <?php
                                $subdistrictsql = "SELECT name_th FROM districts";
                                $subdistrict = $conn->query($subdistrictsql);
                                while ($poption = mysqli_fetch_assoc($subdistrict))  {
                            ?>
                                <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                            <?php } ?>
                        </select>

                        <select class="form-control" name="branch_district">
                            <?php
                                $districtsql = "SELECT name_th FROM amphures";
                                $district = $conn->query($districtsql);
                                while ($poption = mysqli_fetch_assoc($district))  {
                            ?>
                                <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                            <?php } ?>
                        </select>
                        <select class="form-control" name="branch_province">
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

                <div class="col-12">
                    <button class="btn btn-primary" type="submit" name="add_menu">Add new branch</button>
                    <button class="btn btn-danger" type="reset">Clear</button>
                </div>
            </div>
        </form>
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
                <td><a class="btn btn-secondary" href="edit-branch-info.php?branchID=<?php echo $row["branchID"]; ?>">Edit</a></td>
                <td><a class="btn btn-danger" href="?branchID=<?php echo $row["branchID"]; ?>" onclick="return confirm('Are you sure ?')">Delete</a></td>
            </tr>

        <?php
            }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>
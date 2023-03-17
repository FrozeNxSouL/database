<?php 
    session_start();
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
            <li><a class="nav-sublink" href="user.php">Personal info</a></li>
            <li><a class="nav-sublink" href="transaction.php">Transaction</a></li>
            <!-- <li><a class="nav-sublink" href="#">Receipt</a></li> -->
        </ul>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <table class="table text-center table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Order Date</th>
                        <th scope="col">food name</th>
                        <th scope="col">food price</th>
                        <th scope="col">food quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $data = $_SESSION['email'];
                            $query="SELECT order_manager.Order_Id,user_orders.food_quantity,order_manager.order_date,allfd.food_name,allfd.food_price FROM (SELECT food_menu.food_id,food_menu.food_name,food_menu.food_price FROM food_menu UNION SELECT set_id,set_name,set_price FROM set_menu) AS allfd JOIN user_orders ON user_orders.food_id = allfd.food_id JOIN order_manager ON user_orders.order_id = order_manager.order_id 
                            WHERE order_manager.cus_email = '$data'";
                            $user_result=mysqli_query($conn,$query);
                            while($user_fetch=mysqli_fetch_assoc($user_result))
                            {
                                
                                $all_name = $user_fetch['food_name'];
                                $totalprice = ($user_fetch['food_price'] * $user_fetch['food_quantity']);
                                echo"
                                <tr>
                                    <td>$user_fetch[order_date]</td>
                                    <td>$user_fetch[food_name]</td>
                                    <td>$totalprice</td>
                                    <td>$user_fetch[food_quantity]</td>
                                </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>
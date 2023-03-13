<?php
session_start();
require_once('php/connect.php');
require_once('php/process.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/OurFood.css">
    <title>MC</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</head>
<body>
    <?php require('login-signin.php'); 
    ?>
    <div class="contain">
        <header id="header">
            <?php require 'php/module/navbar.php' ?>
        </header>
    </div>
    <div class="content-header">
        
    </div>
    <div class="content-main">
        <div class="row">
            <div class="col-lg-9">
                <table class="table">
                    <thead class = "text-center">
                        <tr>
                        <th scope="col">Food ID</th>
                        <th scope="col">Food Name</th>
                        <th scope="col">Food Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    
                    <tbody class ="text-center" >
                        <?php
                            if(isset($_SESSION['cart']))
                            {
                                foreach($_SESSION['cart'] as $key => $value)
                                {
                                    echo"
                                        <tr>
                                            <td>$value[food_id]</td>
                                            <td>$value[food_name]</td>
                                            <td>$value[food_price]<input type='hidden' class='iprice' value = '$value[food_price]'></td>
                                            <td>
                                                <form action='manage_cart.php' method='POST'>
                                                    <button class='quantity-change' id='minus' onclick='qtyminus()' >do_not_disturb_on</button>
                                                    <input class='text-center iquantity' id='iquantity' name = 'Mod_Quantity' onchange='this.form.submit();' type='number' value = '$value[food_quantity]' min = '1' max='9999'>
                                                    <input type='hidden' name ='food_name' value='$value[food_name]'>
                                                    <button class='quantity-change' id='plus' onclick='qtyplus()'>add_circle</button>
                                                </form>
                                            </td>
                                            <td class = 'itotal'></td>
                                            <td>
                                                <form action='manage_cart.php' method='POST'>
                                                    <button name='Remove_Food' class='btn btn-sm btn-outline-danger'>REMOVE
                                                    <input type='hidden' name ='food_name' value='$value[food_name]'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">
                    <h4>Grand Total:</h4>
                    <h5 class = "text-center" id="gtotal"></h5>
                    <br>
                    <?php 
                        if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                        {
                    ?>
                    <form action ="purchase.php" method="POST">
                        <?php 
                            $data = $_SESSION['email'];
                            $sql = "SELECT * FROM customer WHERE cus_email = '$data'";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_array($result);
                        ?>
                        <div class="mb-3">
                            <label>Fullname</label>
                            <input type="text" value="<?php echo $row['name']; ?>" class="form-control" name="fullname" readonly="readonly">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" value="<?php echo $row['cus_email']; ?>" class="form-control" name="cus_email" readonly="readonly">
                        </div>
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="number" value="<?php echo $row['phone_num']; ?>" class="form-control" name="phone_no" readonly="readonly">
                        </div>
                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" value="<?php echo $row['address']; ?>" class="form-control" name="address" readonly="readonly">
                        </div>
                        <div class="mb-3">
                            <label>subdistrict</label>
                            <input type="text" value="<?php echo $row['subdistrict']; ?>" class="form-control" name="subdistrict" readonly="readonly">
                        </div>
                        <div class="mb-3">
                            <label>district</label>
                            <input type="text" value="<?php echo $row['district']; ?>" class="form-control" name="district" readonly="readonly">
                        </div>
                        <div class="mb-3">
                            <label>province</label>
                            <input type="text" value="<?php echo $row['provice']; ?>" class="form-control" name="province" readonly="readonly">
                        </div>
                        <div class="mb-3">
                            <label>postal_code</label>
                            <input type="text" value="<?php echo $row['postal_num']; ?>" class="form-control" name="postal_no" readonly="readonly">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_mode" value = "COD" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Cash On Delivery
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_mode" id="flexRadioDefault2" value="OPM" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Online Payment
                            </label>
                        </div>
                        <button class ="btn btn-danger" name="purchase">Make Purchase</button>
                    </form>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<!-- <script>
    const plus = document.querySelectorAll('#plus');
    const minus = document.querySelectorAll('#minus');
    const qty=document.querySelector('#iquantity');

    plus.forEach(element => {
        element.addEventListener('click', ()=> {
            let qtyplus = element.closest('.iquantity').value + 1;

            qty.setAttribute('value', qtyplus);
        })
    });
</script> -->
<script>
    var gt=0;
    var iprice=document.getElementsByClassName('iprice');
    var iquantity=document.getElementsByClassName('iquantity');
    var itotal=document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal')

    function subTotal()
    {
        gt=0;
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

            gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;
    }

    subTotal();

</script>
<?php include 'php/module/footer.html' ?>
<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="js/logincheckfunc.js" ></script>
<script src="js/checkfunc.js" ></script>
<script src="js/account.js"></script>
</body>
</html>
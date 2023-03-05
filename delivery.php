<?php
    require_once('php/connect.php');
    $storesql = "SELECT * FROM branch";
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/delivery.css"> 
    <title>MC</title>  
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
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
            <?php require 'php/module/navbar.html'?>
        </header>
    </div>
    <div class="content-header">

    </div>
    <?php
        $address = isset($_POST['address']) ? $_POST['address'] : '';
    ?>
    <div class = "content-area">
      <div class = "inputlocation">
          <form action = "delivery.php" method="post">
            <label for="address" class = "search"> Search Location</label>
            <input class = "searchlo"type="text"  name="address" placeholder="Search Location">
            <input class = "butlo" type="submit" value="CONFIRM DELIVERY LOCATION" >
          </form>
      </div>
      <?php
        $addressinput = $_POST['address'];
        if (!empty($address)) {
          require('php/connect.php');
          $query = "SELECT * FROM branch WHERE branch_province = '$addressinput' OR branchName = '$addressinput' OR branch_subdistrict = '$addressinput' OR branch_district = '$addressinput' ";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {?>
      <div class ="branchbg">
      <div class="branchcon">
          <div class="textavailable">
            Available branches for delivery <img src ="assets/delivery-icon.png" class ="delivery-icon">
          </div>    
          <?php while ($row = mysqli_fetch_array($result)) { ?>   
      
          <div class = "col-xs-12 col-sm-6 col-md-4  branchdiv">  
              <div class="branchinfo">
                <div class = "bname"><?php echo $row['branchName'];?></div> 
                <div class = "info">
                      <img src ="assets/icon_location_address.png" class = "iconinfo">
                      <div>  
                        <?php echo $row['branch_subdistrict'];?> 
                        <?php echo $row['branch_district'];?>  
                        <?php echo "yee";?>  
                        <?php echo $row['branch_province'];?>
                      </div>
                </div>
                <div class = "info">
                      <img src = "assets/icon_location_phone.png"class = "iconinfo">
                      <div style = "color :#337ab7">
                        <?php echo "olo";?>
                      </div>  
                </div> 
              </div>  
          </div> 
                   
          <?php   
                }
              } else {
          ?>
          <div class = "branchnotfound"> 
              <img src ="assets/delivery-icon.png" class ="delivery-icon">
              <?php echo "Sorry, this location not available for delivery";?>
          </div>
      <?php    }
          mysqli_close($conn);
        }
      ?>
      </div>  
      </div>  
    </div>
    <?php include 'php/module/footer.html' ?>
  </body>
</html>
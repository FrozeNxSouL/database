<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/delivery.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <title>Mc</title>
  </head>
  <body>
    <header id="header"></header>
    <script src="js/header.js"></script>
    <?php
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    ?>
    <div class="content-header">

    </div>
    <div class = "content-main">
      <div class = "inputlocation">
          <form action = "delivery.php" method="post">
            <label for="address" class = "search"> Search Location</label>
            <input class = "searchlo"type="text"  name="address">
            <input class = "butlo" type="submit" value="CONFIRM DELIVERY LOCATION" >
          </form>
      </div>
      <?php
        if (!empty($address)) {
          require('php/connect.php');
          $query = "SELECT * FROM branches WHERE  branch_name LIKE '%$address%' OR  district LIKE '%$address%' OR sub_district LIKE '%$address%' OR province LIKE'%$address%'";
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
                <div class = "bname"><?php echo $row['branch_name'];?></div> 
                <div class = "info">
                      <img src ="assets/icon_location_address.png" class = "iconinfo">
                      <div>  
                        <?php echo $row['sub_district'];?> 
                        <?php echo $row['district'];?>  
                        <?php echo $row['postal_code'];?>  
                        <?php echo $row['province'];?>
                      </div>
                </div>
                <div class = "info">
                      <img src = "assets/icon_location_phone.png"class = "iconinfo">
                      <div style = "color :#337ab7">
                        <?php echo $row['Phone'];?>
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
    <footer id="footer"></footer>
    <script src="js/footer.js"></script>
  </body>
</html>

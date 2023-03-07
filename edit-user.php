<?php 
   require('php/connect.php');

    // delete function 
    $delete_mail  = $_REQUEST['cus_email'];

    $delmailsql = '
        DELETE FROM customer
        WHERE cus_email = ' . $delete_mail . ';
        ';

    $delmailquery = mysqli_query($conn, $delmailsql);

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
                  <th scope="col">Email</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Address</th>
                  <th scope="col">Role</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql = "SELECT * FROM customer";
                  $result = mysqli_query($conn,$sql);
                  while  ($row = mysqli_fetch_assoc($result)) {
                  ?>
               <tr>
                  <td><?php echo $row["cus_email"]; ?></td>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["phone_num"]; ?></td>
                  <td><?php echo $row["address"]; ?><br><?php echo $row["subdistrict"]; ?> <?php echo $row["district"]; ?> <?php echo $row["provice"]; ?></td>
                  <td><?php echo $row["user_role"]; ?></td>
                  <td><a class="btn btn-secondary">Edit</a></td>
                  <td><a class="btn btn-danger" href="?cus_email=<?php echo $row["cus_email"]; ?>">Delete</a></td>
               </tr>
               <?php
                  }
                  ?>
            </tbody>
         </table>
      </div>
      </div>
      </div>
      <?php include 'php/module/footer.html' ?>
   </body>
</html>
<?php 
    mysqli_close($conn);
?>
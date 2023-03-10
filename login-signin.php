

<div class="sign-form" id="sign-form">
<form class="row g-3 sign-up" id="sign-up-form"  method="POST">
    <h1>SIGN UP</h1>
    <div class="mb-3">
        <label for="inputName" class="form-label">ชื่อ</label>
        <input type="text" class="form-control" id="inputName" name="name">
        <label for="inputName" class="form-label">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" id="inputphonenum" name="phonenum">
    </div>
    <div class="mb-3">
        <label for="sign-up-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="sign-up-email" name="email">
        <label for="sign-up-pw" class="form-label">Password</label>
        <input type="password" class="form-control" id="sign-up-pw" name="password">
    </div>
    <div class="mb-3">
        <label for="inputCity" class="form-label">ที่อยู่</label>
        <input type="text" class="form-control" id="inputaddress" name="address">
    </div>
    <div class="outer">
      <div class="col">
        <label for="sign-up-subdistrict" class="form-label">ตำบล</label>
        <input list="listsubdis" class="form-control" id="inputsubdis" >
        <datalist id="listsubdis">
              <?php
                  $subdistrictsql = "SELECT name_th FROM districts WHERE name_th NOT LIKE '%*%'";
                  $subdistrict = $conn->query($subdistrictsql);
                  while ($poption = mysqli_fetch_assoc($subdistrict))  {
              ?>
                  <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
              <?php } ?>
        </datalist>
      </div>
      <div class="col">
        <label for="sign-up-district" class="form-label">อำเภอ</label>
        <input list="listdis" class="form-control" id="inputdis" >
        <datalist  id="listdis">
              <?php
                  $districtsql = "SELECT name_th FROM amphures WHERE name_th NOT LIKE '%*%'";
                  $district = $conn->query($districtsql);
                  while ($poption = mysqli_fetch_assoc($district))  {
              ?>
                  <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
              <?php } ?>
        </datalist>
      </div>
      <div class="col">
        <label for="sign-up-district" class="form-label">จังหวัด</label>
        <input list="listprovice" class="form-control" id="inputprovice" >
          <datalist id="listprovice">
                  <?php
                      $provincesql = "SELECT name_th FROM provinces";
                      $province = $conn->query($provincesql);
                      while ($poption = mysqli_fetch_assoc($province))  {
                  ?>
                      <option value="<?php echo $poption['name_th']; ?>"><?php echo $poption['name_th']; ?></option>
                  <?php } ?>
          </datalist>
      </div> 
    </div>  
      <div class="mb-3">
        <label for="sign-up-district" class="form-label">รหัสไปรษณีย์</label>
        <input list="listpostal" class="form-control" id="inputpostal">
        <datalist id="listpostal">
                  <?php
                      $postsql = "SELECT zip_code FROM districts WHERE zip_code != 0";
                      $postqr = $conn->query($postsql);
                      while ($poption = mysqli_fetch_assoc($postqr))  {
                  ?>
                      <option value="<?php echo $poption['zip_code']; ?>"><?php echo $poption['zip_code']; ?></option>
                  <?php } ?>
          </datalist>
      </div>  
    <p id="errorinput"></p>
    <button type="button" name="submit" class="btn btn-danger btn-form" id="submitsignin">Sign up</button> 
</form>

<form class="sign-in" id="sign-in-form" method="POST" >
    <h1>Login</h1>
    <div>
      <div class="mb-3">
        <input type="email" class="form-control" id="exampleInputEmail1" name="acc" placeholder="EMAIL ACCOUNT" >
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" id="exampleInputPassword1" name="acc_password" placeholder="PASSWORD" >
      </div>
    </div>
    <a href="#" id="errorinput1" class="e3"></a>
    <button type="button" name="submit" class="btn btn-danger btn-form" id="submitlogin">login</button>
    <p>No Account? <a href="#" style="color: #ffc600" onclick="signup()">SIGN UP</a></p>
</form>
</div>
<div class="sign-bg" id="sign-opt-bg"></div>
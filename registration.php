<?php include 'header.php'; ?>
  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="design-box">
      <img src="images/design-2.png" alt="">
    </div>
    <div class="container ">
      <div class="">
        <h2 class="">
          Registration Form
        </h2>
      </div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         <form method="POST" enctype="multipart/form-data" style="text-align:center";>

    <label for="ufname">Enter user first name</label><br>
   <input type="text" id="ufname" name="ufname"><br>

   <label for="umname">Enter user middle name</label><br>
   <input type="text" id="umname" name="umname"><br>
   
    <label for="ulname">enter user last name</label><br>
   <input type="text" id="ulname" name="ulname"><br>

    <label for="uusername">enter user name</label><br>
   <input type="text" id="uusername" name="uusername"><br>
   
   <label for="uemail">enter user email</label><br>
   <input type="text" id="uemail" name="uemail"><br>

   <label for="uphone_no">enter user phone_no</label><br>
   <input type="text" id="uphone_no" name="uphone_no"><br>

   <label for="upassword"> enter user  password</label><br>
   <input type="password" id="upassword" name="upassword"><br>

   <label for="uconfirm_password">enter user confirm password</label><br>
   <input type="password" id="uconfirm_password" name="uconfirm_password"><br>

   <label for="uaddress"> enter user adress</label><br>
   <textarea id="uaddress" name="uaddress"rows="5" cols="20"></textarea><br>

   <button name="signup" id="signup">
    Signup
   </button>
    <button name="cancel" id="cancel" href="index.php">Cancel</button>

  <br>

  </form>

   <?php

// If upload button is clicked ...
if (isset($_POST['signup'])) 
{
 
    $ufname = $_POST["ufname"];
    $umname = $_POST["umname"];
    $ulname = $_POST["ulname"];
    $uusername = $_POST["uusername"];
    $uemail = $_POST["uemail"];
    $uphone_no = $_POST["uphone_no"];
    $upassword = $_POST["upassword"];
    $uconfirm_password = $_POST["uconfirm_password"];
    $uaddress = $_POST["uaddress"];
    if($upassword==$uconfirm_password)
    {

    $db = mysqli_connect("localhost", "root", "", "doabatrendzdb");
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO user_tb (ufname,umname,ulname,uusername,uemail,uphone_no,upassword,uaddress)VALUES('$ufname','$umname','$ulname','$uusername','$uemail','$uphone_no','$upassword','$uaddress')";
   mysqli_query($db, $sql);
  echo '<script> alert("you have registered sucessfully");</script>';   
   
}

  else{
    echo '<script> alert("uconfirm_password is not equal to upassword");</script>';
  }
}
?>









        </div>
        
      </div>
    </div>
  </section>

  <!-- end contact section -->
<?php include 'footer.php';?>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>
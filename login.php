<?php include 'header.php';?>

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="design-box">
      <img src="images/design-2.png" alt="">
    </div>
    <div class="container ">
      <div class="">
        <h2 class="">
          login
        </h2>
      </div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST">

            <div>
              <input type="text" placeholder="username" name="uusername" id="uusername" />
            </div>
            <div>
              <input type="password" placeholder="password" name="upassword" id="upassword"/>
            </div>
            <div class="d-flex ">
              <button name="login" id="login">
                login
              </button>
            </div>
          </form>
          <?php

// If upload button is clicked ...
if (isset($_POST['login'])) 
{
   $uusername = $_POST["uusername"];
    $upassword = $_POST["upassword"];
     $db = mysqli_connect("localhost", "root", "", "doabatrendzdb");
     $sql="select * from  user_tb";
  $result=mysqli_query($db,$sql);
  while($data=mysqli_fetch_assoc($result))
  {
    if ($data['uusername']==$uusername & $data['upassword']==$upassword)
    {
     echo '<script> alert("you have login sucessfully");</script>';   
     $_SESSION['uusername']=$uusername;
     $_SESSION['upassword']=$upassword;
     break;

    }
     else{
    echo '<script> alert("login not sucessfully");</script>';
  }

  
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
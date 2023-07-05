<?php include 'header.php'; ?>

  <!-- item section -->

  <div class="item_section layout_padding2">
    <div class="container">
      <div class="item_container">
        <div class="box">
          <div class="price">
            
      </div>
    </div>
  </div>

  <!-- end item section -->


  <!-- price section -->

  <section class="price_section layout_padding">
    <div class="container">
      <div class="heading_container"><h2>
          Our suits prices
        </h2>
      </div>
        <div class="price_container">
       
<?php
  $db = mysqli_connect("localhost", "root", "", "doabatrendzdb");
  $sql="select * from protb";
  $result=mysqli_query($db,$sql);
  while($data=mysqli_fetch_assoc($result))
  {
 
?>
        <div class="box">
          <div class="name">
            <h6>
              <?php   echo $data['pname'] ?>
            </h6>
          </div>
          <div class="img-box">
            <img src="images/<?php   echo $data['pimage1'] ?>" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Rs.<span> <?php   echo $data['pprice'] ?></span>
            </h5>
            <a href="viewproduct.php?id=<?php echo $data['id'] ?>" >
              Buy Now
            </a>
          </div>
        </div>
<?php
}
?>


     
          </div>
        </div>
      </div>
          
      <div class="d-flex justify-content-center">
        <a href="" class="price_btn">
          See More
        </a>
      </div>
    </div>
  </section>

  <!-- end price section -->





<?php include 'footer.php';?>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>
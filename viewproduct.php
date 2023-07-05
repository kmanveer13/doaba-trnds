<?php include 'header.php'; ?>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Doaba Trendz</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
  <?php
  $id=$_GET['id'];
  $db = mysqli_connect("localhost", "root", "", "doabatrendzdb");
  $sql="select * from protb where id=$id";
  $result=mysqli_query($db,$sql);
  while($data=mysqli_fetch_assoc($result))
  {
 
?>
	<div class="container">
	<div class="row">
		<div class="col-md-12" style="text-align:center;"> <br>
			<h2 style="background-color:orange; margin-left: 300px; margin-right: 300px;"> View Product</h2><br>

	</div>
	</div>
	<div class="row">

		<div class="col-md-4">
			<img src="images/<?php   echo $data['pimage1'] ?>" alt="#" style="width:300px; height:300px; border:solid 5px black;" />
		</div>
		<div class="col-md-4">
			<img src="images/<?php   echo $data['pimage2'] ?>" alt="#"style="width:300px; height:300px;border:solid 5px black;"/>
		</div>
		<div class="col-md-4">
			<img src="images/<?php   echo $data['pimage3'] ?>" alt="#"style="width:300px; height:300px;border:solid 5px black;"/>
		</div>
	</div>
	<div class="row" > 
 <div class="col-md-6"  style="text-align:left; border: '2px solid'; float:left">
<h1 style="text-align:left;padding-top:55px;"> <?php   echo $data['pname'] ?> </h1>
<h3 style="color:#fbb534;"> Rs.<?php   echo $data['pprice'] ?> </h3>
<h5><?php   echo $data['pcompany'] ?></h5>
<h5><?php   echo $data['pquantity'] ?></h5>
  </div>
<div class="col-md-6" style="text-align:center;  display: block; border: '3px solid;"> 
	<h1 style="text-align:center;padding-top:55px;">Description</h1>

  <p style=" text-align: justify;
  text-justify: inter-word;"> <?php   echo $data['pdescription'] ?></p></div></div>
  <div class="row">
  	<div class="col-md-6" style=" padding-top:25px;">
       <form method="POST">
  <h5 style="text-align:center;background-color:black;margin-right:200px;margin-left:200px; padding-top:15px; padding-bottom:15px;" > <button name="addtocart" id="addtocart">
    Add to Cart
  </button></h5>
  	</div>
 
  <div class="col-md-6" style=" padding-top:25px;">
   
  <h5 style="text-align:center;background-color:black;margin-right:200px;margin-left:200px; padding-top:15px; padding-bottom:15px;" ><button name="Shop" id="Shop">
    Shop Now </button></h5>
  	</form>
    </div>
  </div></div>
  <?php

 if (isset($_POST['addtocart']))
 {
  
  if (isset($_SESSION['cart'])) 
    {
      
      $myitems=array_column($_SESSION ['cart'],'id');
      if(in_array($data['id'],$myitems))
      {
 
 echo '<script> alert("already added");</script>';
 echo '<script> window.location("viewproduct.php");</script>';
      }  
else  {
 $count=count($_SESSION['cart']);
    $_SESSION['cart'][$count]=array("id"=>$data['id'],"pname"=>$data['pname'],"pprice"=>$data['pprice'],"pquantity"=>$data['pquantity'],"pimage1"=>$data['pimage1']);
    print_r($_SESSION['cart']);



echo '<script> alert("added sucessfully");</script>';
 echo '<script> window.location("viewproduct.php");</script>';
      }}
  else
  {
    $_SESSION['cart'][0]=array("id"=>$data['id'],"pname"=>$data['pname'],"pprice"=>$data['pprice'],"pquantity"=>$data['pquantity'],"pimage1"=>$data['pimage1']);
    print_r($_SESSION['cart']);
    echo '<script> alert("add to sucessfully");</script>';
 echo '<script> window.location("viewproduct.php");</script>';
  }
}

 
}

?>

 <?php include 'footer.php'; ?>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

</body></html>

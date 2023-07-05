<?php 
session_start();


if($_SERVER["REQUEST_METHOD"]=="POST")
{


   if (isset($_POST['purchase']))
    {

 
 
 $fullname=$_POST['fullname'];
 $phone_no=$_POST['phone_no'];
 $address=$_POST['address'];
 $pay_mode=$_POST['pay_mode'];


    

  //parse Product deatils from html to php using POST method
   
     $db = mysqli_connect("localhost", "root", "", "doabatrendzdb");
 
 
    // Get all the submitted data from the form
$sql="INSERT INTO order_manger( fullname, phone_no, address, pay_mode) VALUES ('$fullname','$phone_no','$address','$pay_mode')";
 
    // Execute query
    
  if (mysqli_query($db,$sql)) 
  {
  //to get recent autu generated id
   $order_id=mysqli_insert_id($db);
   //Query template made
   $sql2="INSERT INTO user_order(order_id,productname,productprice,productquantity) VALUES (?,?,?,?)";
   // query prepare
   $stmt=mysqli_prepare($db,$sql2);

   //check whether query prepared or not
   if($stmt)
   {
      //bind real parameters with prepared query
      mysqli_stmt_bind_param($stmt,"isii",$order_id, $productname, $productprice, $productquantity);


      foreach($_SESSION['cart'] as $key => $value)
      {
          $productname=$value['pname'];
          $productprice=$value['pprice'];
         $productquantity=$value['pquantity'];
         //fire or execute prepared query after binding parametrs
        mysqli_stmt_execute($stmt);
      }
      unset($_SESSION['cart']);
       echo "<script>alert('order placed successfully');
                      window.location.href='index.php';
                      </script>";
   }
   else
   {
      echo "stmt not Prepare";
     
   }



}


else{

echo "ERROR: Could not able to execute $sql. "
        .mysqli_error($sql);


}
}
}



?>

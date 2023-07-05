<?php include 'header.php';?>

<style>
  @media print
  {
    .btn
    {
      display: none;
    }
    .rm
    {
      display: none;
    }
    .spquantity
    {
      border: 0px;
    }


  }
</style>
 <div class="container ">
      <div class="row">
        <div class="col-md-12 text-center border rounded lg-light my-5">
        <h3 class="" style="text-align:center ">
        MY  CART
        </h3 >
      </div>
      </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-9" >
        <table style="width:100%; margin-bottom:65px";>
            <tr>
                <th>Product id</th>
                <th>Product name</th>
                <th>Product price</th>
                <th>Product quantity</th>
                <th>Product image</th>
                <th>Total</th>
                <th class="rm">Remove</th>
           </tr>


           <?php 

            foreach ($_SESSION['cart'] as $key => $value)
             {
                              
           //print_r($_SESSION['cart']);
            ?>
           <form method="POST">
           <tr>
                <td> <?php echo $value['id'];?> </td>

                <td> <?php echo $value['pname'];?> </td>

                <td> 
                <?php echo $value['pprice'];?>
                <input type="hidden" class="ipprice" value="<?php echo $value['pprice'];?>">

              </td>
                <td>

                  <input class="spquantity" onchange="subTotal()" type="number"   value="1" min="1" max="<?php echo $value['pquantity'];?>">

                  <input type="hidden" name="pname" value="$value[pname]">
              
                  
                </td>
                <td> 

                  <img src="images/<?php echo $value['pimage1'];?>" style="width:100px; height:100px; border:solid 2px black;"> 
                </td>

                  <td class ="itotal">
                    
                 </td> 
                  <td>
                  <button name="remove" class="btn btn-sm btn-outline-danger">Remove</button>
                <input type="hidden" name="pname" value="$value[pname]">
              
                </td>
              
           </tr>
               </form>

<?php 

} 
 if (isset($_POST['spquantity'])) 
                   {
                    foreach($_SESSION['cart'] as $key => $value)
                    {
                      if($value['pname']==$_POST['pname']);
                      {
                         $_SESSION['cart'][$key]['pquantity']=$_POST['spquantity'];

                         print_r($_SESSION['cart']);
                      //echo "<script>
                      //window.location.href='cart.php';
                      //</script>";
                      }
                    }
                   }



?>

 
      </table>
    </div>

    <div class="col-sm-3">
        <div class="container">
            <div class="row" >
                <div class="col-sm-12">
                  
                  <h4>GRAND TOTAL:</h4><br>
                  <h4 id="gtotal"> </h4>
                
                </div>


           </div>
          

          
          </div>
          <div class="row" >
                <div class="col-sm-12">
                  <?php 
                  if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                   {
                  ?>
                  <form method="POST" action="purchase.php">   
                  <div class="form-group">  
                    <label>Fullname</label>
                    <input type="text" name="fullname" required>
                  </div>
                  <div class="form-group">  
                    <label>Phone_no</label>
                    <input type="number" name="phone_no" required>
                  </div>
                  <div class="form-group">  
                    <label>Address</label>
                    <input type="text" name="address" required>
                  </div>
                  <div class="form-check">  
                    <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2" >cash on delivery</label>
                  </div>
                
      <button class=" btn btn-sm btn-outline-danger" name="purchase"><h5>PURCHASE</h5></button>
       <button class="btn btn-sm btn-outline-danger" name="purchase" onclick="GetPrint()"><h5>PRINT</h5></button>
                   </form>
                   <?php
                 }
                 ?>

                   <?php
                   if (isset($_POST['remove'])) {
                    foreach($_SESSION['cart'] as $key => $value)
                    {
                      unset($_SESSION['cart'][$key]);
                      
                      $_SESSION['cart']=array_values($_SESSION['cart']);
                      echo "<script>alert('item removed');
                      window.location.href='cart.php';
                      </script>";
                      
                    }
                   }
                  

                  


                      
                             
             

?>
                </div>

          
          </div>
      </div>
  </div>
</div>
</div>
</div>
<script>
  var gtotal=document.getElementById('gtotal');
 var itotal =document.getElementsByClassName('itotal');
 var spquantity=document.getElementsByClassName('spquantity');
var ipprice=document.getElementsByClassName('ipprice');

  function subTotal()
  {
    gtotal=0;
    for (let i=0; i<ipprice.length; i++)
    {
      itotal[i].innerHTML=ipprice[i].value*spquantity[i].value;
      gtotal=gtotal+ (ipprice[i].value*spquantity[i].value);
    }
     document.getElementById('gtotal').innerHTML=gtotal;
    }
    subTotal();
  function GetPrint()
  {
    window.print();
  }
</script>
 <?php include 'footer.php';?>
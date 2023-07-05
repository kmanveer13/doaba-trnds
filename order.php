<?php include 'adminheader.php';



?>


                          <div class="container-fluid">
                        <div class="row px-xl-5">
                         <div class="col-lg-12 table-responsive mb-5">
                             <table class="table table-light table-borderless table-hover text-center mb-0">
                             <thead class="thead-dark">
                             <tr>
                             <th>Order Id</th>
                            <th>productname</th>
                            <th>productprice</th>
                            <th>productquantity</th>
                               
                             </tr>
                             </thead>
                             <tbody class="align-middle">
                            <?php 

                            $id=$_POST['order_id'];
                         $db = mysqli_connect("localhost", "root", "", "doabatrendzdb");
                        $query = " SELECT * FROM user_order where order_id=$id"  ;
                         $result = mysqli_query($db, $query);
        
                         while ($data = mysqli_fetch_assoc($result)) {
            
        
          ?> 
                            <tr>
                            <td class="align-middle"><?php echo $data['order_id'] ?> </td>
                            <td class="align-middle"><?php echo $data['productname'] ?> </td>
                            <td class="align-middle"><?php echo $data['productprice'] ?></td>
                            <td class="align-middle"><?php echo $data['productquantity'] ?></td>
                            </tr>
                            <?php
                             }
                             ?>
                             
                             
                            

                </tbody>
                </table>

            </div>
        </div>
    </div>
                    <form  method="POST">
                                    <button class="btn btn-sm btn-danger float-right mr-5" name="complete" > Order Complete</button>
                                  <input type="hidden" name="o_id" value="<?php echo $_POST['order_id'];?>">

                                </form>


        <?php

        if(isset($_POST['complete']))
        {
                        $o_id=$_POST['o_id'];
                        echo $o_id;
                         $db = mysqli_connect("localhost", "root", "", "doabatrendzdb");
                       
                        $query2 = "UPDATE order_manger SET status='complete' WHERE order_id=$o_id ";
                         if(mysqli_query($db, $query2))
                           {
                             echo "<script>  alert('Order Complete');
                          window.location.href='adminpanel.php';
                             </script>" ;
                           }
                           else
                           {
                               echo "ERROR: could not able to execute $query2".mysqli_error($db) ;
                           }


        }
        ?>

                         
   


<?php include 'footer.php';?>

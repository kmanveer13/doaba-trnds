
<?php include 'adminheader.php';?>

    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order Id</th>
                            <th> Fullname</th>
                             <th>Phone_no</th>   
                            <th>Address</th>
                            <th>Pay_mode</th>
                            <th>Status</th>
                               <th>View</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                         <?php 
         $id=$_POST['order_id'];
        $db = mysqli_connect("localhost", "root", "", "doabatrendzdb");
        $query = " SELECT * FROM order_manger where status ='pending'  ORDER BY order_manger.date ASC"  ;
        $result = mysqli_query($db, $query);
        
        while ($data = mysqli_fetch_assoc($result))
         {
            
        
       ?> 

                        <tr>
                            <td class="align-middle"><?php echo $data['order_id'] ?> </td>
                            <td class="align-middle"><?php echo $data['fullname'] ?> </td>
                            <td class="align-middle"><?php echo $data['phone_no'] ?></td>
                            <td class="align-middle"><?php echo $data['address'] ?></td>
                             <td class="align-middle"><?php echo $data['pay_mode'] ?></td>
                            <td class="align-middle"><?php echo $data['status'] ?></td>
                            <td class="align-middle"> 
                                <form action="order.php" method="POST">
                                    <button class="btn btn-sm btn-danger" name="view">View</button>
                                    <input type="hidden" name="order_id" value="<?php echo $data['order_id'] ?> ">
                                </form>

                            </td>
                        </tr>
       <?php
         }  
         ?> 

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>


   

   


<?php include 'footer.php';?>

















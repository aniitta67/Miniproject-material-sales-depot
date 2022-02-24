<?php require('menu.php'); ?>


<?php

   // require('../connection.php');
   include('../connection.php');

    

  //$sql="SELECT a.*,b.item_name,c.image,d.name,b.cgst,b.sgst FROM `ordertab` as a,material_det as b,payment as c,customer as d WHERE a.matid=b.matid and a.ordid=c.ordid and a.customer_id=d.customer_id and a.status='Paid'";
 
$sql="SELECT * FROM `payment` where status='Accept'";
 $result=$con->query($sql);
  // $row=mysqli_fetch_assoc($result)




   
?>

         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6 animated bounceInRight">
                        <h1 class="m-0"><span class=""></span> Orders</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">View Stock</li>
                        </ol>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Material informations</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
               <table class="table table-striped"  align="center"  width="100%">

                  <thead>
                    <th>Slno</th>
                    <!-- <th>Date</th> -->
                    <!-- <th>OrderNo</th> -->
                   
                              
                    <th>Name</th>
                    <th>Email</th>
                   
                    <th>Phone</th>
					 <th>Address</th>
                    <th>Status</th>
                    
                    <th>Image</th>
                    <th></th>
                    <th></th>
                    
                  </thead>

                     <?php 
                     $slno=0;
                    while($row=mysqli_fetch_assoc($result))
                    {
                      $slno+=1;
                      $idd=$row['payid'];
                    /*  $mid=$row['cname'];
                      $qt=$row['qty'];
                      $cg=($row['cgst']/$row['price'])*100;
                      $sg=($row['sgst']/$row['price'])*100;
                      $pr=$row['price']+$cg+$sg;
                      $price=round($pr*$row['qty'],2);
                      $stat=$row['status'];
                      // $tot=$tot+$price;
					  */

                  ?>

                  <tr>
                    <td>
                      <?php echo $slno ?>
                    </td>
                 
                    <td>
                      <?php echo $row['cname'] ?>
                    </td>

                    <td>
                      <?php echo $row['cemail'] ?>
                    </td>

                    <td>
                      <?php echo $row['cphone'] ?>
                    </td>
                    <td>
                      <?php echo $row['caddress'] ?>
                    </td>
					 <td>
                      <?php echo $row['status'] ?>
                    </td>
					 
                  <td>
                      <img src="<?php echo $row['image'] ?>" style="width:150px;height:100px;"/>
                    </td>

                  
                  
                   
                    <td>
                     <td><a href="selection-create.php?id=<?php echo $idd; ?>&status=Accept""><i class="fas fa-edit"></i>Notification</a><br><br>
					 <a href="selection-create?id=<?php echo $idd; ?>&status=Reject""><i class="fas fa-edit"></i>Delivered</a>
			<!--		 <a href="#"><i class="fas fa-edit"></i>Deatils</a>-->
					 
					 
					 </td>



                    <td>
                         <?php
						 /*
                          if($stat!='Reject')
                            {
                         ?>
                            <a href="admin_reject_order.php?id=<?php echo $idd; ?>&qty=<?php echo $qt  ?>&mid=<?php echo $mid  ?>"><i class="fas fa-trash"></i>Reject</a></td>
                          <?php
						 
                            }
							 */
                            ?>
                    </td>
                    

                  </tr>

                  <?php
                    }
                  ?>
                  </table>
              
              
            </div>
               </div>
               <!-- /.container-fluid -->
            </section>
           
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>

   </body>
</html>
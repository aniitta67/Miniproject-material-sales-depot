<?php require('menu.php'); ?>


<?php

   // require('../connection.php');
   include('../connection.php');

    

  $sql="SELECT a.*,b.item_name,c.image,d.name,b.cgst,b.sgst FROM `ordertab` as a,material_det as b,payment as c,customer as d WHERE a.matid=b.matid and a.ordid=c.ordid and a.customer_id=d.customer_id and a.status='Paid'";
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
                        <h1 class="m-0"><span class=""></span> View Materials</h1>
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
                    <th>Material</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Phone</th>
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
                      $idd=$row['ordid'];
                      $mid=$row['matid'];
                      $qt=$row['qty'];
                      $cg=($row['cgst']/$row['price'])*100;
                      $sg=($row['sgst']/$row['price'])*100;
                      $pr=$row['price']+$cg+$sg;
                      $price=round($pr*$row['qty'],2);
                      $stat=$row['status'];
                      // $tot=$tot+$price;

                  ?>

                  <tr>
                    <td>
                      <?php echo $slno ?>
                    </td>
                    <!-- <td>
                      <?php echo $row['date'] ?>
                    </td> -->
                    <!-- <td>
                      <?php echo $row['ordid'] ?>
                    </td> -->

                    <td>
                      <?php echo $row['item_name'] ?>
                    </td>

                    <td>
                      <?php echo $row['qty'] ?>
                    </td>
                    <td>
                      <?php echo $row['price'] ?>
                    </td>
                    <td>
                      <?php echo $price ?>
                    </td>
                  
                    <td>
                      <?php echo $row['name'] ?>
                    </td>
                    <td>
                      <?php echo $row['address'] ?>
                    </td>
                    <td>
                      <?php echo $row['ph'] ?>
                    </td>
                    <td>
                      <?php echo $row['status'] ?>
                    </td>
                                      
                    <td>
                      <img src="<?php echo $row['image'] ?>" style="width:150px;height:100px;"/>
                    </td>

                    <td>
                      <td><a href="admin_accept_order.php?id=<?php echo $idd; ?>"><i class="fas fa-edit"></i>Accept</a></td>



                      <td>
                         <?php
                          if($stat!='Reject')
                            {
                         ?>
                            <a href="admin_reject_order.php?id=<?php echo $idd; ?>&qty=<?php echo $qt  ?>&mid=<?php echo $mid  ?>"><i class="fas fa-trash"></i>Reject</a></td>
                          <?php
                            }
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
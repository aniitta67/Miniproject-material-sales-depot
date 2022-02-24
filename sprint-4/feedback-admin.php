<?php require('menu.php'); ?>


<?php

   // require('../connection.php');
   include('../connection.php');

      include('config.php');

  //$sql="SELECT a.*,b.item_name,c.image,d.name,b.cgst,b.sgst FROM `ordertab` as a,material_det as b,payment as c,customer as d WHERE a.matid=b.matid and a.ordid=c.ordid and a.customer_id=d.customer_id and a.status='Paid'";
 
$sql="SELECT * FROM `feedback`";
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
                        <h1 class="m-0"><span class=""></span> View feedback</h1>
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
                    <th>Feedback</th>
                    <!-- <th>Date</th> -->
                    <!-- <th>OrderNo</th> -->
                   
                              
                    <th>Email</th>
                   
                    
                  </thead>

                     <?php 
                     $slno=0;
                    while($row=mysqli_fetch_assoc($result))
                    {
                      $slno+=1;
                     
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
                      <?php echo $row['Message'] ?>
                    </td>

                    <td>
                      <?php echo prav_get("email","customer","customer_id",$row['uid']);
                      
                     // $row['uid'];
                      ?>
                    </td>

                    


                 
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
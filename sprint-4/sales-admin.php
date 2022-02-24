<?php require('menu.php'); ?>




         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6 animated bounceInRight">
                        <h1 class="m-0"><span class=""></span> View Sales</h1>
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

			  
			  <?php

   // require('../connection.php');
   include('../connection.php');

      include('config.php');

  //$sql="SELECT a.*,b.item_name,c.image,d.name,b.cgst,b.sgst FROM `ordertab` as a,material_det as b,payment as c,customer as d WHERE a.matid=b.matid and a.ordid=c.ordid and a.customer_id=d.customer_id and a.status='Paid'";


?>


			  
              
			  
			  
                <h3 class="card-title">Material informations</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <br>
             			   <form method="post">
				  From <input type="date" required name="from">
				  To <input type="date" required name="to">
				  <input type="submit" name="submit">
				  
				  </form>
				  
				  <br>
			  	 
               <table class="table table-striped"  align="center"  width="100%">

                  <thead>
           
                              <th>No</th>         
                    <th>Customer</th>
					   <th>Material</th>
					      <th>Quantity</th>
						     <th>Mestype</th>
							    <th>Price</th>
								   <th>Date</th>
								      
                    <!-- <th>Date</th> -->
                    <!-- <th>OrderNo</th> -->
					<?php
                   if(isset($_POST['submit']))
{
	$from=$_POST['from'];
		$to=$_POST['to'];
$sql="SELECT * FROM ordertab where status='Accept' and (date BETWEEN '$from' AND '$to')";
 $result=$con->query($sql);
  // $row=mysqli_fetch_assoc($result)




   
?>
                    
                  </thead>

                     <?php 
                     $slno=0;
					 $total=0;
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
                      <?php echo $slno; ?>
                    </td>
                
                    <td>
                      <?php echo prav_get("name","customer","customer_id",$row['customer_id']); ?>
                    </td>
      <td>
                    
					   <?php echo prav_get("item_name","material_det","matid",$row['matid'] ); ?>
                    </td>
					
					 <td>
                      <?php echo $row['qty'] ?>
                    </td>
					 <td>
                      <?php echo $row['mestype'] ?>
                    </td>
						 <td>
                      <?php echo $row['price']; $total=$total+$row['price']; ?>
                    </td>
					<td>
                      <?php echo $row['date'] ?>
                    </td>
				
					
					
					
					
					
                    <td>
                  
                    </td>

                    


                 
                    </td>
                    

                  </tr>

                  <?php
                    }
		echo "<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				
				  <td><strong>Total amount(Rs):</td>
				  <td>". $total."</strong></td>
				  <td></td>
				  
				  
				  
				  </tr>		";	
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
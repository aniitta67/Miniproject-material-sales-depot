<?php require('menu.php'); ?>


<?php

   // require('../connection.php');
   include('../connection.php');

  $sql="select * from category";
  $result1=$con->query($sql);
  

  if(isset($_POST['submit']))
    {
       $type=$cat=$_POST['cat'];
       if($type!="0")
       {
          $sql="select * from material_det where category_id='$type'";
       }
       else
       {
          $sql="select * from material_det";
       }
    }
  else
    {
       $sql="select * from material_det";
    }
 
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
              <form method="post">
                 <table width="35%">
                   <tr>
                    <td width="75">Category :</td>
                    <td>
                      <select name="cat" style="width: 100%">
                        <option value="0">All</option>
                        <?php 
                          while($row=mysqli_fetch_assoc($result1))
                          {
                        ?>
                          <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category'] ?>
                        <?php
                           }
                        ?>
                      </select>
                  </td>
                    <td><input type="submit" value="Search" name="submit"></td>
                  </tr>
                 </table>
               </form>
               <table class="table table-striped"  align="center"  width="100%">

                  <thead>
                    <th>Slno</th>
                    <th>Material_Name</th>
                    <th>M-Type</th>
                    <th>Price</th>
                    <!-- <td>Cost</td> -->
                    <th>CGST%</th>
                    <th>SGST%</th>
                    <th>MRP</th>
                    <th>STOCK</th>
                    <th>Image</th>
                    <th></th>
                    
                  </thead>

                     <?php 
                     $slno=0;
                    while($row=mysqli_fetch_assoc($result))
                    {
                      $slno+=1;
                      $idd=$row['matid'];
                  ?>

                  <tr>
                    <td>
                      <?php echo $slno ?>
                    </td>

                    <td>
                      <?php echo $row['item_name'] ?>
                    </td>

                    <td>
                      <?php echo $row['m_type'] ?>
                    </td>
                    <td>
                      <?php echo $row['uprice'] ?>
                    </td>
                   <!--  <td>
                      <?php echo $row['cost'] ?>
                    </td> -->
                    <td>
                      <?php echo $row['cgst'] ?>
                    </td>
                    <td>
                      <?php echo $row['sgst'] ?>
                    </td>
                    <td>
                      <?php echo $row['mrp'] ?>
                    </td>
                    <td>
                      <?php echo $row['stock'] ?>
                    </td>

                   
                    <td>
                      <img src="<?php echo $row['image'] ?>" style="width:200px;height:100px;"/>
                    </td>

                    <td>
                      <td><a href="admin_updatematerial.php?id=<?php echo $idd; ?>"><i class="fas fa-edit"></i>Update</a></td>
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
<?php 

  require('menu.php');

   require('../connection.php');

   if ($_POST) {

      $name = $_POST['name'];
      $phone_no = $_POST['phone_no'];
      $address = $_POST['address'];

      $sql = "INSERT INTO driver (full_name,phone_no,address) VALUES('$name','$phone_no','$address')";
      $current_id = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Insert<br/>" . mysqli_error($con));

      if ($current_id) { ?>

        <script type="text/javascript">
          alert('Driver details added succesfully.');
        </script>
        
      <?php }
   }

   
?>

         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6 animated bounceInRight">
                        <h1 class="m-0"><span class=""></span> Add Driver</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Add Driver</li>
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
                <h3 class="card-title">Driver informations</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="">
                  <div class="col-md-3">

               
                  </div>
                  <div class="col-md-9">
                     <div class="card-header">
                        
              </div>
                  <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" required placeholder="Name">
                  </div>
               </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone No.</label>
                    <input type="number" class="form-control" name="phone_no" required placeholder="Phone No.">
                  </div>
               </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control" name="address" required placeholder="Address"></textarea>
                  </div>
               </div>
               
             
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
                     <table class="table table-striped" id="example">
                        <thead>
                           <tr>
                              <th>sl.no</th>
                              <th>Name </th>
                              <th>Phone No.</th>
                              <th>Address</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>

                        <?php

                          $sql = "SELECT full_name,phone_no,address,driver_id FROM driver  ";
                        $result = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($con));
                        $reslt = mysqli_fetch_all($result);

                        $i=1;
                        foreach ($reslt as $key => $value) { ?>
                           
                           <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $value[0]; ?></td>
                              <td><?php echo $value[1]; ?></td>
                              <td><?php echo $value[2]; ?></td>
                              <td><a href="edit-driver.php?id=<?php echo base64_encode($value[3]); ?>"><i class="fas fa-edit"></i> Edit</a></td>
                           </tr>

                        <?php }

                         ?>
                                    
                                    
                        </tbody>
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
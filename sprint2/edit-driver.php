<?php 

  require('menu.php');

   require('../connection.php');

   $id = base64_decode($_GET['id']) ;

   $sql = "SELECT full_name,phone_no,address FROM driver WHERE driver_id='$id' ";
   $result = $con->query($sql);

   $row = $result->fetch_assoc();

   // print_r($row);exit;

   if ($_POST) {

      $name = $_POST['name'];
      $phone_no = $_POST['phone_no'];
      $address = $_POST['address'];

      $sql = "UPDATE driver SET full_name='$name',phone_no='$phone_no',address='$address' WHERE driver_id ='$id' ";
      $current_id = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Update<br/>" . mysqli_error($con));

      // $newURL = 'index.php';

      // header('Location: target-page.php');

       ?>

        <script type="text/javascript">
          location.href='add-driver.php';
          alert('Driver details updated succesfully.');
        </script>
        
      <?php 
   }

   
?>

         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6 animated bounceInRight">
                        <h1 class="m-0"><span class=""></span> Edit Driver</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Edit Driver</li>
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
                    <input type="text" name="name" class="form-control" value="<?php echo $row['full_name']; ?>" required placeholder="Name">
                  </div>
               </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone No.</label>
                    <input type="number" class="form-control" name="phone_no" value="<?php echo $row['phone_no']; ?>" required placeholder="Phone No.">
                  </div>
               </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control" name="address" required placeholder="Address"><?php echo $row['address']; ?></textarea>
                  </div>
               </div>
               
             
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
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
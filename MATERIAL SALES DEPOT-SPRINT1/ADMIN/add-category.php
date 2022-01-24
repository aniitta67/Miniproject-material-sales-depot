<?php require('menu.php'); ?>

<!-- PHP CODE STARTS HERE-->
<?php

        require('../connection.php');
        if(isset($_POST['submit']))
          {
              $category = $_POST['category'];
               
               $sql = "INSERT INTO category (category) VALUES('$category')";
               $current_id = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
          }
      //   $sql = "SELECT image FROM category WHERE category_id = 7 ";
      // $result = mysqli_query($db, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($db));
      // $row = mysqli_fetch_array($result);
      // $img = $row["image"];
   
?>
         <!-- <img src="<?php echo $img; ?>" /> -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6 animated bounceInRight">
                        <h1 class="m-0"><span class=""></span> Add Category</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Add category</li>
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
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                    
                  <div >
                  <div class="col-md-6">
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" class="form-control" name="category" required placeholder="category">
                  </div>
               </div>
                 
                 
                  
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="submit" value="Add" class="btn btn-primary">
                </div>
              </form>
            </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6 animated bounceInRight">
                        <h1 class="m-0"><span class=""></span>Category List</h1>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
                     <table class="table table-striped" id="example">
                        <thead>
                           <tr>
                              <th>slno</th>
                              <th>Category</th>

                           </tr>

                              <!-- <th>Image</th> -->
                              <!-- <th>Action</th> -->
                           </tr>
                        </thead>
                        <tbody>

                        <?php

                          $sql = "SELECT category FROM category ";
                        $result = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($con));
                        $reslt = mysqli_fetch_all($result);

                        // print_r($reslt[6]);exit;

                        // $img = $reslt["image"];
                        $i=1;
                        foreach ($reslt as $key => $value) { ?>
                           
                           <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $value[0]; ?></td>
                              
                           </tr>
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


<?php require('menu.php'); ?>


<?php

   // require('../connection.php');
   include('../connection.php');

   if(isset($_GET['id']))
  {
    $idd=$_GET['id'];
    $sql="select * from material_det where matid=$idd";
    $cres=$con->query($sql);

    $crow=mysqli_fetch_assoc($cres);

    $cat=$crow['category_id'];
    $name=$crow['item_name'];
    $mtype=$crow['m_type'];
    $cost="0";
    // $image=$crow['Image'];
    $uprice=$crow['uprice'];
    $cgst=$crow['cgst'];
    $sgst=$crow['sgst'];
    




    $_SESSION['mid']=$idd;
    $_SESSION['act']="Edit";

    // echo "<script> alert('hello');</script>";

  }
  else
  {
    $_SESSION['act']="Save";
    $cat=0;
    $name="";
    $mtype="";
    $cost="0";
    // $image=$crow['Image'];
    $uprice="";
    $cgst="";
    $sgst="";
    
  }



   if(isset($_POST['submit']))
    {
      //   $name=$_POST['name'];
      //   $sql="select * from  `material_det` where `item_name`='$name'";
      //   if($_SESSION['act']=="Save")
      //   {
      //   $result=$con->query($sql);
      //   if (mysqli_num_rows($result)>0)
      //   {
      //     echo "<script>alert('Name Already Exists');</script>";
      //     return;
      //   }
      // }



      //   $filename= basename($_FILES["file1"]["name"]);

      //   $ext = pathinfo($filename, PATHINFO_EXTENSION);

      //   $fnn=date("YmdHis").".".$ext;

      //   $target_dir = "../uploads/";
      // // $target_file = $target_dir . basename($_FILES["file1"]["name"]);
      //   $target_file = $target_dir.$fnn;
      //   if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
      //     // echo "The file ". htmlspecialchars( basename( $_FILES["file1"]["name"])). " has been uploaded.";
      //     // echo "<script>alert('ok')</script>";
      //   }
      //   else
      //   {
      //     // echo "<script>alert('error')</script>";
      //   }

        echo "hello";
        $cat=$_POST['cat'];
        $name=$_POST['name'];
        $mtype=$_POST['mtype'];
        $price=$_POST['price'];
        $cost="0";//$_POST['cost'];
        $cgst=$_POST['cgst'];
        $sgst=$_POST['sgst'];

        $cgval=($cgst/100)*$price;
        $sgval=($sgst/100)*$price;
        $rprice=$price+$cgval+$sgval;
        echo "$cgval";
        echo "$sgval";
        echo "$rprice";


        if($_SESSION['act']=="Save")
        {

          // $sql="INSERT INTO `material_det` (`category_id`, `item_name`, `m_type`, `uprice`, `cost`, `cgst`, `sgst`, `mrp`, `stock`, `image`) VALUES ('$cat', '$name', '$mtype', '$price', '$cost', '$cgst', '$sgst', '$rprice', '0', '$target_file')";
        }
        else
        {
          $mmid=$_SESSION['mid'];
          $sql="UPDATE `material_det` SET `category_id` = '$cat', `item_name` = '$name', `m_type` = '$mtype', `uprice` = '$price', `cost` = '$cost', `cgst` = '$cgst', `sgst` = '$sgst', `mrp` = '$rprice' WHERE `material_det`.`matid` ='$mmid'";
           // $sql="UPDATE `material_det` SET `category_id` = '$cat', `item_name` = '$name', `m_type` = '$mtype', `uprice` = '$price', `cost` = '$cost', `cgst` = '$cgst', `sgst` = '$sgst', `mrp` = '$rprice', `image` = '$target_file' WHERE `material_det`.`matid` ='$mmid'";
        }
        $result=$con->query($sql);
        // echo "<script>alert('Record Updated');</script>";
        $cat=0;
        $name="";
        $mtype="";
        $cost="0";
        // $image=$crow['Image'];
        $uprice="";
        $cgst="";
        $sgst="";
        ?>
        <script type="text/javascript">
          location.href='admin_view_material.php';
          alert('Material details updated succesfully.');
        </script>
        <?php
    }


  $sql="select * from category";
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
                        <h1 class="m-0"><span class=""></span> Update Material</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Update Materials</li>
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
              <form method="post" enctype="multipart/form-data">
                <br>
                
                <table align="center">
                  <tr>
                    <td><b>Category&nbsp;</b></td>
                    <td>
                      <select name="cat" class="form-control" required>
                         <option value="">Select Category</option>
                         <?php 
                            while($row=mysqli_fetch_assoc($result))
                            {
                            
                            if ($row['category_id']==$cat)
                            { 
                              ?>
                                <option value="<?php echo $row['category_id'] ?>" selected><?php echo $row['category'] ?>
                              
                            </option>
                            <?php 
                              }
                              else
                              {
                                ?>
                                <option value="<?php echo $row['category_id'] ?>" ><?php echo $row['category'] ?>
                                <?php
                              }
                            
                            
                          
                            }
                          ?>
                      </select>
                    </td>
                  </tr>
                  <!-- $cat=""; -->
                   <tr>
                    <td><b>Item Name&nbsp;</b></td>
                    <td>
                      <input type="text" name="name" class="form-control" value="<?php echo $name ?>" required>
                    </td>
                  </tr>
                  <tr>
                    <td><b>Measurement Type&nbsp;</b></td>
                    <td>
                      <input type="text" name="mtype" class="form-control"  value="<?php echo $mtype ?>"  required>
                    </td>
                  </tr>
                  <tr>
                    <td><b>Unit Price&nbsp;</b></td>
                    <td>
                      <input type="text" name="price" class="form-control"  value="<?php echo $uprice ?>"  required>
                    </td>
                  </tr>
                 <!--  <tr>
                    <td><b>Cost&nbsp;</b></td>
                    <td>
                      <input type="text" name="cost" required>
                    </td>
                  </tr> -->
                  <tr>
                    <td><b>CGST&nbsp;</b></td>
                    <td>
                      <input type="text" name="cgst" class="form-control"  value="<?php echo $cgst ?>"  required>
                    </td>
                  </tr>
                  <tr>
                    <td><b>SGST&nbsp;</b></td>
                    <td>
                      <input type="text" name="sgst" class="form-control"  value="<?php echo $sgst ?>"  required>
                    </td>
                  </tr>
                  <!-- <tr>
                    <td><b>Image&nbsp;</b></td>
                    <td>
                      <input type="file" name="file1" class="form-control" required>
                    </td>
                  </tr> -->
                  <tr>
                    <td></td>
                    <td>
                      <input type="submit" name="submit" class="btn btn-primary">
                    </td>
                  </tr>
                </table>
               <!--  <div class="card-body">
                  <div class="">
                  <div class="col-md-3">

               
                  </div>
                  <div class="col-md-9">
                     <div class="card-header">
                        
              </div>
                  <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Item</label>
                    <input type="text" name="item" class="form-control" placeholder="item">
                  </div>
               </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Batch</label>
                    <input type="text" class="form-control" name="batch" placeholder="Batch">
                  </div>
               </div>
                  
                  <div class="col-md-4">
                  <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                           <option>Select Category</option>

                           <?php

                          $sql = "SELECT category_id,categoryname FROM category ";
                        $result = mysqli_query($db, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($db));
                        $reslt = mysqli_fetch_all($result);

                        $i=1;
                        foreach ($reslt as $key => $value) { ?>
                           
                           <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>

                        <?php }

                         ?>
                        </select>
                      </div>
               </div>
               <div class="col-md-4">
               <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="number" class="form-control" name="quantity" placeholder="quantity">
                  </div>
                  
               </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Measurment Type</label>
                    <input type="text" class="form-control" name="measurment_type" placeholder="Measurment Type">
                  </div>
                  
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unit price</label>
                    <input type="number" class="form-control" name="unit_price" placeholder="unit price">
                  </div>
               </div>
               
           <!--  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">SGST%</label>
                    <input type="number" class="form-control" name="sgst" value="14" placeholder="sgst">
                  </div>
               </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">CGST%</label>
                    <input type="number" class="form-control" value="14" name="cgst" placeholder="cgst">
                  </div>
               </div> -->
               
             </div>
             <div class="col-md-4">
         
                <div class="form-group">
                   <label>Upload Image</label>
                   <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Select image</label>
                   </div>
                </div>
             </div>
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div> -->
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
                              <th>Item</th>
                              <th>Category</th>
                              <th>Batch No.</th>
                              
                           </tr>
                        </thead>
                        <tbody>

                        <?php

                          $sql = "SELECT m.item,m.batch,c.categoryname FROM materialstock m JOIN category c ON c.category_id = m.category_id ";
                        $result = mysqli_query($db, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($db));
                        $reslt = mysqli_fetch_all($result);

                        $i=1;
                        foreach ($reslt as $key => $value) { ?>
                           
                           <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $value[0]; ?></td>
                              <td><?php echo $value[2]; ?></td>
                              <td><?php echo $value[1]; ?></td>
                              
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
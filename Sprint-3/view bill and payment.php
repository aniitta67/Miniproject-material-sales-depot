<?php

  session_start();
  require('../connection.php');
  $cid=$_SESSION['UID'];
 $id= $_SESSION['i_id'];


 if(isset($_GET['did']))
 {

  $sql="select * from ordertab where ordid=$_GET[did]";
  $q=$con->query($sql);
  $quantity=mysqli_fetch_assoc($q);
  $sql="delete from ordertab where ordid=$_GET[did]";
  $con->query($sql);
  echo "<script>window.location='view bill.php'</script>";

  $sql="update material_det set stock=stock+$quantity[qty] where matid=$quantity[matid]";
  $con->query($sql);         
  
 }

  if(isset($_POST['submit']))
    {
      $sql="select * from ordertab where customer_id='$cid' and status='Order'";
      $result1=$con->query($sql);
      $filename= basename($_FILES["file1"]["name"]);
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      $fnn=date("YmdHis").".".$ext;
      $target_dir = "../uploads/";
      $target_file = $target_dir.$fnn;
      if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
        

        }
      else
          {
            // echo "<script>alert('error')</script>";
          }
      while($row=mysqli_fetch_assoc($result1))
      {
        $ordid=$row['ordid'];
        $sql="INSERT INTO `payment` (`ordid`, `image`, `status`) VALUES ('$ordid', '$target_file','Paid')";
        $result2=$con->query($sql);
        $sql="update ordertab set status='Paid' where ordid='$ordid'";
        $result2=$con->query($sql);
      }
    }

  $sql="SELECT a.*,b.item_name,b.cgst,b.sgst,c.category from ordertab as a,material_det as b,category as c where a.matid=b.matid and b.category_id=c.category_id and a.customer_id='$cid' and a.status='Order'";
  $result=$con->query($sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Material sales depot</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../Index/assets/img/hero-bg.jpg" rel="icon">
  <link href="../Index/assets/img/hero-bg.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../Index/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../Index/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Index/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Index/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../Index/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../Index/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../Index/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


 


  <!-- Template Main CSS File -->
  <link href="../Index/assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="#"><span>MATERIAL DEPOT</span></a></h1>
      
<?php
if(isset($_GET['back']))
{?>
 <a href="view materials.php" class="get-started-btn scrollto">BACK</a>

<?php
}
else{

?>
      <a href="order.php?id=<?php echo $id;?>" class="get-started-btn scrollto">BACK</a>

      <?php }?>
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>INVOICE TAX</h2>
          <ol>
            <li><a href="../Index/">HOME</a></li>
            <li>MATERIAL DETAILS</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <div class="container" data-aos="fade-up">
                 
                   
                <div class="portfolio-info">
                <div class="row">
                <div class="col-md-6 form-group">
                    <h3>BILL   </h3>
                </div>
                <div class="col-md-6 form-group">
                    <h3>GST IN: 32AAEAP2050J1ZV </h3>
                </div>
                




</div>
              
               <div class="container-fluid">
                  <div class="card card-info">
                     <table class="table table-striped" id="example">
                        <thead>
                           <tr>
                              <th>slno</th>
                              <th>Category</th>
                               <th>ItemName</th> 
                               <th>Rate</th> 
                               <th>Quantity</th> 
                               <th>CGST</th> 
                               <th>SGST</th> 
                               <th>Amount</th> 
                               <th></th>
                           </tr>
                        </thead>
                        <tbody> 
                           <?php 
                            $i=0;
                            $tot=0;
                            while($row=mysqli_fetch_assoc($result))
                            {
                              $i+=1;
                              $cg=($row['price']/$row['cgst']);
                              $sg=($row['price']/$row['sgst']);
                              $pr=$row['price']+$cg+$sg;
                              $price=round($pr*$row['qty'],2);
                              $tot=$tot+$price;
                            ?>

                            <tr>
                              
                              <td><?php echo $i ?></td>
                              <td><?php echo $row['category'] ?></td>
                              <td><?php echo $row['item_name'] ?></td>
                              <td><?php echo $row['price'] ?></td>
                              <td><?php echo $row['qty'] ?></td>
                              <td><?php echo $row['cgst'] ?></td>
                              <td><?php echo $row['sgst'] ?></td>
                              <td><?php echo $price ?></td>
                              <td><a href="?did=<?php echo $row['ordid'] ?>">Delete</td>
                            </tr>

                            <?php
                            }
                            ?>

                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>Total</td>
                              <td><?php echo $tot ?></td>
                              <td></td>
                            </tr>

                                    
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- /.container-fluid -->
           
            </div>
            

                </div>
              </div>
              <!--<div class="swiper-pagination"></div>-->
            </div>
            <br><br>
            <center>
            <button type="submit"><a href="view materials.php">CONTINUE</a></button></center>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>ADD PAYMENT DETAILS</h3>
              

              <!-- /.card-header -->
             <div style="float:right"> <font style="font-size:30px"><b>UPI QR CODE: </b></font><img src="../uploads/QR.jpeg" width="60%"></div>
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                
                
                <table align="center">
                 
                  <tr>
                    <td><b>Image&nbsp;</b></td>
                    <td>
                      <input type="file" name="file1" class="form-control" required>
                    </td>
                  </tr>
                  
                  <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Upload"></td>
                    
                  </tr>
                 
                </table>
               
                  
                </form>
            
              
              
            

               
          </div>

</div>

</div>



            
    </section><!-- End Portfolio Details Section -->

            



         
  </main><!-- End #main -->

  <!-- ======= Footer ======= 
  <footer id="footer">
   
              
  </footer> End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../Index/assets/vendor/purecounter/purecounter.js"></script>
  <script src="../Index/assets/vendor/aos/aos.js"></script>
  <script src="../Index/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Index/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../Index/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../Index/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../Index/assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="../Index/assets/js/main.js"></script>

  <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <script src="../asset/js/canvasjs.min.js"></script>

</body>

</html>
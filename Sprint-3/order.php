
<?php 
  
  session_start();

  require('../connection.php');

  if(isset($_GET['id']))
    {
      $_SESSION['i_id']=$_GET['id'];
     $id = $_GET['id'];
     
     $sql="SELECT a.*,b.category FROM `material_det` as a,`category` as b where matid='$id' and a.category_id=b.category_id";
     $result1=$con->query($sql);

     $mrow=mysqli_fetch_assoc($result1);
     $_SESSION['mid']=$id;
     $_SESSION['mtype']=$mrow['m_type'];
     $_SESSION['price']=$mrow['mrp'];
   
   }
   if(isset($_POST['submit']))
    {
        $cid=$_SESSION['UID'];

        $mid=$_SESSION['mid'];
        // 
        $qty=$_POST['quantity'];
        $mtype=$_SESSION['mtype'];
        $price=$_SESSION['price'];
        $date=date("Y/m/d");
        $addr=$_POST['address'];
        $phone=$_POST['phone'];



        $sql="INSERT INTO `ordertab` (`customer_id`, `matid`, `qty`, `mestype`, `price`, `date`, `address`, `status`, `ph`) VALUES ('$cid', '$mid', '$qty', '$mtype', '$price', '$date', '$addr', 'Order', '$phone')";
         $result1=$con->query($sql);

         $sql="update material_det set stock=stock-$qty where matid='$mid'";
         $result1=$con->query($sql);         

        
         ?>
         <script type="text/javascript">
           alert('Order Placed Successfully');
           location.href='view bill.php';
         </script>

         <?php

    }

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

  <script type="text/javascript">
    function validqty()
    {
       aqty=document.getElementById("aqty").value;
       eqty=document.getElementById("quantity").value;
       if (parseInt(eqty)>parseInt(aqty) || parseInt(eqty)<=0)
       {
        document.getElementById("quantity").value="";
        alert("Please Enter Valid quantity");
       }
    }
  </script>

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="#"><span>MATERIAL DEPOT</span></a></h1>
      

      <a href="view materials.php" class="get-started-btn scrollto">BACK</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>product name</h2>
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
                <div class="swiper-slide">
                  <img src="<?php echo $mrow['image']; ?>" alt="add image">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Product specifications</h3>
              <ul>
                <li><strong>Category</strong>: <?php echo $mrow['category']; ?>  </li>
                <li><strong>Brand</strong>: <?php echo $mrow['brand']; ?> </li>
                <li><strong>Name</strong>: <?php echo $mrow['item_name']; ?> </li>
                <li><strong>Grade</strong>: <?php echo $mrow['grade']; ?> </li>
                <li><strong>Type</strong>: <?php echo $mrow['type']; ?></li>
                <!-- <li><strong>Color</strong>: <?php echo $mrow['category']; ?> </li> -->
                <li><strong>Packaging Size</strong>: <?php echo $mrow['size']; ?></li>
                <li><strong>Price</strong>: <?php echo $mrow['uprice']; ?> </li>
                <!-- <li><strong>Price</strong>: <?php echo $mrow['image']; ?> </li>                                -->
              </ul>
              <h3>AVAILABLE QTY : <?php echo $mrow['stock']; echo " "; echo $mrow['m_type']; ?></h3>
              <input type="hidden" name="aqty" id="aqty" value="<?php echo $mrow['stock']; ?>">
            </div>
            
              
              
            

               
          </div>

</div>

</div>



            <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

      

        <div class="row mt-5">

          <div class="col-lg-4">
            

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form method="post" action="order.php" >
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="quantity" onfocusout="validqty()"class="form-control" id="quantity" placeholder="Enter quantity"  required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                 
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>   
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="tel" pattern="[0-9]{10}" class="form-control" name="phone" id="phone" placeholder="phone" required>
                </div>
              </div>
            
              <div class="form-group mt-3">
                <textarea class="form-control" name="address" rows="5" placeholder="Site address" required></textarea>
              </div>
             <br>
            <div class="text-center">
              <input type="submit" name="submit" value="ORDER">
              <!-- <button type="submit" name="submit">ORDER</button>  -->
            </div>
            
             
             
              </div>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    </section><!-- End Portfolio Details Section -->

            



         
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
   
              
  </footer><!-- End Footer -->

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

</body>

</html>
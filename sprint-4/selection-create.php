
<?php
   session_start();
   // $pid=$_SESSION["payid"];
require_once "config.php";

  require('menu.php');

   require('../connection.php');
   if (isset($_GET['id'])) {

   $idd=trim($_GET["id"]);
   $pid=trim($_GET["pid"]);

   $_SESSION['ordid']=$idd;
   $_SESSION['payid']=$pid;
   // echo 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd';
   // echo $idd;
  }
// Define variables and initialize with empty values
$Driver = "";
$Vehcile = "";
$Phone = "";
$Location = "";
$Charge = "";


$Driver_err = "";
$Vehcile_err = "";
$Phone_err = "";
$Location_err = "";
$Charge_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Driver = trim($_POST["Driver"]);
		$Vehcile = trim($_POST["Vehcile"]);
		$Phone = trim($_POST["Phone"]);
		$Location = trim($_POST["Location"]);
		$Charge = trim($_POST["Charge"]);
		

        $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
        $options = [
          PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ];
        try {
          $pdo = new PDO($dsn, $db_user, $db_password, $options);
        } catch (Exception $e) {
          error_log($e->getMessage());
          exit('Something weird happened'); //something a user can understand
        }

        $vars = parse_columns('selection', $_POST);
        $stmt = $pdo->prepare("INSERT INTO selection (Driver,Vehcile,Phone,Location,Charge,pid) VALUES (?,?,?,?,?,?)");

        $pyid=$_SESSION['payid'];
        $ordno=$_SESSION['ordid'];
        $sql="update ordertab set status='delivered' where ordid='$ordno'";
        echo $sql;

        $resulto1 = $con->query($sql);

        $sql="select * from ordertab where status='Paid' and ordid in (select order_id from payorder where payment_id='$pyid')";
        $resulto2 = $con->query($sql);
        if(mysqli_num_rows($resulto2)<=0)
        {
          $sql="update payment set status='Delivered' where payid='$pyid'";

          $resulto3 = $con->query($sql);
          ?>
              

          <?php
        }


        if($stmt->execute([ $Driver,$Vehcile,$Phone,$Location,$Charge,$pyid  ])) {
                $stmt = null;
              //  header("location: selection-index.php");
			  ?>

        


			  <!-- <script>
			  alert("Record added");
			  window.location="admin_orderdetailsview.php";
			  
			  </script> -->

        <script>
                alert("Record added");
                window.location="admin_view_orders_0.php";
        
              </script>

              
			  <?php
            } else{
                echo "Something went wrong. Please try again later.";
            }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script>
    function getphone()
      {
        sid=document.getElementById("Driver").value;
        // alert(sid);

        if(sid!="")
        {
         //  alert(sid);  
          $.ajax({
              type:'post',
              url:'driver_phone.php',
              data: {
                      'id': sid
                      
                    },
              dataType: "json",
              success: function(response) {
                if (response.length>0)
                {
                  
                  // alert(response[0].phone_no);
                  // alert("This Email Already Registered");
                  document.getElementById("phone").value=response[0].phone_no;
                }
                else
                {
                  // alert("");
                }
                // alert('hello');
                
              },
              error: function(response) {
                alert('error');
              }
          });
        }
      }

      function getcharge()
      {
        sid=document.getElementById("Vehcile").value;
        // alert(sid);

        if(sid!="")
        {
         //  alert(sid);  
          $.ajax({
              type:'post',
              url:'charge.php',
              data: {
                      'id': sid
                      
                    },
              dataType: "json",
              success: function(response) {
                if (response.length>0)
                {
                  
                  // alert(response[0].phone_no);
                  // alert("This Email Already Registered");
                  document.getElementById("charge").value=response[0].delivery_charge;
                }
                else
                {
                  // alert("");
                }
                // alert('hello');
                
              },
              error: function(response) {
                alert('error');
              }
          });
        }
      }
    
  </script>
	
</head>
<body>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <div class="content-header">
                <div class="container-fluid">
                   <div class="row mb-2">
                      <div class="col-sm-6 animated bounceInRight">
                         <h1 class="m-0"><span class=""></span> Notification</h1>
                      </div>
 					
                      <!-- /.col -->
                     
                      <!-- /.col -->
                   </div>
                   <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
             </div>
             <!-- /.content-header -->
             <!-- Main content -->
 			 
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Notification</h2>
                    </div>
                    <p>Please fill this form and submit to add a record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >

                        <div class="form-group">
                                <label>Driver</label>
                                    <select class="form-control" id="Driver" onchange="getphone();" name="Driver">
                                    <?php
                                        $sql = "SELECT *,driver_id FROM driver";
                                        $result = mysqli_query($link, $sql);
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                          //  array_pop($row);
                                            $value = $row['full_name'];
                                            if ($row["driver_id"] == $Driver){
                                            echo '<option value="' . "$row[driver_id]" . '"selected="selected">' . "$value" . '</option>';
                                            } else {
                                                echo '<option value="' . "$row[driver_id]" . '">' . "$value" . '</option>';
                                        }
                                        }
                                    ?>
                                    </select>
                                <span class="form-text"><?php echo $Driver_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Vehcile</label>
                                    <select class="form-control" onchange="getcharge();" id="Vehcile" name="Vehcile">
                                    <?php
                                        $sql = "SELECT *,vehicle_id FROM vehicle";
                                        $result = mysqli_query($link, $sql);
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                           
                                            $value = $row['name'];
                                            if ($row["vehicle_id"] == $Vehcile){
                                            echo '<option value="' . "$row[vehicle_id]" . '"selected="selected">' . "$value" . '</option>';
                                            } else {
                                                echo '<option value="' . "$row[vehicle_id]" . '">' . "$value" . '</option>';
                                        }
                                        }
                                    ?>
                                    </select>
                                <span class="form-text"><?php echo $Vehcile_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Phone</label>
                                <input type="text" required placeholder="Phone" id="phone" name="Phone" maxlength="10"class="form-control" value="<?php echo $Phone; ?>">
                                <span class="form-text"><?php echo $Phone_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Location</label>
                                <input type="text" required placeholder="Location" name="Location" maxlength="20"class="form-control" value="<?php echo $Location; ?>">
                                <span class="form-text"><?php echo $Location_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Charge (Rs)</label>
                                <input type="number" placeholder="Charge (Rs)" required name="Charge" id="charge" class="form-control" value="<?php echo $Charge; ?>">
                                <span class="form-text"><?php echo $Charge_err; ?></span>
                            </div>
													<div class="form-group">
                              
                                <input type="hidden" name="PayID" class="form-control" value="<?php echo $pid; ?>">
                                <span class="form-text"><?php echo $Charge_err; ?></span>
                            </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="selection-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
	
 
             <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
       </div>
       <!-- ./wrapper -->
       <!-- jQuery -->
       <script src="../asset/jquery/jquery.min.js"></script>
       <script src="../asset/js/adminlte.js"></script>
 
    
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
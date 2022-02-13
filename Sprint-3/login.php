<?php
session_start();
include("connection.php");

if($_POST)
{

    $username=$_POST['username'];
    $password=$_POST['password'];

    $query="SELECT * FROM `login` WHERE `username`='$username' AND `password`='$password'";
    $result=$con->query($query);

    // echo mysqli_num_rows($result);exit;

    if(mysqli_num_rows($result)>0)
    {

      $row = $result->fetch_assoc();
      
      $loginid=$row['login_id'];
      $usertype=$row['usertype'];
      $_SESSION['LOGINID']=$loginid;
      if($usertype=="admin"){
        
        header("location:admin/dashboard.php");
      }
      elseif($usertype=="user"){
        $query="SELECT * FROM `customer` WHERE `login_id`='$loginid'";

        $result1=$con->query($query);
        $row1=$result1->fetch_assoc();
        $_SESSION['UID']=$row1['customer_id'];
        // echo "hello";
        // echo $_SESSION['UID'];
        // echo "$query";
        // echo mysqli_num_rows($result1);
        header("location:user/view materials.php");
      }
             
    }
    else
    { ?>
        <script>
        alert("invalid Username or Password..!!!");
        </script>
        <?php
    }

}
?>


<!-- PHP ENDS HERE -->

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Material sales depot system</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="asset/css/adminlte.min.css">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <!-- /.login-logo -->
         <div class="card card-outline card-primary">
            <div class="card-header text-center">
               <a href="index.php" class="brand-link">
               <img src="asset/img/logo1.png" alt="DSMS Logo" width="200">
               </a>
            </div>
            <div class="card-body">
               <form action="" method="post">
                  
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="username" required placeholder="Enter your email">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" name="password" required placeholder="Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  
                  <p style="color: red;"><?php echo @$_GET['error']; ?></p>
                  <div class="row">
                     <!-- <div class="col-12">
                        <div class="icheck-primary">
                           <input type="checkbox" id="remember">
                           <label for="remember">
                           Remember Me
                           </label>
                        </div>
                     </div> -->
                     <div class="col-6">
                        <button type="submit" class="btn btn-info btn-block">Sign In</button>
                     </div>
                     <div class="col-6">
                        <a href="register.php" class="text-center btn btn-info btn-block">Register Account</a>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->
   </body>
</html>





<html>

<head>  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></head>
<body background="admin_image\img5.jpg">


  <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="container" style="margin-top:100px; margin-left:400px">
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <h1 class="mt-4 mb-3" style="color:white;">
                  Blood Bank & Management
                  <h2 class="row justify-content-center" style="color:white">Admin Login Portal
                </h1>

            </div>
      </div>
      
          <div class="card-body" style="color: white;">

      <div class="row justify-content-lg-center justify-content-mb-center" >
      <div class="col-lg-6 mb-6 ">
      <div class="font-arial" style="font-weight:bold">Username<span style="color:white">*</span></div>
      <div><input type="text" name="username" placeholder="Enter your username" class="form-control" value="" required></div>
    </div>
    </div>
    <div class="row justify-content-lg-center justify-content-mb-center">
    <div class="col-lg-6 mb-6 "><br>
    <div class="font-arial"style="font-weight:bold">Password<span style="color:red">*</span></div>
    <div><input type="password" name="password" placeholder="Enter your Password" class="form-control" value="" required></div>
    </div>
  </div>
  <div class="row justify-content-lg-center justify-content-mb-center">
    <div class="col-lg-4 mb-4 " style="text-align:center"><br>
    <div><input type="submit" name="login" class="btn btn-primary" value="LOGIN" style="cursor:pointer"></div>
    </div>
  </div>
    </div>
  </div></div>
<br>
  <?php
    include 'conn.php';

  if(isset($_POST["login"])){

    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);

    $sql="SELECT * from admin_info where admin_username='$username' and admin_password='$password'";
    $result=mysqli_query($conn,$sql) or die("query failed.");

    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result)){
        session_start();
         $_SESSION['loggedin'] = true;
        $_SESSION["username"]=$username;
        header("Location: dashboard.php");
      }
    }
    else {
      echo '<div class="alert alert-danger" style="font-weight:bold"> Username and Password are not matched!</div>';
    }

  }
   ?>
 </form>
</body>
</html>
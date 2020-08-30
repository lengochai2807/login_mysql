<?php require_once "./conn.php"; session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-lg-push-4 col-md-push-4">
        <div class="panel panel-default" style="margin-top: 50px;">
          <div class="panel-heading">Login</div>
          <div class="panel-body">
            <form action="" method="POST">
              <div class="form-group">
                <input type="text" class="form-control input-sm" name="u_name" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-sm" name="u_pass" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success btn-sm" name="u_login" value="Login">
                <a href="register.php" class="btn btn-info btn-sm">Register</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>  
  </div>

  <!-- login -->
  <?php
    // assign value
    if(isset($_POST["u_login"])) {
      $u_name = $_POST["u_name"]; $u_pass = md5($_POST["u_pass"]);
      if($u_name==="" || $u_pass==="") {echo "<script>alert('Bạn Phải Điền Đầy Đủ Thông Tin')</script>";}
      else {
        // query in db
        $sql = "SELECT * FROM users WHERE u_name = '$u_name'";
        $query = mysqli_query( $conn, $sql );

        // num_rows each rows
        if(mysqli_num_rows($query) > 0)
          while($fetch = mysqli_fetch_assoc($query))
            if( $u_name===$fetch["u_name"] && $u_pass===$fetch["u_pass"] ){
              $_SESSION["u_name"] = $u_name;
              header("location: dash.php");
            }
            else{
              if($u_name!=$fetch["u_name"] && $u_pass!=$fetch["u_pass"]) {echo "<script>alert('Tên Tài Khoản Và Mật Khẩu Không Chính Xác')</script>";}
              else if($u_name!=$fetch["u_name"]) {echo "<script>alert('Tên Tài Khoản Không Chính Xác')</script>";}
              else echo "<script>alert('Mật Khẩu Không Chính Xác')</script>";
            } 
        else echo "<script>alert('Không Có Dữ Liệu Trên Database')</script>";
        }
    }
  ?>
</body>
</html>
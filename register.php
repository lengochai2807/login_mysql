<?php require_once "./conn.php"; ?>


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
                <input type="email" class="form-control input-sm" name="u_email" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-sm" name="u_name" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-sm" name="u_pass" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success btn-sm" name="u_reg" value="Register">
                <a href="index.php" class="btn btn-info btn-sm">Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>  
  </div>

  <!-- register -->
  <?php
    
    if( isset($_POST["u_reg"]) ) {
      // assign value
      $u_email = $_POST["u_email"]; $u_name = $_POST["u_name"]; $u_pass = md5($_POST["u_pass"]);
      if($u_email==="" || $u_name==="" || $u_pass==="") {echo "<script>alert('Bạn Phải Điền Đầy Đủ Thông Tin')</script>";}
      else {
        // insert
        $sql = "INSERT INTO users(u_email, u_name, u_pass) VALUES('$u_email', '$u_name', '$u_pass');";

        // query $sql in db
        $query = mysqli_query( $conn, $sql );

        // check $query
        if( $query ) echo "<script>alert('Đã Tạo Thành Công Bản Ghi Mới');</script>"; else echo "Lỗi: " . $sql . "<br />" . mysqli_error($conn);
      }
    }
  ?>
</body>
</html>
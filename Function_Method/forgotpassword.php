<?php
    if(isset($_POST["submit"])){
        include 'config.php';

        $username =  mysqli_real_escape_string($con, $_POST["username"]);
        $name =  mysqli_real_escape_string($con, $_POST["name"]);
        $yearOfBirth =  mysqli_real_escape_string($con, $_POST["yearOfBirth"]);
        $phone =  mysqli_real_escape_string($con, $_POST["phone"]);
        
        $result = mysqli_query($con, "SELECT * FROM users  WHERE username='$username' AND name='$name' AND yearOfBirth='$yearOfBirth' AND phone='$phone'");
        $count = mysqli_num_rows($result);
        
        if($count > 0) {
            $row = mysqli_fetch_assoc($result);
            $password = $row["password"]; 
            echo "<script> alert('Mật khẩu của bạn là: $password'); </script>";
         }else {
            echo "<script> alert('Không tồn tại người dùng với thông tin trên'); </script>";
         }   
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Forgot password</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="mb-3 text-center">
                    <h3>Xác nhận người dùng</h3>
                </div>
                <form action="" class="shadow p-4" method="POST">                  
                            <div class="mb-3">
                                <label>Tên đăng nhập<span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control" placeholder="Tên dùng để đăng nhập" required>
                            </div>
    
                            <div class="mb-3">
                                <label>Tên tài khoản<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Tên của người dùng" required>
                            </div>

                            <div class="mb-3">
                                <label>Năm sinh<span class="text-danger">*</span></label>
                                <input type="text" name="yearOfBirth"  class="form-control" placeholder="Nhập năm sinh" required>
                            </div>

                            <div class="mb-3">
                                <label>Số điện thoại<span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                            </div>

                            <a href="login.php" class="float-end text-decoration-none">Đăng nhập</a>

                            <div class="mb-3">
                               <button type="submit" name="submit" class="btn btn-primary text-center">Lấy lại mật khẩu</button>
                            </div>
    
                    <hr>
    
                    <p class="text-center mb-0">Bạn chưa có tài khoản? <a href="signup.php" class="text-decoration-none">Đăng ký ngay</a></p>
                    
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
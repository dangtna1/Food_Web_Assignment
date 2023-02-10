<?php
    session_start();
    if (isset($_POST["login"])) {
        include 'config.php';
        $username =  mysqli_real_escape_string($con, $_POST["username"]);
        $password =  mysqli_real_escape_string($con, $_POST["password"]);
        $result = mysqli_query($con, "SELECT * FROM users  WHERE username='$username'");
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            foreach ($result as $result) {
                $resultPassword = $result['password'];
            }
            if (password_verify($password, $resultPassword)){
                $users = mysqli_query($con, "SELECT * FROM users  WHERE username='$username'");
                foreach ($users as $user) {
                    $userId = $user['id'];
                    $roleId = $user["roleId"];
                }
                if ($roleId == 0) {
                    //create a cart for user
                    $order = mysqli_query($con, "INSERT INTO orders (userId, status) VALUES ('$userId', '0')");
                    if ($order) {
                        $last_id = $con->insert_id; 
                        $_SESSION['orderId'] = $last_id;
                    }
                    header("Location: ..\Main\login_success.php");
                } else {
                    header("Location: ..\Main\admin.php");
                }
                $_SESSION['username'] = $username;
            }
            else {
                echo "<script> alert('Sai mật khẩu'); </script>";
            }
        } else {
            echo "<script> alert('Đăng nhập không thành công'); </script>";
        }
        $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="mb-3 text-center">
                    <h3>Đăng nhập</h3>
                </div>
                <form action="" class="shadow p-4" method="POST">
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <a href="forgotpassword.php" class="float-end text-decoration-none">Quên mật khẩu?</a>
                    <div class="mb-3">
                        <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
                    </div>
                    <hr>
                    <p class="text-center mb-0">Bạn chưa có tài khoản? <a href="signup.html" class="text-decoration-none">Đăng ký ngay</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
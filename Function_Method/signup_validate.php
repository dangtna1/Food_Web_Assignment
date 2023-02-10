<?php

if (isset($_POST["signup"])) {
    include 'config.php';

    $username =  mysqli_real_escape_string($con, $_POST["username"]);
    $name =  mysqli_real_escape_string($con, $_POST["name"]);
    $yearOfBirth =  mysqli_real_escape_string($con, $_POST["yearOfBirth"]);
    $password =  mysqli_real_escape_string($con, $_POST["password"]);
    $cpassword =  mysqli_real_escape_string($con, $_POST["cpassword"]);
    $phone =  mysqli_real_escape_string($con, $_POST["phone"]);

    if ((strlen($username) < 5) || (strlen($username) > 50)) {
        echo "<script> alert('Tên đăng nhập phải từ 5-50 ký tự'); </script>";
    } elseif ((strlen($name) < 2) || (strlen($name) > 30)) {
        echo "<script> alert('Tên tài khoản phải từ 2-30 ký tự'); </script>";
    } elseif (!(strlen($phone) == 10) || !is_numeric($phone)) {
        echo "<script> alert('Số điện thoại là số tự nhiên 10 chữ số'); </script>";
    } elseif (!(strlen($yearOfBirth) == 4) || !is_numeric($yearOfBirth)) {
        echo "<script> alert('Năm sinh là số tự nhiên 4 chữ số'); </script>";
    } elseif ((int)$yearOfBirth < 1900 || (int)$yearOfBirth > 2020) {
        echo "<script> alert('Năm sinh phải từ 1990-2020'); </script>";
    } elseif (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE username='$username'")) > 0) {
        echo "<script> alert('Tên đăng nhập đã được sử dụng'); </script>";
    } elseif ($password !== $cpassword) {
        echo "<script> alert('Mật khẩu xác nhận không trùng khớp'); </script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($con, "INSERT INTO users (username, name, yearOfBirth, phone, password, roleID) VALUES ('$username', '$name','$yearOfBirth', '$phone', '$hashed_password', '0')");
        if ($result) {
            header("Location: signupsuccessful.php");
        } else {
            echo "<script> alert('Đăng ký không thành công'); </script>";
        }
    }
}

?>
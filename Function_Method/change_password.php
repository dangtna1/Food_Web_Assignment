<?php
session_start();
include 'config.php';
$username = $_SESSION['username'];
$users = mysqli_query($con, "SELECT * FROM users  WHERE username= '$username'");
foreach ($users as $user) {
    $password = $user['password'];
    $id = $user['id'];
}
if (isset($_POST["save"])) {
    $oldPassword =  mysqli_real_escape_string($con, $_POST["oldPassword"]);
    $newPassword =  mysqli_real_escape_string($con, $_POST["newPassword"]);
    $cnewPassword =  mysqli_real_escape_string($con, $_POST["cnewPassword"]);
    if ($oldPassword !== $password) {
        echo "<script> alert('Mật khẩu cũ không chính xác'); </script>";
    } elseif ($newPassword !== $cnewPassword) {
        echo "<script> alert('Mật khẩu nhập lại không trùng khớp'); </script>";
    } else {
        $sql = "UPDATE Users SET password = '$newPassword' WHERE id = $id ";
        if ($con->query($sql) === TRUE) {
            header("Location: ..\Main\personal_info.php");
        } else {
            echo "Error updating record: " . $con->error;
        }
    }
}
mysqli_close($con);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Deli Food</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="..\CSS\cartstyle.css">
    <style>

    </style>
</head>

<body>
    <nav id="navbar">
        <div>
            <a href="..\Main\login_success.php">Quay lại trang chủ</a>
            <span style="color: #fff;">Kết nối</span>
            <a href="http://e-learning.hcmut.edu.vn/"><i class="fab fa-facebook-square"></i></a>
            <a href="http://e-learning.hcmut.edu.vn/"><i class="fab fa-instagram"></i></a>
            <a href="http://e-learning.hcmut.edu.vn/"><i class="fab fa-youtube"></i></a>
            <span style="color: #bbb;">|</span>
            <span style="color: #fff;">Tải ứng dụng</span>
            <a href="https://play.google.com/store?hl=vi&gl=US"><i class="fab fa-google-play"></i></a>
            <a href="https://www.apple.com/app-store/"><i class="fab fa-app-store"></i></a>
        </div>
        <div>
            <a href="#"><i class="fas fa-bell"></i> Thông báo</a>
            <a href="#"><i class="fas fa-question-circle"></i> Hỗ trợ</a>
            <a href="index.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
        </div>
    </nav>
    <main class="container">
        <h4>Hồ sơ của tôi</h4>
        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        <hr>
        <form action="" method="POST">
            <label for="oldPassword" class="form-label">Mật khẩu củ</label>
            <input type="password" name="oldPassword" id="oldPassword" class="form-control">
            <br>
            <label for="newPassword" class="form-label">Mật khẩu mới</label>
            <input type="password" name="newPassword" id="newPassword" class="form-control">
            <br>
            <label for="cnewPassword" class="form-label">Nhập lại mật khẩu mới</label>
            <input type="password" name="cnewPassword" id="cnewPassword" class="form-control">
            <br>
            <button class="btn btn-primary" name="save" id="save">Lưu</button>
        </form>


    </main>
    <hr style="color: #00f; padding-top: 2.5px;">
    <div class="container flex-container">
        <div>
            <h6 style="color: #777;"><strong>CHĂM SÓC KHÁCH HÀNG</strong></h6>
            <a href="#">Trung tâm hỗ trợ</a>
            <br>
            <a href="blog.html">Deli Blog</a>
            <br>
            <a href="#">Thanh toán</a>
            <br>
            <a href="#">Chăm sóc khách hàng</a>
            <br>
            <a href="#">Vận chuyển</a>
        </div>
        <div>
            <h6 style="color: #777;"><strong>VỀ DELI FOOD</strong></h6>
            <a href="#">Giới thiệu về Deli Food tại Việt Nam</a>
            <br>
            <a href="#">Chính sách bảo mật</a>
            <br>
            <a href="#">Tuyển dụng</a>
            <br>
            <a href="#">Điều khoản của Deli Food</a>
        </div>
        <div>
            <h6 style="color: #777;"><strong>THANH TOÁN</strong></h6>
            <a href="#"><i class="fab fa-cc-visa fa-2x" style="color: #1D2569;"></i></a>
            <a href="#"><i class="fab fa-cc-jcb fa-2x" style="color: #0f0;"></i></a>
            <h6 style="color: #777;"><strong>ĐƠN VỊ VẬN CHUYỂN</strong></h6>
            <a href="#"><i class="fas fa-truck fa-2x" style="color: #00f;"></i></a>
            <a href="#"><i class="fas fa-shipping-fast fa-2x" style="color: orange;"></i></a>
        </div>
        <div>
            <h6 style="color: #777;"><strong>THEO DÕI CHÚNG TÔI TRÊN</strong></h6>
            <a href="http://e-learning.hcmut.edu.vn/"><i class="fab fa-facebook-square fa-2x" style="color: #087BEA;"></i> Facebook</a>
            <br>
            <a href="http://e-learning.hcmut.edu.vn/"><i class="fab fa-instagram fa-2x" style="color: #F2B859;"></i> Instagram</a>
            <br>
            <a href="http://e-learning.hcmut.edu.vn/"><i class="fab fa-youtube fa-2x" style="color: #f00;"></i> Youtube</a>
        </div>
        <div>
            <h6 style="color: #777;"><strong>TẢI ỨNG DỤNG DELI NGAY THÔI</strong></h6>
            <a href="https://play.google.com/store?hl=vi&gl=US"><i class="fab fa-google-play fa-2x" style="color: #00F076;"></i> Google Play</a>
            <br>
            <a href="https://www.apple.com/app-store/"><i class="fab fa-app-store fa-2x" style="color: #1BA0F1;"></i> App Store</a>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
    <div class="container flex-container">
        <div>
            <h6 style="color: #777;">&copy 2021 Deli Food. Tất cả các quyền được bảo lưu.</h6>
        </div>
        <div>
            <h6 style="color: #777;">Quốc gia & Khu vực: <a href="index.php" style="color: #777; text-decoration: none;">Singgapore</a>|<a href="index.php" style="color: #777; text-decoration: none;">Indonesia</a>|<a href="index.php" style="color: #777; text-decoration: none;">Thái Lan</a>|<a href="index.php" style="color: #777; text-decoration: none;">Malaysia</a>|<a href="index.php" style="color: #777; text-decoration: none;">Việt Nam</a>|<a href="index.php" style="color: #777; text-decoration: none;">Phillipines</a></h6>
        </div>
    </div>
    <footer>
        <div class="flex-container;">
            <p style="text-align: center;">
                <a href="#" style="color: #777; text-decoration: none;">CHÍNH SÁCH BẢO MẬT</a>
                <span>|</span>
                <a href="#" style="color: #777; text-decoration: none;">QUY CHẾ HOẠT ĐỘNG</a>
                <span>|</span>
                <a href="#" style="color: #777; text-decoration: none;">CHÍNH SÁCH VẬN CHUYỂN</a>
            </p>
        </div>
        <div class="img-control flex-container" style="justify-content: center;">
            <img src="https://luatthienduc.vn/cloud/image-20200115095241-1.png" alt="chứng nhận">
            <img src="https://luatthienduc.vn/cloud/image-20200115095241-1.png" alt="chứng nhận">
        </div>
        <div class="flex-container" style="flex-direction: column; align-items: center;">
            <p>Công ty TNHH Deli Food</p>
            <p>Địa chỉ: Tầng 4-5-6, Tòa nhà Capital Place, số 29 đường Liễu Giai, Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội, Việt Nam. Tổng đài hỗ trợ: 19001221 - Email: cskh@hotro.deli.vn</p>
            <p>Chịu Trách Nhiệm Quản Lý Nội Dung: Nguyễn Đức Trí - Điện thoại liên hệ: 024 73081221 (ext 4678)</p>
            <p>Mã số doanh nghiệp: 0106773786 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 10/02/2015</p>
            <p>&copy - Bản quyền thuộc về Công ty TNHH Deli Food</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
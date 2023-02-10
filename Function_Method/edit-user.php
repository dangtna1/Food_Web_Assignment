<?php
session_start();
include 'config.php';
$id = $username = $password = $name = $yearOfBirth = $phone = $roleId = '';
if (isset($_POST['btnEdit'])) {
    $id = mysqli_real_escape_string($con, $_POST["user_id"]);
    $username =  mysqli_real_escape_string($con, $_POST["user_username"]);
    $password =  mysqli_real_escape_string($con, $_POST["user_password"]);
    $name =  mysqli_real_escape_string($con, $_POST["user_name"]);
    $yearOfBirth =  mysqli_real_escape_string($con, $_POST["user_yearOfbirth"]);
    $phone =  mysqli_real_escape_string($con, $_POST["user_phone"]);
    $roleId = mysqli_real_escape_string($con, $_POST["user_roleId"]);
}

if (isset($_POST['btnOk'])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $oldUsername = mysqli_real_escape_string($con, $_POST["oldUsername"]);
    $newUsername =  mysqli_real_escape_string($con, $_POST["username"]);
    $newPassword =  mysqli_real_escape_string($con, $_POST["password"]);
    $newName =  mysqli_real_escape_string($con, $_POST["name"]);
    $newYearOfBirth =  mysqli_real_escape_string($con, $_POST["yearOfBirth"]);
    $newPhone =  mysqli_real_escape_string($con, $_POST["phone"]);
    $newRoleId = mysqli_real_escape_string($con, $_POST["roleId"]);
    if ((strlen($newUsername) < 5) || (strlen($newUsername) > 50)) {
        echo "<script> alert('Tên đăng nhập phải từ 5-50 ký tự'); </script>";
    } elseif ((strlen($newName) < 2) || (strlen($newName) > 30)) {
        echo "<script> alert('Tên tài khoản phải từ 2-30 ký tự'); </script>";
    } elseif (!(strlen($newPhone) == 10) || !is_numeric($newPhone)) {
        echo "<script> alert('Số điện thoại là số tự nhiên 10 chữ số'); </script>";
    } elseif (!(strlen($newYearOfBirth) == 4) || !is_numeric($newYearOfBirth)) {
        echo "<script> alert('Năm sinh là số tự nhiên 4 chữ số'); </script>";
    } elseif ((int)$newYearOfBirth < 1900 || (int)$newYearOfBirth > 2020) {
        echo "<script> alert('Năm sinh phải từ 1990-2020'); </script>";
    } elseif (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE username='$newUsername'")) > 0 && $newUsername != $oldUsername) {
        echo "<script> alert('Tên đăng nhập đã được sử dụng'); </script>";
    } elseif ((int)$newRoleId != 0 && (int)$newRoleId != 1) {
        echo "<script> alert('roleId phải là 0 hoặc 1'); </script>";
    } else {
        $result = mysqli_query($con, "UPDATE users SET username = '$newUsername', password = '$newPassword', name = '$newName', yearOfBirth = $newYearOfBirth, phone = '$newPhone', roleId = $newRoleId WHERE id=$id");
        if ($result) {
            header("Location: ..\Main\manage_user.php");
        } else {
            // echo $result;
            echo "<script> alert('Sửa không thành công'); </script>";
            // echo $con->error;
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Deli Food</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="..\CSS\main.css">
    <style>
        #dropdown-block {
            width: 180px;
            padding: 15px;
            background-color: #193498;
            opacity: 0.85;
            position: absolute;
            top: 94px;
            right: 0px;
            display: none;
        }

        #dropdown-block>a {
            font-weight: 550;
            color: #fff;
            text-decoration: none;
        }

        /* responsive */
        @media(max-width: 880px) {
            #dropdown-block {
                width: 180px;
                top: 63px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light nav-bar-custom" style="background-color: #193498; opacity: 0.85;" id="navbar">
        <div id="logo-image">
            <img src="https://i.vdoc.vn/data/image/2016/08/28/flashcards-for-kids-food-600-size-640x335-znd.png" alt="food logo">
        </div>
        <div>
            <h style="font-size: xx-large; font-weight: bolder; color: white; text-align: center;">The Delicious Food</h>
        </div>
        <div>
            <p style="text-decoration: none; color: #fff; font-size: 15px; cursor: pointer;" onclick="appear()"><i class="fas fa-user-circle fa-2x"></i>
                <?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?>
            </p>
        </div>
    </nav>
    <div id="dropdown-block">
        <a href="index.php">
            Đăng xuất
        </a>
    </div>
    <main>
        <div>

        </div>
        <div class="container">
            <form class="formEdit" action="" method="POST">
                <input type="text" id="id" name="id" value="<?php echo $id; ?>" hidden>
                <input type="text" id="oldUsername" name="oldUsername" value="<?php echo $username; ?>" hidden>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="username">Nhập Username:</label>
                    <input type="text" class="form-control col-7" id="username" name="username" value="<?php echo $username; ?>" placeholder="Thuộc kiểu chuỗi, độ dài 5 - 50 kí tự">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="password">Nhập Password:</label>
                    <input type="text" class="form-control col-7" id="password" name="password" value="<?php echo $password; ?>" placeholder="Thuộc kiểu chuỗi">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="name">Nhập name:</label>
                    <input type="text" class="form-control col-7" id="name" name="name" value="<?php echo $name; ?>" placeholder="Thuộc kiểu chuỗi, độ dài 2 - 30 kí tự">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="yearOfBirth">Nhập YearOfBirth:</label>
                    <input type="text" class="form-control col-7" id="yearOfbirth" name="yearOfBirth" value="<?php echo $yearOfBirth ?>" placeholder="Số nguyên từ 1910-2020">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="phone">Nhập Phone:</label>
                    <input type="text" class="form-control col-7" id="phone" name="phone" value="<?php echo $phone ?>" placeholder="Số tự nhiên 10 chữ số">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="roleId">Nhập RoleId:</label>
                    <input type="text" class="form-control col-7" id="roleId" name="roleId" value="<?php echo $roleId ?>" placeholder="0-Khách hàng, 1-Quản trị viên">
                </div>
                <div class="form-group row mt-2">
                    <div class="col-3">
                        <button name="btnOk" class="btn btn-secondary">OK</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- footer -->
    <footer>
        <div class="container">
            <h2 style="color: #fff;">Deli Food</h2>
            <hr style="color: #fff;">
            <ul id="support-list">
                <li>
                    <a href="..\Main\info_page.php">Về Deli Food</a>
                </li>
                <li>
                    <a href="..\Main\Blog.html">Blog</a>
                </li>
                <li>
                    <a href="#questions">Câu hỏi thường gặp</a>
                </li>
                <li id="network">
                    <a href="http://e-learning.hcmut.edu.vn/"><i class="fab fa-facebook-square fa-2x"></i></a>
                    <a href="http://e-learning.hcmut.edu.vn/"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="http://e-learning.hcmut.edu.vn/"><i class="fab fa-youtube fa-2x"></i></a>
                </li>
            </ul>
            <hr style="color: #fff;">
            <div id="download-block">
                <div id="download-info">
                    <a href="https://play.google.com/store?hl=vi&gl=US"><img src="https://apsi.vn/App_Themes/front/images/icon/GooglePlayTransparent.png" alt="Google Play symbol"></a>
                    <a href="https://www.apple.com/app-store/"><img src="https://foxfm.app/assets/app.png" alt="App Store symbol"></a>

                </div>
                <div>
                    <p style="color: #fff;">&copy; 2021 Deli Food</p>
                </div>
            </div>
        </div>
    </footer>
    <script language="javascript">
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-100px";
            }
            prevScrollpos = currentScrollPos;
        }


        function appear() {
            if (document.getElementById('dropdown-block').style.display == 'block') {
                document.getElementById('dropdown-block').style.display = 'none';
            } else {
                document.getElementById('dropdown-block').style.display = 'block';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            let button = document.querySelector('.btnAddNew');
            let form = document.querySelector('.formAddNew');
            button.onclick = function() {
                form.classList.toggle("d-none");
            }
        }, false);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
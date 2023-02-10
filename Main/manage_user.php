<?php
session_start();
include '..\Function_Method\config.php';

$users = mysqli_query($con, "SELECT * FROM users");
if (isset($_POST['btnOk'])) {
    $username =  mysqli_real_escape_string($con, $_POST["username"]);
    $password =  mysqli_real_escape_string($con, $_POST["password"]);
    $name =  mysqli_real_escape_string($con, $_POST["name"]);
    $yearOfBirth =  mysqli_real_escape_string($con, $_POST["yearOfBirth"]);
    $phone =  mysqli_real_escape_string($con, $_POST["phone"]);
    $roleId = mysqli_real_escape_string($con, $_POST["roleId"]);
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
    } elseif ((int)$roleId != 0 && (int)$roleId != 1) {
        echo "<script> alert('roleId phải là 0 hoặc 1'); </script>";
    } else {
        $result = mysqli_query($con, "INSERT INTO users (username, name, yearOfBirth, phone, password, roleID) VALUES ('$username', '$name','$yearOfBirth', '$phone', '$password', '$roleId')");
        if ($result) {
            echo "<script> alert('Thêm tài khoản thành công'); </script>";
            header("Refresh:0");
        } else {
            echo "<script> alert('Thêm tài khoản không thành công'); </script>";
        }
    }
}
if (isset($_POST['btnDel'])) {
    $id = $_POST['user_id'];
    $result = mysqli_query($con, "DELETE FROM users WHERE id=$id");
    if ($result) {
        header("Refresh:0");
    } else {
        echo "<script> alert('Xóa không thành công'); </script>";
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

        .container {
            height: fit-content;
        }

        #home {
            font-size: 50px;
        }
        a:link {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light nav-bar-custom" style="background-color: #eee; opacity: 0.85;" id="navbar">
        <div id="logo-image">
            <img src="https://i.vdoc.vn/data/image/2016/08/28/flashcards-for-kids-food-600-size-640x335-znd.png" alt="food logo">
        </div>
        <div>
            <a id="home" href="..\Function_Method\back_to_index_page.php"><strong>The Deli Food</strong></a>
        </div>
        <div>
                <a href="admin_management.php" style="color: #000; text-decoration: none; font-size: 20px;"><strong>Quay lại trang quản lý</strong></a> <!-- chưa hiện thực chức năng xem giỏ hàng bằng ajax -->
                <a href="admin_management.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </nav>
    <main>

        <div class="container">
            <button class="btn btn-primary btnAddNew">Thêm mới</button>
            <form class="formAddNew d-none mb-3" action="" method="POST">
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="username">Nhập Username:</label>
                    <input type="text" class="form-control col-7" id="username" name="username" placeholder="Thuộc kiểu chuỗi, độ dài 5 - 50 kí tự">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="password">Nhập Password:</label>
                    <input type="text" class="form-control col-7" id="password" name="password" placeholder="Thuộc kiểu chuỗi">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="name">Nhập name:</label>
                    <input type="text" class="form-control col-7" id="name" name="name" placeholder="Thuộc kiểu chuỗi, độ dài 2 - 30 kí tự">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="yearOfBirth">Nhập YearOfBirth:</label>
                    <input type="text" class="form-control col-7" id="yearOfbirth" name="yearOfBirth" placeholder="Số nguyên từ 1910-2020">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="phone">Nhập Phone:</label>
                    <input type="text" class="form-control col-7" id="phone" name="phone" placeholder="Số tự nhiên 10 chữ số">
                </div>
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="roleId">Nhập RoleId:</label>
                    <input type="text" class="form-control col-7" id="roleId" name="roleId" placeholder="0-Khách hàng, 1-Quản trị viên">
                </div>
                <div class="form-group row mt-2">
                    <div class="col-3">
                        <button name="btnOk" class="btn btn-secondary">Thêm</button>
                    </div>
                </div>
            </form>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>NAME</th>
                    <th>YEAROFBIRTH</th>
                    <th>PHONE</th>
                    <th>ROLEID</th>
                </tr>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['yearOfBirth']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td><?php echo $user['roleId']; ?></td>
                        <td class="d-flex">
                            <form action="" method="POST">
                                <input type="text" value="<?php echo $user['id']; ?>" name="user_id" hidden>
                                <button name="btnDel" type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                            <form action="..\Function_Method\edit-user.php" method="POST">
                                <input type="text" value="<?php echo $user['id']; ?>" name="user_id" hidden>
                                <input type="text" value="<?php echo $user['username']; ?>" name="user_username" hidden>
                                <input type="text" value="<?php echo $user['password']; ?>" name="user_password" hidden>
                                <input type="text" value="<?php echo $user['name']; ?>" name="user_name" hidden>
                                <input type="text" value="<?php echo $user['yearOfBirth']; ?>" name="user_yearOfbirth" hidden>
                                <input type="text" value="<?php echo $user['phone']; ?>" name="user_phone" hidden>
                                <input type="text" value="<?php echo $user['roleId']; ?>" name="user_roleId" hidden>
                                <button name="btnEdit" type="submit" class="btn btn-info btn-sm">Sửa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
    <!-- footer -->
    <footer>
        <div class="container">
            <h2 style="color: #fff;">Deli Food</h2>
            <hr style="color: #fff;">
            <ul id="support-list">
                <li>
                    <a href="info_page.php">Về Deli Food</a>
                </li>
                <li>
                    <a href="Blog.html">Blog</a>
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
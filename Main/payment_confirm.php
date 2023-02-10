<?php 
    session_start(); 
    if (!isset($_SESSION['total'])) {
        echo ("<script lang='text/javascript'>
            window.alert('Giỏ hàng bạn đang trống');
            window.location.href='cart_with_user.php';
        </script>");
    } 
    if(isset($_POST['payment_button'])){
        if(!isset($_POST['agree'])) {
            echo ("<script lang='text/javascript'>
                window.alert('Vui lòng xác nhận thông tin trên');
            </script>");
        } else {
            $address = $_POST['address'];
            $total =  $_POST['cost'];
            $paymentMethod = $_POST['payment_method'];
            include "..\Function_Method\config.php";
            $orderId = $_SESSION["orderId"];
            $result1 = mysqli_query($con, "UPDATE orders SET total='$total', address='$address', status='1' WHERE id='$orderId'");
            
            if ($paymentMethod == 'e-banking') {
                echo ("<script lang='text/javascript'>
                    window.alert('Đặt hàng thành công, hãy luôn theo dõi điện thoại nha!');
                    window.location.href='create_new_cart.php';
                </script>");
            } else {
                echo ("<script lang='text/javascript'>
                    window.alert('Đặt hàng thành công, hãy luôn theo dõi điện thoại nha!');
                    window.location.href='create_new_cart.php';
                </script>");
            }
            mysqli_close($con);
        }
    }  
?>
<!DOCTYPE html>
<html>
<head>
    <title>payment_confirm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* navbar */
        #logo-image>img {
            max-width: 150px;
            border-radius: 50%;
        }
        .nav-bar-custom {
            width: 100vw;
            position: fixed;
            padding-left: 112px;
            padding-right: 50px;
            display: flex;
            flex-direction: row;
        }
        .custom-button { 
            text-decoration: none;   
            padding: 10px;
            background-color: #fff;
            color: #000;
        }
        #title {
            width: 100%;
            position: absolute;
            top: 95px;
            font-size: 40px;
            color: #fff;
            padding: 20px;
            background: #193498;
            opacity: 0.85;
        }
        body {
            background-color: #E6F9FD;
        }
    </style>

<body>
    <nav class="navbar navbar-light nav-bar-custom" style="background-color: #eee;" id="navbar">
        <div id="logo-image">
            <img src="https://i.vdoc.vn/data/image/2016/08/28/flashcards-for-kids-food-600-size-640x335-znd.png" alt="food logo">
        </div>   
        <div>
            <a href="cart_with_user.php" style="color: #000; text-decoration: none; font-size: 20px;"><strong>Quay lại giỏ hàng</strong></a> <!-- chưa hiện thực chức năng xem giỏ hàng bằng ajax -->
            <a href="cart_with_user.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </nav>
    <div class="container">
        <h2>something</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="margin-top: 100px;">
            <h3>Xác nhận thanh toán</h3>
        <label for="address" class='form-label'>Địa chỉ</label>
            <input type="text" name="address" id="address" value="" placeholder="Nhập địa chỉ của bạn..." class="form-control" required>
            <br>
            <label for="cost" class='form-label'>Tổng số tiền cần thanh toán</label>
            <input type="text" name="cost" id="cost" class="form-control" value="<?php echo $_SESSION['total']; ?>" onFocus=blur();>
            <br>
            <label for="payment_method" class="form-label">Phương thức thanh toán</label>
            <select name="payment_method" id="payment_method" class="form-select" required>
                <option value="" disabled selected>Chọn một phương thức thanh toán</option>
                <option value="cash">Thanh toán bằng tiền mặt (Ship Cod)</option>
                <option value="e-banking">Thanh toán qua ngân hàng</option>
            </select>
            <br>
            <input type="checkbox" name="agree" id="agree" > Xác nhận thông tin trên
            <br><br>
            <button type="submit" class="btn btn-success" name="payment_button">Thanh toán</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
    
</html>
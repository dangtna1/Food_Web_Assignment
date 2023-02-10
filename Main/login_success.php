<?php 
    session_start(); 
    include '..\Function_Method\config.php';
    $sql = "SELECT id, name, cost, image, foodtypeId FROM food";
    $result = $con->query($sql);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
            <form class="d-flex search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-input" value="">
                <button class="btn btn-outline-info" type="submit" onClick="searchFunc();">Search</button>
            </form>
        </div>
        <div>
            <p style="text-decoration: none; color: #fff; font-size: 15px; cursor: pointer;" onclick="appear()"><i class="fas fa-user-circle fa-2x"></i>
                <?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?>
            </p>
        </div>
    </nav>
    <div id="dropdown-block">
        <a href="personal_info.php">Tài khoản của tôi</a>
        <br>
        <a href="cart_with_user.php">Đơn mua</a>
        <br>
        <a href="..\Function_Method\logout.php">
            Đăng xuất
        </a>
    </div>
    <main>
        <div class="container">
            <section id="address-section" class="container">
                <h1 style="text-align: center;">The Delicious Food</h1>
                <p style="text-align: center;">Let's start finding delicious food!</p>
            </section>
            <br><br>
                    <?php
                        $count = 1;
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $cost = $row['cost'];
                                $image = $row['image'];
                                $foodtypeId = $row['foodtypeId'];
                                if ($foodtypeId == 1) {
                                    if ($count == 1) {
                                       echo "<div class='row' style='margin-bottom: 30px;'>"; //mở row 1
                                       echo "<p id='rice' style='font-size: 30px; font-weight: 650; color: #1597E5;'>Cơm</p>";
                                       $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VNĐ</p>
                                                <i class='fas fa-cart-plus fa-2x add' id='$id' style='color: blue; cursor: pointer; margin-left: 110px;'></i>
                                                </div>
                                            </div>
                                        </div> 
                                    ";
                                } 
                                else if ($foodtypeId == 2) {
                                    if ($count == 2) {
                                        echo "</div>"; //đóng row 1
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //mở row 2
                                        echo "<p id='soup' style='font-size: 30px; font-weight: 650; color: #1597E5;'>Canh</p>";
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VNĐ</p>
                                                <i class='fas fa-cart-plus fa-2x add' id='$id' style='color: blue; cursor: pointer; margin-left: 110px;'></i>
                                                </div>
                                            </div>
                                        </div>  
                                    ";
                                }
                                else if ($foodtypeId == 3) {
                                    if ($count == 3) {
                                        echo "</div>"; //đóng row 2
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //mở row 3
                                        echo "<p id='sticky-rice' style='font-size: 30px; font-weight: 650; color: #1597E5;'>Cháo</p>";
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VNĐ</p>
                                                <i class='fas fa-cart-plus fa-2x add' id='$id' style='color: blue; cursor: pointer; margin-left: 110px;'></i>                                                </div>
                                            </div>
                                        </div>  
                                    ";
                                }
                                else if ($foodtypeId == 4) {
                                    if ($count == 4) {
                                        echo "</div>"; //đống row 3
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //mở row 4
                                        echo "<p id='additionals' style='font-size: 30px; font-weight: 650; color: #1597E5;'>Ăn kèm</p>";
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VNĐ</p>
                                                <i class='fas fa-cart-plus fa-2x add' id='$id' style='color: blue; cursor: pointer; margin-left: 110px;'></i>                                                </div>
                                            </div>
                                        </div> 
                                    ";
                                }
                                else if ($foodtypeId == 5) {
                                    if ($count == 5) {
                                        echo "</div>"; //đống row 4
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //mở row 5 
                                        echo "<p id='seafood' style='font-size: 30px; font-weight: 650; color: #1597E5;'>Hải sản</p>"; 
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VNĐ</p>
                                                <i class='fas fa-cart-plus fa-2x add' id='$id' style='color: blue; cursor: pointer; margin-left: 110px;'></i>                                                </div>
                                            </div>
                                        </div> 
                                    ";
                                }
                                else if ($foodtypeId == 6) {
                                    if ($count == 6) {
                                        echo "</div>"; //đống row 5
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //mở row 6 
                                        echo "<p id='chicks' style='font-size: 30px; font-weight: 650; color: #1597E5;'>Món gà và chim</p>"; 
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VNĐ</p>
                                                <i class='fas fa-cart-plus fa-2x add' id='$id' style='color: blue; cursor: pointer; margin-left: 110px;'></i>                                                </div>
                                            </div>
                                        </div> 
                                    ";
                                }
                                else if ($foodtypeId == 7) {
                                    if ($count == 7) {
                                        echo "</div>"; //đống row 6
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //mở row 7  
                                        echo "<p id='drinks' style='font-size: 30px; font-weight: 650; color: #1597E5;'>Dồ uống</p>";
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VNĐ</p>
                                                <i class='fas fa-cart-plus fa-2x add' id='$id' style='color: blue; cursor: pointer; margin-left: 110px;'></i>                                                </div>
                                            </div>
                                        </div> 
                                    ";
                                }
                            } 
                            echo "</div>";
                        }
                    ?>
            <br><br><br>
            <!-- Questions -->
            <p class="fs-2 fw-bold">Tại sao nên chọn Deli Food?</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>Thời gian</strong> - Deli Food cung cấp
                dịch vụ giao đồ ăn, thức uống nhanh nhất thị trường, tiết kiệm thời gian.</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>Thuận tiện</strong> - Giờ đây, chỉ với
                chiếc Smart Phone trên tay và với vài thao tác chạm nhẹ là bạn có thể đặt đồ ăn và thức uống một cách
                thuận tiện.</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>Đáp ứng mọi nhu cầu</strong> - Với menu
                cực kì đa dạng giúp cho bạn cho những trải nghiệm mới mẻ tha hồ lựa chọn các món ăn phù hợp với khẩu vị
                của mình.</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>Thanh toán dễ dàng</strong> - Thanh
                toán cực kì dễ dàng qua các sàn thương mại điện tử hoặc e-banking.</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>Voucher</strong> - Cung cấp, cập nhật
                voucher thường xuyên, tích điểm mua sắm để sử dụng đổi lấy nhiều ưu đãi.</p>
            <br><br><br>
            <section id="questions">
                <p class="fs-2 fw-bold">Các câu hỏi thường gặp</p>
                <article>
                    <h3>Làm cách nào để đặt đồ ăn ở Việt Nam?</h3>
                    <p>Sau đây là cách đơn giản nhất để đặt đồ ăn qua Deli Food khi bạn ở Việt Nam</p>
                    <ol>
                        <li><strong>Tìm kiếm nhà hàng hoặc món yêu thích</strong> - Nhập địa chỉ của bạn tại trang chủ.
                            Xem các Nhà hàng và điểm ăn uống gần chỗ bạn trong danh sách của Deli Food. Chọn nhà hàng
                            bạn yêu thích, duyệt qua thực đơn và chọn món bạn muốn đặt.</li>
                        <li><strong>Kiểm tra & thanh toán</strong> - Sau khi chắc chắn bạn đã đặt đầy đủ các món theo
                            nhu cầu. Hãy nhấn nút "ORDER NOW" trong giỏ hàng và nhập địa chỉ giao đồ ăn cuối cùng. Chọn
                            phương thức thanh toán và voucher (nếu có) phù hợp và tiện lợi nhất đối với bạn.</li>
                        <li><Strong>Giao hàng</Strong> - Deli Food có thuật toán thiết kế để giảm thiểu tối thiểu chi
                            phí, quãng đường vận chuyển. Việc của bạn sau khi hoàn thành đặt hàng là giữ điện thoại bên
                            mình để nhận tin nhắn hay cuộc gọi khi bên vận chuyển đến giao.</li>
                    </ol>
                </article>
                <hr>
                <article>
                    <h3>Deli Food là gì?</h3>
                    <p>Có thể nói Deli Food là một dịch vụ Giao đồ ăn nhanh nhất tại Việt Nam. Chúng tôi dựa vào những
                        đơn hàng bạn đã thưởng thức để sắp xếp và đề xuất những thực phẩm yêu thích của bạn để bạn có
                        thể tìm được đồ ăn một cách dễ dàng và hợp lí nhất. Ngoài ra chúng tôi còn hợp tác với nhiều đối
                        tác cung cấp đồ ăn lơn để cho thuê các dịch vụ nhà hàng, đám cưới, đám hỏi, sinh nhật, ... nhằm
                        phục vụ và cho khách hàng trải nghiệm những điều tốt nhất chỉ có ở chúng tôi.</p>
                </article>
                <hr>
                <article>
                    <h3>Deli Food có nhận thanh toán bằng tiền mặt không?</h3>
                    <p>Tất nhiên là Deli Food chấp nhận mọi hình thức thanh toán cho dịch vụ đồ ăn, bao gồm cả tiền mặt
                        giúp cho khách hàng có những trải nghiệm tuyệt vời.</p>
                </article>
                <hr>
                <article>
                    <h3>Tôi có thể đặt đồ ăn cho người khác trên Deli Food được không?</h3>
                    <p>Tất nhiên rồi, Bạn chỉ cần cập nhật đúng địa chỉ người mình muốn gửi đồ ăn chính xác trước khi
                        đặt đơn hàng của bạn. Còn lại hãy chứ để Deli Food chăm lo người thân của bạn.</p>
                </article>
                <hr>
                <article>
                    <h3>Deli Food chi phí vận chuyển như thế nào?</h3>
                    <p>Phí giao hàng của chúng tôi phụ thuộc vào nhiều yếu tố hoạt động như khoảng cách từ vị trí của
                        bạn đến nhà hàng. Bạn có thể kiểm tra chính xác phí giao hàng trước khi xác thực đơn hàng. Ngoài
                        ra, chúng tôi còn liệt kê, đề xuất những nhà hàng gần nhà bạn để bạn có thể thoải mái mua sắm mà
                        không lo lắng về phí giao hàng.</p>
                </article>
                <hr>
                <article>
                    <h3>Deli Food có dịch vụ giao đồ ăn vào ban đêm không?</h3>
                    <p>Nếu có điều gì đó quan trọng đối với chúng tôi thì đó chính là trải nghiệm của khách hàng. Chúng
                        tôi cung cấp dịch vụ giao đồ ăn 24x7 giúp bạn có thể xua tan cơn "thèm đồ ăn" bất cứ lúc nào.
                    </p>
                </article>
            </section>
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
                <li>
                    <a href="contact_infor_for_user.php">Thông tin liên hệ</a>
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

        function searchFunc() {
            let input = document.getElementById('search-input').value;
            if (input == 'Đồ uống' || input == 'đồ uống') {
                document.location.href = "#drinks";
            } else if (input == 'Món gà và chim' || input == 'món gà và chim') {
                document.location.href = "#chicks";
            } else if (input == 'Hải sản' || input == 'hải sản') {
                document.location.href = "#seafood";
            } else if (input == 'Ăn kèm' || input == 'ăn kèm') {
                document.location.href = "#additionals";
            } else if (input == 'Cháo' || input == 'cháo') {
                document.location.href = "#sticky-rice";
            } else if (input == 'Canh' || input == 'canh') {
                document.location.href = "#soup";
            } else if (input == 'Cơm' || input == 'cơm') {
                document.location.href = "#rice";
            }
        }

        function appear() {
            if (document.getElementById('dropdown-block').style.display == 'block') {
                document.getElementById('dropdown-block').style.display = 'none';
            } else {
                document.getElementById('dropdown-block').style.display = 'block';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                //insert
                $(".add").click(function(){
                    var id = $(this).attr("id"); //important
                    $.ajax({
                        type: "POST",
                        url: "cart_insert.php",
                        data: {id: id},
                        success: function(result){
                            alert(result);
                        }
                    });
                });
            }); 
        </script>
</body>
</html>
<?php 
    session_start(); 
    include '..\Function_Method\config.php';
    $sql = "SELECT name, cost, image, foodtypeId FROM food";
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
        <a href="personal_info.php">T??i kho???n c???a t??i</a>
        <br>
        <a href="admin_management.php">Ch???nh s???a, c???p nh???t</a>
        <br>
        <a href="..\Function_Method\logout.php">
            ????ng xu???t
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
                                $name = $row['name'];
                                $cost = $row['cost'];
                                $image = $row['image'];
                                $foodtypeId = $row['foodtypeId'];
                                if ($foodtypeId == 1) {
                                    if ($count == 1) {
                                       echo "<div class='row' style='margin-bottom: 30px;'>"; //m??? row 1
                                       echo "<p id='rice' style='font-size: 30px; font-weight: 650; color: #1597E5;'>C??m</p>";
                                       $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VN??</p>
                                                <a href='#' style='padding-left: 110px;'><i class='fas fa-cart-plus fa-2x'></i></a>
                                                </div>
                                            </div>
                                        </div> 
                                    ";
                                } 
                                else if ($foodtypeId == 2) {
                                    if ($count == 2) {
                                        echo "</div>"; //????ng row 1
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //m??? row 2
                                        echo "<p id='soup' style='font-size: 30px; font-weight: 650; color: #1597E5;'>Canh</p>";
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VN??</p>
                                                <a href='#' style='padding-left: 110px;'><i class='fas fa-cart-plus fa-2x'></i></a>
                                                </div>
                                            </div>
                                        </div>  
                                    ";
                                }
                                else if ($foodtypeId == 3) {
                                    if ($count == 3) {
                                        echo "</div>"; //????ng row 2
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //m??? row 3
                                        echo "<p id='sticky-rice' style='font-size: 30px; font-weight: 650; color: #1597E5;'>Ch??o</p>";
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VN??</p>
                                                <a href='#' style='padding-left: 110px;'><i class='fas fa-cart-plus fa-2x'></i></a>
                                                </div>
                                            </div>
                                        </div>  
                                    ";
                                }
                                else if ($foodtypeId == 4) {
                                    if ($count == 4) {
                                        echo "</div>"; //?????ng row 3
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //m??? row 4
                                        echo "<p id='additionals' style='font-size: 30px; font-weight: 650; color: #1597E5;'>??n k??m</p>";
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VN??</p>
                                                <a href='#' style='padding-left: 110px;'><i class='fas fa-cart-plus fa-2x'></i></a>
                                                </div>
                                            </div>
                                        </div> 
                                    ";
                                }
                                else if ($foodtypeId == 5) {
                                    if ($count == 5) {
                                        echo "</div>"; //?????ng row 4
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //m??? row 5 
                                        echo "<p id='seafood' style='font-size: 30px; font-weight: 650; color: #1597E5;'>H???i s???n</p>"; 
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VN??</p>
                                                <a href='#' style='padding-left: 110px;'><i class='fas fa-cart-plus fa-2x'></i></a>
                                                </div>
                                            </div>
                                        </div> 
                                    ";
                                }
                                else if ($foodtypeId == 6) {
                                    if ($count == 6) {
                                        echo "</div>"; //?????ng row 5
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //m??? row 6 
                                        echo "<p id='chicks' style='font-size: 30px; font-weight: 650; color: #1597E5;'>M??n g?? v?? chim</p>"; 
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VN??</p>
                                                <a href='#' style='padding-left: 110px;'><i class='fas fa-cart-plus fa-2x'></i></a>
                                                </div>
                                            </div>
                                        </div> 
                                    ";
                                }
                                else if ($foodtypeId == 7) {
                                    if ($count == 7) {
                                        echo "</div>"; //?????ng row 6
                                        echo "<div class='row' style='margin-bottom: 30px;'>"; //m??? row 7  
                                        echo "<p id='drinks' style='font-size: 30px; font-weight: 650; color: #1597E5;'>D??? u???ng</p>";
                                        $count = $count + 1;
                                    }
                                    echo "
                                        <div class='col'>
                                            <div class='card' style='width: 18rem;'>
                                                <img src='$image' class='card-img-top' alt='$name'>
                                                <div class='card-body'>
                                                <h5 class='card-title'>$name</h5>
                                                <p class='price'>$cost VN??</p>
                                                <a href='#' style='padding-left: 110px;'><i class='fas fa-cart-plus fa-2x'></i></a>
                                                </div>
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
            <p class="fs-2 fw-bold">T???i sao n??n ch???n Deli Food?</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>Th???i gian</strong> - Deli Food cung c???p
                d???ch v??? giao ????? ??n, th???c u???ng nhanh nh???t th??? tr?????ng, ti???t ki???m th???i gian.</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>Thu???n ti???n</strong> - Gi??? ????y, ch??? v???i
                chi???c Smart Phone tr??n tay v?? v???i v??i thao t??c ch???m nh??? l?? b???n c?? th??? ?????t ????? ??n v?? th???c u???ng m???t c??ch
                thu???n ti???n.</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>????p ???ng m???i nhu c???u</strong> - V???i menu
                c???c k?? ??a d???ng gi??p cho b???n cho nh???ng tr???i nghi???m m???i m??? tha h??? l???a ch???n c??c m??n ??n ph?? h???p v???i kh???u v???
                c???a m??nh.</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>Thanh to??n d??? d??ng</strong> - Thanh
                to??n c???c k?? d??? d??ng qua c??c s??n th????ng m???i ??i???n t??? ho???c e-banking.</p>
            <p> <i class="fas fa-check-double" style="color: #0f0;"></i> <strong>Voucher</strong> - Cung c???p, c???p nh???t
                voucher th?????ng xuy??n, t??ch ??i???m mua s???m ????? s??? d???ng ?????i l???y nhi???u ??u ????i.</p>
            <br><br><br>
            <section id="questions">
                <p class="fs-2 fw-bold">C??c c??u h???i th?????ng g???p</p>
                <article>
                    <h3>L??m c??ch n??o ????? ?????t ????? ??n ??? Vi???t Nam?</h3>
                    <p>Sau ????y l?? c??ch ????n gi???n nh???t ????? ?????t ????? ??n qua Deli Food khi b???n ??? Vi???t Nam</p>
                    <ol>
                        <li><strong>T??m ki???m nh?? h??ng ho???c m??n y??u th??ch</strong> - Nh???p ?????a ch??? c???a b???n t???i trang ch???.
                            Xem c??c Nh?? h??ng v?? ??i???m ??n u???ng g???n ch??? b???n trong danh s??ch c???a Deli Food. Ch???n nh?? h??ng
                            b???n y??u th??ch, duy???t qua th???c ????n v?? ch???n m??n b???n mu???n ?????t.</li>
                        <li><strong>Ki???m tra & thanh to??n</strong> - Sau khi ch???c ch???n b???n ???? ?????t ?????y ????? c??c m??n theo
                            nhu c???u. H??y nh???n n??t "ORDER NOW" trong gi??? h??ng v?? nh???p ?????a ch??? giao ????? ??n cu???i c??ng. Ch???n
                            ph????ng th???c thanh to??n v?? voucher (n???u c??) ph?? h???p v?? ti???n l???i nh???t ?????i v???i b???n.</li>
                        <li><Strong>Giao h??ng</Strong> - Deli Food c?? thu???t to??n thi???t k??? ????? gi???m thi???u t???i thi???u chi
                            ph??, qu??ng ???????ng v???n chuy???n. Vi???c c???a b???n sau khi ho??n th??nh ?????t h??ng l?? gi??? ??i???n tho???i b??n
                            m??nh ????? nh???n tin nh???n hay cu???c g???i khi b??n v???n chuy???n ?????n giao.</li>
                    </ol>
                </article>
                <hr>
                <article>
                    <h3>Deli Food l?? g???</h3>
                    <p>C?? th??? n??i Deli Food l?? m???t d???ch v??? Giao ????? ??n nhanh nh???t t???i Vi???t Nam. Ch??ng t??i d???a v??o nh???ng
                        ????n h??ng b???n ???? th?????ng th???c ????? s???p x???p v?? ????? xu???t nh???ng th???c ph???m y??u th??ch c???a b???n ????? b???n c??
                        th??? t??m ???????c ????? ??n m???t c??ch d??? d??ng v?? h???p l?? nh???t. Ngo??i ra ch??ng t??i c??n h???p t??c v???i nhi???u ?????i
                        t??c cung c???p ????? ??n l??n ????? cho thu?? c??c d???ch v??? nh?? h??ng, ????m c?????i, ????m h???i, sinh nh???t, ... nh???m
                        ph???c v??? v?? cho kh??ch h??ng tr???i nghi???m nh???ng ??i???u t???t nh???t ch??? c?? ??? ch??ng t??i.</p>
                </article>
                <hr>
                <article>
                    <h3>Deli Food c?? nh???n thanh to??n b???ng ti???n m???t kh??ng?</h3>
                    <p>T???t nhi??n l?? Deli Food ch???p nh???n m???i h??nh th???c thanh to??n cho d???ch v??? ????? ??n, bao g???m c??? ti???n m???t
                        gi??p cho kh??ch h??ng c?? nh???ng tr???i nghi???m tuy???t v???i.</p>
                </article>
                <hr>
                <article>
                    <h3>T??i c?? th??? ?????t ????? ??n cho ng?????i kh??c tr??n Deli Food ???????c kh??ng?</h3>
                    <p>T???t nhi??n r???i, B???n ch??? c???n c???p nh???t ????ng ?????a ch??? ng?????i m??nh mu???n g???i ????? ??n ch??nh x??c tr?????c khi
                        ?????t ????n h??ng c???a b???n. C??n l???i h??y ch??? ????? Deli Food ch??m lo ng?????i th??n c???a b???n.</p>
                </article>
                <hr>
                <article>
                    <h3>Deli Food chi ph?? v???n chuy???n nh?? th??? n??o?</h3>
                    <p>Ph?? giao h??ng c???a ch??ng t??i ph??? thu???c v??o nhi???u y???u t??? ho???t ?????ng nh?? kho???ng c??ch t??? v??? tr?? c???a
                        b???n ?????n nh?? h??ng. B???n c?? th??? ki???m tra ch??nh x??c ph?? giao h??ng tr?????c khi x??c th???c ????n h??ng. Ngo??i
                        ra, ch??ng t??i c??n li???t k??, ????? xu???t nh???ng nh?? h??ng g???n nh?? b???n ????? b???n c?? th??? tho???i m??i mua s???m m??
                        kh??ng lo l???ng v??? ph?? giao h??ng.</p>
                </article>
                <hr>
                <article>
                    <h3>Deli Food c?? d???ch v??? giao ????? ??n v??o ban ????m kh??ng?</h3>
                    <p>N???u c?? ??i???u g?? ???? quan tr???ng ?????i v???i ch??ng t??i th?? ???? ch??nh l?? tr???i nghi???m c???a kh??ch h??ng. Ch??ng
                        t??i cung c???p d???ch v??? giao ????? ??n 24x7 gi??p b???n c?? th??? xua tan c??n "th??m ????? ??n" b???t c??? l??c n??o.
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
                    <a href="info_page.php">V??? Deli Food</a>
                </li>
                <li>
                    <a href="Blog.html">Blog</a>
                </li>
                <li>
                    <a href="#questions">C??u h???i th?????ng g???p</a>
                </li>
                <li>
                    <a href="contact_infor.php">Th??ng tin li??n h???</a>
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
            if (input == '????? u???ng' || input == '????? u???ng') {
                document.location.href = "#drinks";
            } else if (input == 'M??n g?? v?? chim' || input == 'm??n g?? v?? chim') {
                document.location.href = "#chicks";
            } else if (input == 'H???i s???n' || input == 'h???i s???n') {
                document.location.href = "#seafood";
            } else if (input == '??n k??m' || input == '??n k??m') {
                document.location.href = "#additionals";
            } else if (input == 'Ch??o' || input == 'ch??o') {
                document.location.href = "#sticky-rice";
            } else if (input == 'Canh' || input == 'canh') {
                document.location.href = "#soup";
            } else if (input == 'C??m' || input == 'c??m') {
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
</body>

</html>
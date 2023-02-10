<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Quản lý thông tin liên hệ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="..\CSS\main.css">
        <style>
            
            .table-bordered td, .table-bordered th, .table-bordered{
                border:2px solid black;

            }

            .table {
                margin: 10px;        
            }

            #header {
                background-color: aquamarine;
            }

            div {
                margin: 10px;
            }

            #edit {
                width: 50%;
            }

            #logo-image>img {
                max-width: 150px;
                border-radius: 50%;
            }

            #logo-acc>img {
                max-width: 50px;
                border-radius: 50%;
            }

            .custom-button { 
                text-decoration: none;   
                padding: 10px;
                background-color: #fff;
                color: #000;
            }
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

            #home{
                text-decoration: none;
                font-size: 40px;
            }

            a:visited {
                text-decoration: none;
            }
        </style>
    </head>
    <body id="body">
        <nav class="navbar navbar-light nav-bar-custom" style="background-color: #eee;" id="navbar">
            <div id="logo-image">
                <img src="https://i.vdoc.vn/data/image/2016/08/28/flashcards-for-kids-food-600-size-640x335-znd.png" alt="food logo">
            </div>  
            <div>
                <a id="home" href="..\Function_Method\back_to_index_page.php"><h> <strong>The Deli Food</strong> </h> </a>
            </div>  
            <div>
                <a href="admin_management.php" style="color: #000; text-decoration: none; font-size: 20px;"><strong>Quay lại trang quản lí</strong></a> <!-- chưa hiện thực chức năng xem giỏ hàng bằng ajax -->
                <a href="admin_management.php"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>
            <div class="container-fluid" style="padding-top: 130px; margin: 0px">
            <div class="row table">
                <label for="myTable" style="font-weight: 800; font-size: large;">Thông tin liên hệ</label>
                <table id="myTable" class="table">
                    <tr>
                        <th>ID</th>
                        <th>Phương thức</th>
                        <th>Thông tin</th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </div>
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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            $(document).ready(load_data);

            function load_data() 
            {
                $.ajax({
                    type: "GET",
                    url: "../Function_Method/get_contact_infor.php",
                    datatype: "text",
                    success: function(data){
                        for (var i=0; i<data.length; i++) {
                            var row = $('<tr><td>' + data[i].id + '</td><td>' + data[i].field + '</td><td>' + data[i].infor + '</td><td>' + '<form action="../Function_Method/edit_contact_infor.php" method="post"> <input type="text" value="' + data[i].id + '" name="idx" hidden/> <button type="submit" name="btnEdit" class="btn btn-outline-primary btn-sm">Thay đổi</button> </form>' + '</td></tr>');
                            $('#myTable').append(row);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        alert('Error: ' + textStatus + ' - ' + errorThrown);
                    }
                }); 
            }

        </script>
        <script>
            function showhide()
            {
                var x = document.getElementById("edit-form");
                if (x.style.display == 'none') {
                    x.style.display = 'block';
                } else {
                    x.style.display = 'none';
                }
            }
        </script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>
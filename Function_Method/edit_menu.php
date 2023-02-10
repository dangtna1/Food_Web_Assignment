<?php

	session_start();

    $con = mysqli_connect("localhost", "root", "", "foodweb_db");

    if(isset($_POST['btnEdit'])){
        $ID = $_POST['idx'];

        $result = mysqli_query($con, "SELECT * FROM `food` WHERE `id`='$ID'");

        $j_str = array();

        while($row =mysqli_fetch_assoc($result))
        {
            $j_str[] = $row;
        }

        $json = json_encode($j_str);
    }
?>

<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Chỉnh sửa</title>
    <style>

        .container {
            background-color: #193498;
            margin-top: 30px;
            padding: 10px;
            border-radius: 5%;
        }

        form {
            background-color: white;
            margin: 10px auto; 
            padding: 10px;      
        }

        #logo-image>img {
            max-width: 150px;
            border-radius: 50%;
        }

        .custom-button { 
            text-decoration: none;   
            padding: 10px;
            background-color: #fff;
            color: #000;
        }
        #logo-acc>img {
            max-width: 50px;
            border-radius: 50%;
        }

        h {
            color: #fff;
            font-size: xx-large;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light nav-bar-custom" style="background-color: #193498; opacity: 0.85;" id="navbar">
        <div class="col-3" id="logo-image">
            <img src="https://i.vdoc.vn/data/image/2016/08/28/flashcards-for-kids-food-600-size-640x335-znd.png" alt="food logo">
        </div>
        <div class="col-6">
            <h style="font-size: xx-large; font-weight: bolder; color: white; text-align: center;">The Delicious Food</h>
        </div>
        <div>
            <p style="text-decoration: none; color: #fff; font-size: 15px; cursor: pointer;" onclick=""><i class="fas fa-user-circle fa-2x"></i>
                <?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?>
            </p>
        </div>
    </nav>
    <div class="container">
        <?php if(isset($_POST['btnEdit'])) { ?>
            <div id="edit-form" class="card card-body">
                <form action="savechange_delete_menu.php" method="post" class="form-group"  style="width: 80%;">
                    <label for="info" style="font-size: large; font-weight: bolder;">Thay đổi thông tin về "<?php echo $j_str[0]['name'] ?>"</label>
                    <br>
                    <br>
                    <input class="form-control txt" type="text" id="idx" name="idx" value="<?php echo $j_str[0]['id'] ?>" hidden>
                    <lable for="idx">Tên <?php if($j_str[0]['foodtypeId'] =="1") echo "món ăn"; else if($j_str[0]['foodtypeId'] == "2") echo "thức uống"; ?></lable>
                    <input class="form-control" type="text" id="name" name="name" value="<?php echo $j_str[0]['name'] ?>">
                    <lable for="idx">Giá <?php if($j_str[0]['foodtypeId'] =="1") echo "món ăn"; else if($j_str[0]['foodtypeId'] == "2") echo "thức uống"; ?></lable>
                    <input class="form-control" type="text" id="cost" name="cost" value="<?php echo $j_str[0]['cost'] ?>">
                    <lable for="image">Hình ảnh</lable>
                    <input class="form-control" type="text" id="image" name="image" value="<?php echo $j_str[0]['image'] ?>">
                    <lable for="idx">Loại</lable>
                    <select class="form-control" name="foodtypeId" id="foodtypeId" disabled>
                        <option value="1" <?php if($j_str[0]['foodtypeId'] == "1") echo "selected" ?> >Cơm</option>
                        <option value="2" <?php if($j_str[0]['foodtypeId'] == "2") echo "selected" ?> >Canh</option>
                        <option value="3" <?php if($j_str[0]['foodtypeId'] == "3") echo "selected" ?> >Cháo</option>
                        <option value="4" <?php if($j_str[0]['foodtypeId'] == "4") echo "selected" ?> >Ăn kèm</option>
                        <option value="5" <?php if($j_str[0]['foodtypeId'] == "5") echo "selected" ?> >Hải sản</option>
                        <option value="6" <?php if($j_str[0]['foodtypeId'] == "6") echo "selected" ?> >Món gà và chim</option>
                        <option value="7" <?php if($j_str[0]['foodtypeId'] == "7") echo "selected" ?> >Thức uống</option>
                    </select>
                    <br>
                    <input type="checkbox" name="agree" id="agree" value="1"> xác nhận thay đổi
                    <br>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success" name="btnSave" id="btnSave">Lưu</button>
                    </div>
                </form>
            </div>
        <?php } ?>

        <?php if(isset($_POST['addnewdish']) || isset($_POST['addnewdrink'])) { ?>
            <div id="add-form" class="card card-body">
                <form action="savechange_delete_menu.php" method="post" class="form-group"  style="width: 80%;">
                    <label for="info" style="font-size: large; font-weight: bolder;">Thêm món ăn mới vào thực đơn</label>
                    <br>
                    <br>
                    <lable for="idx">ID món ăn</lable>
                    <input class="form-control txt" type="text" id="idx" name="idx" value="">
                    <lable for="idx">Tên món ăn</lable>
                    <input class="form-control" type="text" id="name" name="name" value="">
                    <lable for="idx">Giá món ăn</lable>
                    <input class="form-control" type="text" id="cost" name="cost" value="">
                    <lable for="image">Hình ảnh</lable>
                    <input class="form-control" type="text" id="image" name="image" value="">
                    <lable for="idx">Loại</lable>
                    <input class="form-control" type="text" id="foodtypeId" name="foodtypeId" value="1" hidden>
                    <select class="form-control" name="foodtypeId" id="foodtypeId">
                        <option value="0">Loại thực phẩm</option>
                        <option value="1">Cơm</option>
                        <option value="2">Canh</option>
                        <option value="3">Cháo</option>
                        <option value="4">Ăn kèm</option>
                        <option value="5">Hải sản</option>
                        <option value="6">Món gà và chim</option>
                        <option value="7">Thức uống</option>
                    </select>
                    <br>
                    <input type="checkbox" name="agree" id="agree" value="1"> Xác nhận thêm mới
                    <br>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success" name="btnAdd" id="btnSave">Thêm</button>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
    <script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </script>
</body>
</html>
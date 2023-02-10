<?php

	session_start();

    $con = mysqli_connect("localhost", "root", "", "foodweb_db");

    if(isset($_POST['btnEdit'])){
        $ID = $_POST['idx'];

        $result = mysqli_query($con, "SELECT * FROM `publicinfo` WHERE `id`='$ID'");

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
    <title>Chỉnh sửa</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

        h1 {
            color: #fff;
            font-size: xx-large;
            font-weight: bolder;
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
    </style>
</head>
<body>
    <nav class="navbar navbar-light nav-bar-custom" style="background-color: #193498; opacity: 0.85;" id="navbar">
        <div id="logo-image" class="col-2">
            <img src="https://i.vdoc.vn/data/image/2016/08/28/flashcards-for-kids-food-600-size-640x335-znd.png" alt="food logo">
        </div>   
        <div class="col-6">
            <h style="font-size: xx-large; font-weight: bolder; color: white; text-align: center;">The Delicious Food</h>
        </div>
        <div>
            <p style="text-decoration: none; color: #fff; font-size: 15px; cursor: pointer;" onclick="appear()"><i class="fas fa-user-circle fa-2x"></i>
			<?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?>
            </p>
    </div>
    </nav>
    <div class="container">
        <div class="card card-body">
            <form action="..\Function_Method\save_contact_infor.php" method="post" class="form-group"  style="width: 80%;">
                <label for="info" style="font-size: large; font-weight: bolder;">Thay đổi thông tin về "<?php echo $j_str[0]['field'] ?>"</label>
                <br>
                <br>
                <input class="form-control" type="text" id="field" name="field" value="<?php echo $j_str[0]['field'] ?>" hidden>
                <input class="form-control" type="text" id="idx" name="idx" value="<?php echo $j_str[0]['id'] ?>" hidden>
                <input class="form-control" type="text" id="info" name="info" value="<?php echo $j_str[0]['infor'] ?>">
                <br>
                <input type="checkbox" name="agree" id="agree" > Xác nhận thay đổi
                <br>
                <div class="col text-center">
                    <button type="submit" class="btn btn-success" name="btnSave" id="btnSave">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
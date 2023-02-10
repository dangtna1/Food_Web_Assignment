<?php
    $con = mysqli_connect("localhost", "root", "", "foodweb_db");
    if(isset($_POST["btnSave"])){
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $ID = $_POST['idx'];
        $img = $_POST['image'];

        if($_POST['agree'] == "1"){
            if(!filter_var($name, FILTER_VALIDATE_INT) && 5 <= strlen($name) && strlen($name) <= 30){
                    $result = mysqli_query($con, "UPDATE `food` SET `name`='$name', `cost`='$cost', `image`='$img' WHERE `id`='$ID'");
                    echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Thay đổi thông tin thành công...');
                        window.location.href='../Main/manage_menu.php';
                        </script>");
            }
            else echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Thay đổi thông tin thất bại...');
                    window.location.href='../Main/manage_menu.php';
                    </script>");
        }
        else echo ("<script LANGUAGE='JavaScript'>
                window.alert('Vui lòng xác nhận thay đổi...');
                window.location.href='../Main/manage_menu.php';
                </script>");
    }

    if(isset($_POST['btnDelete'])){
        $ID = $_POST['idx'];

        $result = mysqli_query($con, "DELETE FROM `food` WHERE `id`='$ID'");
        
        if($result) echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Xóa thông tin thành công...');
                        window.location.href='../Main/manage_menu.php';
                        </script>");
        else echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Xóa thông tin thất bại...');
                        window.location.href='../Main/manage_menu.php';
                        </script>");
    }

    if(isset($_POST['btnAdd'])){
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $ID = $_POST['idx'];
        $img = $_POST['image'];
        $type = $_POST['foodtypeId'];

        if($_POST['agree'] == "1"){
            if(!filter_var($name, FILTER_VALIDATE_INT) && 5 <= strlen($name) && strlen($name) <= 30){
                if(is_numeric($ID) && is_numeric($cost)){
                    $result = mysqli_query($con, "INSERT INTO `food`(`id`, `name`, `cost`, `image`, `foodtypeId`) VALUES ('$ID','$name','$cost','$img','$type')");
                    echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Thêm thông tin thành công...');
                        window.location.href='../Main/manage_menu.php';
                        </script>");
                }else echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Thêm thông tin thất bại...');
                    window.location.href='../Main/manage_menu.php';
                    </script>");
            }
            else echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Thêm thông tin thất bại...');
                    window.location.href='../Main/manage_menu.php';
                    </script>");
        }
        else echo ("<script LANGUAGE='JavaScript'>
                window.alert('Vui lòng xác nhận thay đổi...');
                window.location.href='../Main/manage_menu.php';
                </script>");
    }
?>
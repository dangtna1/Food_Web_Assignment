<?php

    $con = mysqli_connect("localhost", "root", "", "foodweb_db");

    if(isset($_POST["btnSave"])){
        $field = $_POST['field'];
        $ID = $_POST['idx'];
        $data= $_POST['info'];

        if(isset($_POST['agree'])){
            if($field == "Phone"){
                if(filter_var($ID, FILTER_VALIDATE_INT) && strlen($data) == 10){
                    $result = mysqli_query($con, "UPDATE `publicinfo` SET `infor`='$data' WHERE `id`='$ID'");
                    echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Thay đổi thông tin thành công...');
                            window.location.href='../Main/contact_infor.php';
                            </script>");
                }else echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Thay đổi thất bại...');
                            window.location.href='../Main/contact_infor.php';
                            </script>");
            }else if($field == "Email") {
                if(filter_var($data, FILTER_VALIDATE_EMAIL)){
                    $result = mysqli_query($con, "UPDATE `publicinfo` SET `infor`='$data' WHERE `id`='$ID'");
                    echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Thay đổi thông tin thành công...');
                            window.location.href='../Main/contact_infor.php';
                            </script>");
                }else echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Thay đổi thất bại...');
                            window.location.href='../Main/contact_infor.php';
                            </script>");
            }
        }else echo ("<script LANGUAGE='JavaScript'>
            window.alert('Vui lòng xác nhận thay đổi...');
            window.location.href='../Main/contact_infor.php';
            </script>");
    }
?>
<?php
    include "..\Function_Method\config.php";
    $id=$_POST['id'];
    $sql1 = "SELECT quantity FROM content WHERE id = '$id'";
    $result = $con->query($sql1);
    $row = $result->fetch_assoc();
    $quantity = $row['quantity']+1;
    $sql2 = "UPDATE content SET quantity = '$quantity' WHERE id='$id'";
    if ($con->query($sql2) === TRUE) {
        echo "Cập nhật thành công";
    } else {
        echo "Cập nhật thất bại";
    }
    $con->close();
?>
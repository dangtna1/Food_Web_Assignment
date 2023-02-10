<?php
    session_start();
    include "..\Function_Method\config.php";
    $id=$_POST['id'];
    $sql = "DELETE FROM content WHERE id='$id'";
    if ($con->query($sql) === TRUE) {
        echo "Xóa thành công";
    } else {
        echo "Error updating record: " . $con->error;
    }
    $orderId = $_SESSION['orderId'];
    $check = mysqli_query($con, "SELECT * FROM content WHERE orderId = '$orderId'");
    $count = mysqli_num_rows($check);
    if ($count == 0) {
        unset($_SESSION['total']);
    }
    $con->close();
?>

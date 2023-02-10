<?php
    //create a new cart for user
    session_start();
    unset($_SESSION["orderId"]);
    unset($_SESSION["total"]);
    include "..\Function_Method\config.php";
    $userId = $_SESSION['userId'];
    $result = mysqli_query($con, "INSERT INTO orders (userId, status) VALUES ('$userId', '0')");
    if ($result) {
        $last_id = $con->insert_id; 
        $_SESSION['orderId'] = $last_id;
    }
    header("Location: cart_with_user.php");
?>
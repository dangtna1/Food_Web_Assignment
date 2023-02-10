<?php
    session_start();
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        include '..\Function_Method\config.php';
        $sql1 = "SELECT name, cost, image, foodtypeId FROM food WHERE ID = $id";
        $result = $con->query($sql1);
        $row = $result->fetch_assoc();
        $image = $row['image'];
        $name = $row['name'];
        $cost = $row['cost'];
        $foodtypeId = $row['foodtypeId'];
        $orderId = $_SESSION['orderId'];    
        $sql2 = "INSERT INTO content (name, cost, image, quantity, orderId) VALUES ('$name', '$cost', '$image', '1', '$orderId')";
        if(mysqli_query($con, $sql2)) {
            echo "Thêm vào giỏ hàng thành công";
        } else {
            echo "Thêm vào giỏ hàng thất bại";
        } 
        mysqli_close($con);  
    }
?>
<?php

    header("Content-Type: application/json");
    
    $con = mysqli_connect("localhost", "root", "", "foodweb_db");

    $result = mysqli_query($con, "SELECT * FROM `food`");

    $j_str = array();

    while($row =mysqli_fetch_assoc($result))
    {
        $j_str[] = $row;
    }

    echo json_encode($j_str);
?>
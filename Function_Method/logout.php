<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["userId"]);
    unset($_SESSION["orderId"]);
    unset($_SESSION["total"]);
    header("Location:..\Main\index.php");
?>
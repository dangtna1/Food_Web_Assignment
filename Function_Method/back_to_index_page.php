<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location:..\Main\index.php");
    } else {
        if($_SESSION['username'] != 'admin') {
            header("Location:..\Main\login_success.php");
        } else {
            header("Location:..\Main\admin.php");
        }
    }
?>
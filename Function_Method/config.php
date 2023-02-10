<?php
$con = mysqli_connect("localhost","root","","foodweb_db");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
?>
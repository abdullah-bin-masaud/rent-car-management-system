<?php
$conn = mysqli_connect("localhost","root","","rent_car_db");
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}
?>

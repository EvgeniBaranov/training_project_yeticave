<?php
$con = mysqli_connect("localhost", "root", "root", "yeticave");
mysqli_set_charset($con, "utf8");

if (!$con) {
    die("fff: " . mysqli_connect_error());
} else {
}
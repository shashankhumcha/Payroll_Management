<?php
error_reporting(0);
session_start();
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "payroll_management";

$conn = mysqli_connect($servername, $user, $pass, $dbname);

if (!$conn) {
    echo "!";
} else {
    echo ".";
}
?>
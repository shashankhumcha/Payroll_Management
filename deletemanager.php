<?php
include("connect.php");
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
error_reporting(0);
$id = $_GET['Emp_id'];
$query = "DELETE FROM manages WHERE Emp_id='$id'";
$data = mysqli_query($conn, $query);
if ($data) {
    echo "Record Deleted from Database";
    header('location:managers.php');
} else {
    echo "Failed to delete Record from Database";
}
?>
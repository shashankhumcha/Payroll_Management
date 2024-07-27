<?php
include("connect.php");

if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}

error_reporting(0);
$id = $_GET['Dept_id'];
$query = "DELETE FROM department WHERE Dept_id='$id'";
$data = mysqli_query($conn, $query);
if ($data) {
    echo "Record Deleted from Database";
    header('location:department.php');
} else {
    echo "Failed to delete Record from Database";
}
?>
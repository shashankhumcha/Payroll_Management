<?php
include("connect.php");
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
error_reporting(0);
$eid = $_GET['Emp_id'];
$did = $_GET['Dept_id'];
$query = "DELETE FROM department WHERE Emp_id='$eid' AND Dept_id='$did';";
$data = mysqli_query($conn, $query);
if ($data) {
    echo "Record Deleted from Database";
    header('location:work.php');
} else {
    echo "Failed to delete Record from Database";
}
?>
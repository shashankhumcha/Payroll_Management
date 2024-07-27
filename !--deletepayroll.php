<?php
include("connect.php");

if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}

error_reporting(0);
$id = $_GET['Sb_id'];
$year = $_GET['year'];
$Month = $_GET['Month'];
$query = "DELETE FROM payroll WHERE Sb_id='$id' AND Year='$year' and Month='$Month';";
$data = mysqli_query($conn, $query);
if ($data) {
    echo "Record Deleted from Database";
    header('location:payroll.php');
} else {
    echo "Failed to delete Record from Database";
}
?>
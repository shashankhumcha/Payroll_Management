<?php
include("connect.php");
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $year = $_GET['year'];
    $Month = $_GET['Month'];

    $sql = "select total from salary_breakup where Sb_id='$id' and Year='$year' and Month='$Month';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $sql1 = "select Basic_salary from employee where Emp_id='$id';";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $etotal = $row1['Basic_salary'];

    $sql2 = "UPDATE payroll SET Total_pay='$total'+'$etotal' WHERE Sb_id='$id' and Year='$year' and Month='$Month';";
    $result2 = mysqli_query($conn, $sql2);

    if (!$result) {
        echo "error";
    } else {
        header('location:payroll.php');
    }

}

?>
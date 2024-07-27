<?php
include("connect.php");
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title> Payroll Management</title>
    <link rel="stylesheet" a href="style.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <div class="admin">
            <h2>Hello Admin!! Welcome back..</h2>
            <a href="employee.php">
            <button class="admin-login">EMPLOYEE</button><br><br><br>
        </a>
        <a href="department.php">
            <button class="admin-login">DEPARTMENT</button><br><br><br>
        </a>
        <a href="salary_breakup.php">
            <button class="admin-login">SALARY BREAKUP</button><br><br><br>
        </a>
        <a href="payroll.php">
            <button class="admin-login">PAYROLL</button><br><br><br>
        </a>
        <a href="managers.php">
            <button class="admin-login">MANAGERS</button><br><br><br>
        </a>
        <a href="work.php">
            <button class="admin-login">WORKING</button><br><br><br>
        </a>
            <form align="right" name="form1" method="post" action="logout.php">
            <button type="submit " mane="login" class="logoutLblPos">Logout</button>
</form>
    </div>
</body>

</html>
<?php

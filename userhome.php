<?php
include("connect.php");

if (!isset($_SESSION['USER_ID'])) {
    header("location:userlogin.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Payroll Details</title>
    <link rel="stylesheet" a href="style.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <div class="admin">
        <h2>Hello User!! Welcome back..</h2>
        <a href="userpayment.php">
            <button class="admin-login">PAYMENT</button><br><br><br><br><br>
        </a>
        <a href="userprofile.php">
            <button class="admin-login">PROFILE</button><br><br><br><br><br>
        </a>
        <form align="right" name="form1" method="post" action="logout.php">
            <button type="submit " mane="login" class="logoutLblPos">LOGOUT</button>
        </form>
    </div>
</body>

</html>
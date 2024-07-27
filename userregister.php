<?php
include("connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Register</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <h2 align="center">Enter ID and password</h2>
    <a href="userlogin.php">
        <button title="Login Page" class="logoutLblPos1">Back</button>
    </a>
    <form method="POST">
        <label for="Emp_id" class="form">Employee_id</label><br>
        <input type="text" id="Emp_id" name="Emp_id" placeholder="ID" maxlength="5" class="form"><br><br>
        <label for="Email_id" class="form">Email_id/Username</label><br>
        <input type="email" id="Email_id" name="Email_id" paceholder="ID" maxlength="30" class="form"><br><br>
        <label for="password" class="form">Password</label><br>
        <input type="text" id="password" name="password" palceholder="password" maxlength="30" class="form"><br><br>
        <input type="submit" name="Submit" value="Register" class="buttonemp">

    </form>
    <?php

    if (isset($_POST['Submit'])) {
        $Emp_id = $_POST['Emp_id'];
        $Email_id = $_POST['Email_id'];
        $password = $_POST['password'];

        $sql1 = "INSERT INTO emplogin VALUES ('$Emp_id','$Email_id','$password');";
        $result = mysqli_query($conn, $sql1);


        if (!$result) {
            echo '<div class="wrong_psswd">Registration Fail!!!</div>';
        } else {
            header('location:userlogin.php');
        }
    }
    ?>


</body>

</html>
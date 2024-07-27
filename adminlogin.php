<?php
include("connect.php");

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from admin where username='$username'AND password='" . $password . "' limit 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['USER_ID'] = $row['username'];
        header('location:adminhome.php');
    } else {
        echo '<div class="wrong_psswd">You Have Entered Incorrect Password!!</div>';
    }

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
    <div class="container">
        <img src="image/login.jpeg" />
        <form method="post" action="#">
            <h3>Admin Login</h3>
            <div class="form-input">
                <input type="text" name="username" placeholder="Enter the User Name" required />
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Enter Password" required />
            </div>
            <input type="submit" name="login" value="LOGIN" class="btn-login" />&emsp;<br><br>
            <a href="userlogin.php" class=".href-user">I am a user</a>
        </form>
    </div>
</body>

</html>
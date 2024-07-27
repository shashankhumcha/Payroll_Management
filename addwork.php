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
    <title>Add Work</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <h2 align="center">Enter Work details</h2>
    <a href="work.php">
            <button class="logoutLbPos2">Back</button>
    </a>
    <a href="logout.php">
        <button class="logoutLblPos" title="Logout">Logout</button></a>
    <a href="adminhome.php">
        <button class="logoutLblPos1" title="Home">Home</button></a>
    <form  method="POST">
        <label for="Emp_id" class="form">Employee_id</label><br>
        <input type="text" id="Emp_id" name="Emp_id" placeholder="ID" maxlength="5" class="form"><br><br><br>
        <label for="Dept_id" class="form">Department_id</label><br>
        <input type="text" id="Dept_id" name="Dept_id" placeholder="Dept_id" maxlength="5" class="form"><br><br><br>
        <label for="Hours" class="form">Hours</label><br>
        <input type="number" id="Hours" name="Hours" placeholder="Hours" class="form"><br><br><br>
        <input type="submit" name="Submit" placeholder="Submit" class="buttonemp">

    </form>
    <?php

    if (isset($_POST['Submit'])) {
        $Emp_id = $_POST['Emp_id'];
        $Dept_id = $_POST['Dept_id'];
        $Hours = $_POST['Hours'];


        $sql1 = "INSERT INTO works_for VALUES ('$Emp_id','$Dept_id','$Hours');";
        $result = mysqli_query($conn, $sql1);

    
    if (!$result) {
        echo '<div class="wrong_psswd">Insertion fail!!!</div>';
    } 
    else {
        header('location:work.php');
    }
}
    ?>


</body>

</html>
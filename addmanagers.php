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
    <title>Add Managers</title>
    <link rel="stylesheet" a href="style5.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <h2 align="center">Enter Manager details</h2>
    <a href="managers.php">
            <button class="logoutLbPos2">Back</button>
    </a>
    <a href="logout.php">
        <button class="logoutLblPos" title="Logout">Logout</button></a>
    <a href="adminhome.php">
        <button class="logoutLblPos1" title="Home">Home</button></a>
    <form  method="POST">
        <label for="Emp_id" class="addlabel">Employee_id</label><br>
        <input type="text" id="Emp_id" name="Emp_id" placeholder="ID" maxlength="5" class="deptform"><br><br>
        <label for="Dept_id" class="addlabel">Department_id</label><br>
        <input type="text" id="Dept_id" name="Dept_id" placeholder="ID" maxlength="5" class="deptform"><br><br>
        <label for="Start_Date" class="addlabel">Start Date</label><br>
        <input type="date" id="Start_Date" name="Start_Date" placeholder="Start Date" class="deptform"><br><br>
        <label for="End_Date" class="addlabel">End_Date</label><br>
        <input type="date" id="End_Date" name="End_Date"  class="deptform" ><br><br>
        <input type="submit" name="Submit" placeholder="Submit" class="button">

    </form>
    <?php

    if (isset($_POST['Submit'])) {
        $Emp_id = $_POST['Emp_id'];
        $Dept_id = $_POST['Dept_id'];
        $Start_Date = $_POST['Start_Date'];
        $End_Date = $_POST['End_Date'];


        $sql1 = "INSERT INTO manages VALUES ('$Emp_id','$Dept_id','$Start_Date','$End_Date');";
        $result = mysqli_query($conn, $sql1);

    
    if (!$result) {
        echo '<div class="wrong_psswd">Insertion fail!!!</div>';
    } else {
        header('location:managers.php');
    }
}
    ?>


</body>

</html>
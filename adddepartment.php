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
    <title>Add Department</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <h2 align="center">Enter department details</h2>
    <a href="department.php">
        <button title="Department Details" class="logoutLbPos2">Back</button>
    </a>
    <a href="logout.php">
        <button class="logoutLblPos" title="Logout">Logout</button></a>
    <a href="adminhome.php">
        <button class="logoutLblPos1" title="Home">Home</button></a>

    <form align="center" method="POST">
        <label for="Dept_id" class="addlabel1">Department_id</label><br>
        <input type="text" id="Dept_id" name="Dept_id" placeholder="ID" maxlength="5" class="deptform"
            required><br><br><br>
        <label for="Dname" class="addlabel">Department</label><br>
        <input type="text" id="Dname" name="Dname" placeholder="Name" maxlength="30" class="deptform"
            required><br><br><br>
        <label for="Mgr_id" class="addlabel">Manager_id</label><br>
        <input type="text" id="Mgr_id" name="Mgr_id" placeholder="Manager id" maxlength="5"
            class="deptform"><br><br><br>
        <input type="submit" name="Submit" placeholder="Submit" class="button1" title="ADD">
    </form>
    <?php

    if (isset($_POST['Submit'])) {
        $Dept_id = $_POST['Dept_id'];
        $Dname = $_POST['Dname'];
        $Mgr_id = $_POST['Mgr_id'];


        $sql1 = "INSERT INTO department VALUES ('$Dept_id','$Dname','$Mgr_id');";
        $result = mysqli_query($conn, $sql1);


        if (!$result) {
            echo '<div class="wrong_psswd">Insertion fail!!!</div>';
        } else {
            header('location:department.php');
        }
    }
    ?>


</body>

</html>
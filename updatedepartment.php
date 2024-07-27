<?php
include("connect.php");
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select * from department where Dept_id='$id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (!$result) {
        header('location:department.php');
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Department</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <h2 align="center">Update department details</h2>
    <a href="department.php">
        <button class="logoutLbPos2" title="Department Details">Back</button>
    </a>
    <a href="logout.php">
        <button class="logoutLblPos" title="Logout">Logout</button></a>
    <a href="adminhome.php">
        <button class="logoutLblPos1" title="Home">Home</button></a>
    <form align="center" method="POST">
        <label for="Dname" class="addlabel">Department</label><br>
        <input type="text" id="Dname" name="Dname" value="<?php echo $row['Dname']; ?>" maxlength="30" class="deptform"
            required><br><br><br>
        <label for="Mgr_id" class="addlabel">Manager_id</label><br>
        <input type="text" id="Mgr_id" name="Mgr_id" value="<?php echo $row['Mgr_id']; ?>" maxlength="5"
            class="deptform"><br><br><br>
        <input type="submit" name="Update" value="UPDATE" class="button1" title="UPDATE">
    </form>
    <?php

    if (isset($_POST['Update'])) {
        $Dname = $_POST['Dname'];
        $Mgr_id = $_POST['Mgr_id'];


        $sql1 = "UPDATE department SET Dname='$Dname',Mgr_id='$Mgr_id' WHERE Dept_id='$id';";
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
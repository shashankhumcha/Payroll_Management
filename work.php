<?php
include("connect.php");
$query = "SELECT * FROM works_for";
$result = mysqli_query($conn, $query);
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Working</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <a href="addwork.php"> <button class="button button5">ADD</button></a>
    <table border="2px" bgcolor="lightgrey" align="center" width="1200">
        <a href="logout.php">
            <button class="logoutLblPos">Logout</button></a>
        <a href="adminhome.php">
            <button class="logoutLblPos1">Home</button></a>
        <tr>
            <th colspan="4">
                <h4>Working Details</h4>
            </th>
        </tr>
        <tr>
            <th>Employment_id</th>
            <th>Department_id</th>
            <th>Hours</th>
            <th>Delete</th>
        </tr>
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td>
                    <?php echo $rows['Emp_id']; ?>
                </td>
                <td>
                    <?php echo $rows['Dept_id']; ?>
                </td>
                <td>
                    <?php echo $rows['Hours']; ?>
                </td>
                <td><a href='deletework.php?Emp_id=<?php echo $rows['Emp_id']; ?>&Dept_id=<?php echo $rows['Dept_id']; ?>'><button
                            type="submit " name="delete">DELETE</button></a>
                </td>
            </tr>

            <?php
        }
        ?>
    </table>
</body>

</html>
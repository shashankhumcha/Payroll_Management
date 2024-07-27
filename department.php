<?php
include("connect.php");
$query = "SELECT * FROM department ORDER BY Dept_id";
$result = mysqli_query($conn, $query);
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Department</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <a href="adddepartment.php"> <button class="button button5">ADD</button></a>
    <table border="2px" bgcolor="lightgrey" align="center" width="1400">
        <a href="logout.php">
            <button class="logoutLblPos" title="Logout">Logout</button></a>
        <a href="adminhome.php">
            <button class="logoutLblPos1" title="Home">Home</button></a>
        <tr>
            <th colspan="5">
                <h4>Department Details</h4>
            </th>
        </tr>
        <tr>

            <th>Department_id</th>
            <th>Department Name</th>
            <th>Manager_id</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td>
                    <?php echo $rows['Dept_id']; ?>
                </td>
                <td>
                    <?php echo $rows['Dname']; ?>
                </td>
                <td>
                    <?php echo $rows['Mgr_id']; ?>
                </td>
                <td><a align="center" href='updatedepartment.php?id=<?php echo $rows['Dept_id']; ?>'>
                        <button type="submit " name="UPDATE">UPDATE</button></a></td>
                <td><a href='deletedepartment.php?Dept_id=<?php echo $rows['Dept_id']; ?>' title="DELETE"><button
                            type="submit" name="DELETE">DELETE</button></a>
                </td>
            </tr>

            <?php
        }
        ?>

    </table>
</body>

</html>
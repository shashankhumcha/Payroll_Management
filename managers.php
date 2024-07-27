<?php
include("connect.php");
$query = "SELECT * FROM manages";
$result = mysqli_query($conn, $query);
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Managers</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <a href="addmanagers.php"> <button class="button button5">ADD</button></a>
    <table border="2px" bgcolor="lightgrey" align="center" width="1200">
        <a href="logout.php">
            <button class="logoutLblPos">Logout</button>
            <a href="adminhome.php">
                <button class="logoutLblPos1">Home</button>
                <tr>
                    <th colspan="5">
                        <h4>Managers details</h4>
                    </th>
                </tr>
                <tr>
                    <th>Employee_id</th>
                    <th>Department_id</th>
                    <th>Start_Date</th>
                    <th>End_Date</th>
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
                            <?php echo $rows['Start_Date']; ?>
                        </td>
                        <td>
                            <?php echo $rows['End_Date']; ?>
                        </td>
                        <td><a href='deletemanager.php?Emp_id=<?php echo $rows['Emp_id']; ?>'><button type="submit "
                                    name="delete">DELETE</button></a></td>
                    </tr>
                    <?php
                }
                ?>

    </table>
</body>

</html>
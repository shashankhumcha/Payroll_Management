<?php
include("connect.php");
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
$query = "SELECT * FROM payroll";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Payroll</title>
    <link rel="stylesheet" a href="style.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <a href="adminhome.php">
        <button class="logoutLblPos1">Home</button></a>
    <form align="right" name="form1" method="post" action="logout.php">
        <button type="submit " mane="login" class="logoutLblPos">LOGOUT</button>
    </form><br><br><br><br><br><br>
    <table border="2px" bgcolor="lightgrey" align="center" width="1300">
        <tr>
            <th colspan="5">
                <h3>Payroll</h3>
            </th>
        </tr>
        <tr>
            <th>Employment_id</th>
            <th>Year</th>
            <th>Month</th>
            <th>Total Salary</th>
            <th>Update</th>

        </tr>
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td>
                    <?php echo $rows['Sb_id']; ?>
                </td>
                <td>
                    <?php echo $rows['Year']; ?>
                </td>
                <td>
                    <?php echo $rows['Month']; ?>
                </td>
                <td>
                    <?php echo $rows['Total_pay']; ?>
                </td>
                <td><a align="center"
                        href='updatepayroll.php?id=<?php echo $rows['Sb_id']; ?>&year=<?php echo $rows['Year']; ?>&Month=<?php echo $rows['Month']; ?>'>
                        <button type="submit " name="UPDATE" align="center">UPDATE</button></a></td>
                </td>
            </tr>

            <?php
        }
        ?>

    </table>


</body>

</html>
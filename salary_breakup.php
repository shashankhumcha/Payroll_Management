<?php
include("connect.php");
$query = "SELECT * FROM salary_breakup ORDER BY Sb_id,Year,Month;";
$result = mysqli_query($conn, $query);
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Salary Breakup</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <a href="addsb.php"> <button class="button button5" title="ADD">ADD</button></a>
    <table border="2px" bgcolor="lightgrey" align="center" width="1490">
        <a href="logout.php">
            <button class="logoutLblPos" title="Logout">Logout</button></a>
        <a href="adminhome.php">
            <button class="logoutLblPos1" title="Home">Home</button></a>
        <tr>
            <th colspan="14">
                <h4>Salary Details</h4>
            </th>
        </tr>
        <tr>

            <th>Salary_Breakup_id</th>
            <th>Year</th>
            <th>Month</th>
            <th>House_allowance</th>
            <th>Loan_Cut</th>
            <th>Bonus</th>
            <th>Other Bonus</th>
            <th>Medical Allowance</th>
            <th>Overtime</th>
            <th>PF</th>
            <th>Absence</th>
            <th>Total</th>
            <th>UPDATE</th>
            <th>DELETE</th>
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
                    <?php echo $rows['House_allowance']; ?>
                </td>
                <td>
                    <?php echo $rows['loan_cut']; ?>
                </td>
                <td>
                    <?php echo $rows['Bonus']; ?>
                </td>
                <td>
                    <?php echo $rows['other_bonus']; ?>
                </td>
                <td>
                    <?php echo $rows['Medical_allowance']; ?>
                </td>
                <td>
                    <?php echo $rows['overtime']; ?>
                </td>
                <td>
                    <?php echo $rows['PF']; ?>
                </td>
                <td>
                    <?php echo $rows['Absence']; ?>
                </td>
                <td>
                    <?php echo $rows['total']; ?>
                </td>
                <td><a align="center"
                        href='updatesb.php?id=<?php echo $rows['Sb_id']; ?>&year=<?php echo $rows['Year']; ?>&Month=<?php echo $rows['Month']; ?>'>
                        <button type="submit " name="UPDATE">UPDATE</button></a></td>
                <td><a href='deletesb.php?Sb_id=<?php echo $rows['Sb_id']; ?>&year=<?php echo $rows['Year']; ?>&Month=<?php echo $rows['Month']; ?>'
                        title="DELETE EMPLOYEE"><button type="submit " name="delete">DELETE</button></a>
                </td>
            </tr>
            <?php
        }
        ?>

    </table>
</body>

</html>
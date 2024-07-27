<?php
include("connect.php");

if (!isset($_SESSION['USER_ID'])) {
    header("location:userlogin.php");
    die();
}
$user = $_SESSION['USER_ID'];

$query = "SELECT SB.Sb_id,SB.Year,SB.Month,E.Basic_Salary,SB.House_allowance,SB.loan_cut,SB.Bonus,SB.other_bonus,SB.Medical_allowance,SB.overtime,SB.PF,SB.Absence,P.Total_pay FROM salary_breakup SB,payroll P,employee E WHERE  E.Emp_id=SB.Sb_id AND SB.Sb_id=P.Sb_id AND SB.Year=P.Year AND SB.Month=P.Month AND E.Emp_id='$user'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Salary Breakup</title>
    <link rel="stylesheet" a href="style.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <a href="logout.php">
        <button class="logoutLblPos">Logout</button></a>
    <a href="userhome.php" title="Home">
        <button class="logoutLblPos1">Home</button></a>
    </a><br><br><br><br><br><br>
    <table border="2px" bgcolor="lightgrey" align="center" width="1490">
        <tr>
            <th colspan="14">
                <h3>Salary Details</h3>
            </th>
        </tr>
        <tr>
            <th>Employee_id</th>
            <th>Year</th>
            <th>Month</th>
            <th>Basic_Salary</th>
            <th>House_allowance</th>
            <th>Loan_Cut</th>
            <th>Bonus</th>
            <th>Other Bonus</th>
            <th>Medical Allowance</th>
            <th>Overtime</th>
            <th>PF</th>
            <th>Absence</th>
            <th>Total</th>
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
                    <?php echo $rows['Basic_Salary']; ?>
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
                    <?php echo $rows['Total_pay']; ?>
                </td>
            </tr>
            <?php
        }
        ?>

    </table>
</body>

</html>
<?php
include("connect.php");


if (!isset($_SESSION['USER_ID'])) {
    header("location:userlogin.php");
    die();
}

$user = $_SESSION['USER_ID'];

$query = "SELECT E.Emp_id,E.Name,E.Address,E.Gender,E.email_id,E.Phone,E.Bank_Acc_No,E.Dob,E.Start_date,E.PF_Sum,E.loan,E.Job_Title,E.Dept_id FROM employee E WHERE Emp_id='$user'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee</title>
    <link rel="stylesheet" a href="style.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <a href="logout.php">
        <button class="logoutLblPos">Logout</button></a>
    <a href="userhome.php" title="Home">
        <button class="logoutLblPos1">Home</button></a>
    </a><br><br><br><br><br><br>
    <table border="2px" bgcolor="lightgrey" align="center" width="1500">
        <tr>
            <th colspan="14">
                <h3>Employee Details</h3>
            </th>
        </tr>
        <tr>
            <th>Employee_id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Email_id</th>
            <th>Phone</th>
            <th>Bank_Acc_No</th>
            <th>Birth Date</th>
            <th>Start_date</th>
            <th>PF</th>
            <th>Loan</th>
            <th>Job_Title</th>
            <th>Department_id</th>
        </tr>
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td>
                    <?php echo $rows['Emp_id']; ?>
                </td>
                <td>
                    <?php echo $rows['Name']; ?>
                </td>
                <td>
                    <?php echo $rows['Address']; ?>
                </td>
                <td>
                    <?php echo $rows['Gender']; ?>
                </td>
                <td>
                    <?php echo $rows['email_id']; ?>
                </td>
                <td>
                    <?php echo $rows['Phone']; ?>
                </td>
                <td>
                    <?php echo $rows['Bank_Acc_No']; ?>
                </td>
                <td>
                    <?php echo $rows['Dob']; ?>
                </td>
                <td>
                    <?php echo $rows['Start_date']; ?>
                </td>
                <td>
                    <?php echo $rows['PF_Sum']; ?>
                </td>
                <td>
                    <?php echo $rows['loan']; ?>
                </td>
                <td>
                    <?php echo $rows['Job_Title']; ?>
                </td>
                <td>
                    <?php echo $rows['Dept_id']; ?>
                </td>
            </tr>
            <?php
        }
        ?>

    </table>
</body>

</html>
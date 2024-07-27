<?php
include("connect.php");
$query = "SELECT * FROM employee ORDER BY Emp_id";
$result = mysqli_query($conn, $query);
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <a href="addemployee.php" title="ADD"> <button class="button button5">ADD</button></a>
    <table border="2px" bgcolor="lightgrey" align="center" width="1600">
        <a href="logout.php">
            <button class="logoutLblPos" title="Logout">Logout</button></a>
        <a href="adminhome.php">
            <button class="logoutLblPos1" title="Home">Home</button></a>
        <tr>
            <th colspan="16">
                <h4>Employee Details</h4>
            </th>
        </tr>
        <tr>

            <th>ID</th>
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
            <th>Basic_Salary</th>
            <th>Department_id</th>
            <th>Update</th>
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
                    <?php echo $rows['Basic_Salary']; ?>
                </td>
                <td>
                    <?php echo $rows['Dept_id']; ?>
                </td>
                <td><a align="center" href='updateemployee.php?id=<?php echo $rows['Emp_id']; ?>'>
                        <button type="submit " name="UPDATE">UPDATE</button></a></td>
                <td><a href='deleteemployee.php?Emp_id=<?php echo $rows['Emp_id']; ?>'><button type="submit "
                            name="delete">DELETE</button></a></td>

            </tr>
            <?php
        }
        ?>

    </table>
</body>

</html>
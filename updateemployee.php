<?php
include("connect.php");
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select * from employee where Emp_id='$id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (!$result) {
        header('location:employee.php');
    }

}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Update Employee</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">

</head>

<body>
    <h1 align="center">Update employee details</h1>
    <a href="employee.php" title="Employee Details">
        <button class="logoutLbPos2">Back</button></a>
    <a href="adminhome.php" title="Home">
        <button class="logoutLblPos1">Home</button></a>
    <a href="logout.php" title="Logout">
        <button class="logoutLblPos">Logout</button></a>
    </a>
    <form method="POST">
        <label for="Name" class="addlabel2">Name</label><br>
        <input type="text" id="Name" name="Name" value="<?php echo $row['Name']; ?>" maxlength="20" class="form"
            required><br><br>
        <label for="Address" class="addlabel2">Address</label><br>
        <input type="text" id="Address" name="Address" value="<?php echo $row['Address']; ?>" maxlength="30"
            class="form" required><br><br>
        <label for="Gender" class="addlabel2">Gender</label><br>
        <input type="text" id="Gender" name="Gender" value="<?php echo $row['Gender']; ?>" list="gender" class="form"
            required>
        <datalist id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </datalist><br><br>
        <label for="email_id" class="addlabel2">Email_id</label><br>
        <input type="email" id="email_id" name="email_id" value="<?php echo $row['email_id']; ?>" maxlength="25"
            class="form" required><br><br>
        <label for="Phone" class="addlabel2">Phone</label><br>
        <input type="tel" id="Phone" name="Phone" value="<?php echo $row['Phone']; ?>" maxlength="10" class="form"
            required><br><br>
        <label for="Bank_Acc_No" class="addlabel2">Bank_Acc_No</label><br>
        <input type="text" inputmode="numeric" id="Bank_Acc_No" name="Bank_Acc_No"
            value="<?php echo $row['Bank_Acc_No']; ?>" maxlength="16" minlength="11" class="form" required><br><br>
        <label for="Dob" class="addlabel2">Birth Date</label><br>
        <input type="date" id="Dob" name="Dob" value="<?php echo $row['Dob']; ?>" class="form" required><br><br>
        <label for="Start_date" class="addlabel2">Start Date</label><br>
        <input type="date" id="Start_date" name="Start_date" value="<?php echo $row['Start_date']; ?>" class="form"
            required><br><br>
        <label for="PF_Sum" class="addlabel2">PF</label><br>
        <input type="number" step="0.01" id="PF_Sum" name="PF_Sum" value="<?php echo $row['PF_Sum']; ?>" class="form"
            required><br><br>
        <label for="loan" class="addlabel2">Loan</label><br>
        <input type="number" step="0.01" id="loan" name="loan" value="<?php echo $row['loan']; ?>" class="form"
            required><br><br>
        <label for="Job_Title" class="addlabel2">Job Title</label><br>
        <input type="text" id="Job_Title" name="Job_Title" value="<?php echo $row['Job_Title']; ?>" maxlength="20"
            class="form" required><br><br>
        <label for="Basic_Salary" class="addlabel2">Basic Salary</label><br>
        <input type="number" step="0.01" id="Basic_Salary" name="Basic_Salary"
            value="<?php echo $row['Basic_Salary']; ?>" class="form" required><br><br>
        <label for="Dept_id" class="addlabel2">Department_id</label><br>
        <input type="text" id="Dept_id" name="Dept_id" value="<?php echo $row['Dept_id']; ?>" maxlength="5"
            class="form"><br><br>
        <input type="submit" name="Update" class="buttonemp" title="UPDATE">

    </form>
    <?php

    if (isset($_POST['Update'])) {
        $Name = $_POST['Name'];
        $address = $_POST['Address'];
        $gender = $_POST['Gender'];
        $mail = $_POST['email_id'];
        $phone = $_POST['Phone'];
        $Bank_Acc_No = $_POST['Bank_Acc_No'];
        $Dob = $_POST['Dob'];
        $Start_date = $_POST['Start_date'];
        $PF_Sum = $_POST['PF_Sum'];
        $loan = $_POST['loan'];
        $Job_Title = $_POST['Job_Title'];
        $Basic_Salary = $_POST['Basic_Salary'];
        $Dept_id = $_POST['Dept_id'];

        $sql1 = "UPDATE employee SET Name='$Name',Address='$address',Gender='$gender',email_id='$mail', Phone='$phone',Bank_Acc_No='$Bank_Acc_No',Dob='$Dob',Start_date='$Start_date',PF_Sum='$PF_Sum',loan='$loan',Job_Title='$Job_Title',Basic_Salary='$Basic_Salary',Dept_id='$Dept_id' WHERE Emp_id='$id';";
        $result1 = mysqli_query($conn, $sql1);


        if (!$result1) {
            echo '<div class="wrong_psswd">Update fail!!!</div>';
        } else {
            header('location:employee.php');
        }
    }
    ?>


</body>

</html>
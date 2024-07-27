<?php
include("connect.php");
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Employee</title>
    <link rel="stylesheet" a href="style1.css">
    <link rel="stylesheet" a href="fonts/css/all.css">

</head>

<body>
    <h1 align="center">Enter employee details</h1>
    <a href="employee.php">
        <button title="Employee details" class="logoutLbPos2">Back</button>
        <a href="logout.php" title="Logout">
            <button class="logoutLblPos">Logout</button></a>
        <a href="adminhome.php" title="Home">
            <button class="logoutLblPos1">Home</button></a>
    </a>
    <form method="POST">
        <label for="Emp_id" class="addlabel2">Employee_id</label><br>
        <input type="text" id="Emp_id" name="Emp_id" placeholder="ID" maxlength="5" class="form" required><br><br>
        <label for="name" class="addlabel2">Name</label><br>
        <input type="text" id="name" name="name" placeholder="Name" maxlength="20" class="form" required><br><br>
        <label for="Address" class="addlabel2">Address</label><br>
        <input type="text" id="Address" name="Address" placeholder="Address" maxlength="30" class="form"
            required><br><br>
        <label for="Gender" class="addlabel2">Gender</label><br>
        <select name="Gender" id="Gender" class="form" required>
            <option></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        <label for="email_id" class="addlabel2">Email_id</label><br>
        <input type="email" id="email_id" name="email_id" placeholder="Email_id" maxlength="25" class="form"
            required><br><br>
        <label for="Phone" class="addlabel2">Phone</label><br>
        <input type="tel" id="Phone" name="Phone" placeholder="Phone" maxlength="10" class="form" required><br><br>
        <label for="Bank_Acc_No" class="addlabel2">Bank_Acc_No</label><br>
        <input type="text" inputmode="numeric" id="Bank_Acc_No" name="Bank_Acc_No" placeholder="Bank_Acc_No"
            maxlength="16" minlength="11" class="form" required><br><br>
        <label for="Dob" class="addlabel2">Birth Date</label><br>
        <input type="date" id="Dob" name="Dob" placeholder="Dob" class="form" required><br><br>
        <label for="Start_date" class="addlabel2">Start Date</label><br>
        <input type="date" id="Start_date" name="Start_date" placeholder="Start date" class="form" required><br><br>
        <label for="PF_Sum" class="addlabel2">PF</label><br>
        <input type="number" step="0.01" id="PF_Sum" name="PF_Sum" placeholder="PF" class="form" required><br><br>
        <label for="loan" class="addlabel2">Loan</label><br>
        <input type="number" step="0.01" id="loan" name="loan" placeholder="Loan" class="form" required><br><br>
        <label for="Job_Title" class="addlabel2">Job Title</label><br>
        <input type="text" id="Job_Title" name="Job_Title" placeholder="Job_Title" maxlength="20" class="form"
            required><br><br>
        <label for="Basic_Salary" class="addlabel2">Basic Salary</label><br>
        <input type="number" step="0.01" id="Basic_Salary" name="Basic_Salary" placeholder="Basic Salary" class="form"
            required><br><br>
        <label for="Dept_id" class="addlabel2">Department_id</label><br>
        <input type="text" id="Dept_id" name="Dept_id" placeholder="Dept_id" maxlength="5" class="form"><br><br>
        <input type="submit" name="Submit" placeholder="Submit" title="ADD" class="buttonemp">

    </form>
    <?php

    if (isset($_POST['Submit'])) {
        $eid = $_POST['Emp_id'];
        $name = $_POST['name'];
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

        $sql1 = "INSERT INTO employee VALUES ('$eid','$name','$address','$gender','$mail','$phone','$Bank_Acc_No','$Dob','$Start_date','$PF_Sum','$loan','$Job_Title','$Basic_Salary','$Dept_id');";
        $result = mysqli_query($conn, $sql1);


        if (!$result) {
            echo '<div class="wrong_psswd">Insertion fail!!!</div>';
        } else {
            header('location:employee.php');
        }
    }
    ?>


</body>

</html>
<?php
include("connect.php");
ob_start();
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Salary Breakup</title>
    <link rel="stylesheet" a href="style2.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <h1 align="center">Enter Employee Salary Breakup</h1>
    <a href="salary_breakup.php">
        <button title="Salary Breakup Details" class="logoutLbPos2"> Back</button></a>
    <a href="logout.php">
        <button class="logoutLblPos" title="Logout">Logout</button></a>
    <a href="adminhome.php">
        <button class="logoutLblPos1" title="Home">Home</button></a>
    </a>
    <form method="POST">
        <label for="Sb_id" class="addlabel3">Salary_Breakup_id</label><br>
        <input type="text" id="Sb_id" name="Sb_id" placeholder="ID" maxlength="5" class="form3" required><br><br>
        <label for="Year" class="addlabel3">Year</label><br>
        <select name="Year" id="Year" class="form3" required>
            <option></option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select><br><br>


        <label for="Month" class="addlabel3">Month</label><br>
        <select name="Month" id="Month" class="form3" required>
            <option></option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select><br><br>
        <label for="House_allowance" class="addlabel3">House Allowance</label><br>
        <input type="number" step="0.01" id="House_allowance" name="House_allowance" placeholder="House_allowance"
            class="form3" required><br><br>
        <label for="loan_cut" class="addlabel3">Loan_Cut</label><br>
        <input type="number" step="0.01" id="loan_cut" name="loan_cut" placeholder="loan_cut" class="form3"
            required><br><br>
        <label for="Bonus" class="addlabel3">Bonus</label><br>
        <input type="number" step="0.01" id="Bonus" name="Bonus" placeholder="Bonus" class="form3" required><br><br>
        <label for="other_bonus" class="addlabel3">Other Bonus</label><br>
        <input type="number" step="0.01" id="other_bonus" name="other_bonus" placeholder="Other_bonus" class="form3"
            required><br><br>
        <label for="Medical_allowance" class="addlabel3">Medical Allowance</label><br>
        <input type="number" step="0.01" id="Medical_allowance" name="Medical_allowance" placeholder="Medical_allowance"
            class="form3" required><br><br>
        <label for="overtime" class="addlabel3">Overtime</label><br>
        <input type="number" step="0.01" id="overtime" name="overtime" placeholder="Overtime" class="form3"
            required><br><br>
        <label for="PF" class="addlabel3">PF</label><br>
        <input type="number" step="0.01" id="PF" name="PF" placeholder="PF" class="form3" required><br><br>
        <label for="Absence" class="addlabel3">Absence</label><br>
        <input type="number" id="Absence" name="Absence" placeholder="Absence" maxlength="2" class="form3"
            required><br><br>
        <input type="submit" name="Submit" value="Submit" title="ADD" class="button">

    </form>
    <?php

    if (isset($_POST['Submit'])) {
        $Sb_id = $_POST['Sb_id'];
        $Year = $_POST['Year'];
        $Month = $_POST['Month'];
        $House_allowance = $_POST['House_allowance'];
        $loan_cut = $_POST['loan_cut'];
        $Bonus = $_POST['Bonus'];
        $other_bonus = $_POST['other_bonus'];
        $Medical_allowance = $_POST['Medical_allowance'];
        $overtime = $_POST['overtime'];
        $PF = $_POST['PF'];
        $Absence = $_POST['Absence'];

        $sql1 = "INSERT INTO salary_breakup VALUES ('$Sb_id','$Year','$Month','$House_allowance','$loan_cut','$Bonus','$other_bonus','$Medical_allowance','$overtime','$PF','$Absence',0);";
        $result = mysqli_query($conn, $sql1);

        $sql2 = "CALL SALARY_ADD('$Sb_id',$Year,'$Month');";
        $result1 = mysqli_query($conn, $sql2);


        if (!$result1) {
            echo '<div class="wrong_psswd">Stored  procedure  fail!!!</div>';
        } else {
            echo '<div class="wrong_psswd">Stored  procedure  executed!!!</div>';
        }

        if (!$result) {
            echo '<div class="wrong_psswd">Insertion fail!!!</div>';
        } else {
            header('location:salary_breakup.php');
            ob_end_flush();
        }
    }
    ?>


</body>

</html>
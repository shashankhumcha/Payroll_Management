<?php
include("connect.php");
if (!isset($_SESSION['USER_ID'])) {
    header("location:adminlogin.php");
    die();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Year = $_GET['year'];
    $Month = $_GET['Month'];

    $sql = "SELECT * FROM salary_breakup WHERE Sb_id='$id' AND Year='$Year' AND Month='$Month';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (!$result) {
        header('location:salary_breakup.php');
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Salary Breakup</title>
    <link rel="stylesheet" a href="style2.css">
    <link rel="stylesheet" a href="fonts/css/all.css">
</head>

<body>
    <h1 align="center">Update Employee Salary Breakup</h1>
    <a href="salary_breakup.php">
        <button title="Salary Breakup Details" class="logoutLbPos2"> Back</button></a>
    <a href="logout.php">
        <button class="logoutLblPos" title="Logout">Logout</button></a>
    <a href="adminhome.php">
        <button class="logoutLblPos1" title="Home">Home</button></a>
    </a>
    <form method="POST">
        <label for="House_allowance" class="addlabel3">House Allowance</label><br>
        <input type="number" step="0.01" id="House_allowance" name="House_allowance"
            value="<?php echo $row['House_allowance']; ?>" class="form3" required><br><br>
        <label for="loan_cut" class="addlabel3">Loan_Cut</label><br>
        <input type="number" step="0.01" id="loan_cut" name="loan_cut" value="<?php echo $row['loan_cut']; ?>"
            class="form3" required><br><br>
        <label for="Bonus" class="addlabel3">Bonus</label><br>
        <input type="number" step="0.01" id="Bonus" name="Bonus" value="<?php echo $row['Bonus']; ?>" class="form3"
            required><br><br>
        <label for="other_bonus" class="addlabel3">Other Bonus</label><br>
        <input type="number" step="0.01" id="other_bonus" name="other_bonus" value="<?php echo $row['other_bonus']; ?>"
            class="form3" required><br><br>
        <label for="Medical_allowance" class="addlabel3">Medical Allowance</label><br>
        <input type="number" step="0.01" id="Medical_allowance" name="Medical_allowance"
            value="<?php echo $row['Medical_allowance']; ?>" class="form3" required><br><br>
        <label for="overtime" class="addlabel3">Overtime</label><br>
        <input type="number" step="0.01" id="overtime" name="overtime" value="<?php echo $row['overtime']; ?>"
            class="form3" required><br><br>
        <label for="PF" class="addlabel3">PF</label><br>
        <input type="number" step="0.01" id="PF" name="PF" value="<?php echo $row['PF']; ?>" class="form3"
            required><br><br>
        <label for="Absence" class="addlabel3">Absence</label><br>
        <input type="number" id="Absence" name="Absence" value="<?php echo $row['Absence']; ?>" maxlength="2"
            class="form3" required><br><br>
        <input type="submit" name="Update" value="UPDATE" class="button">

    </form>
    <?php

    if (isset($_POST['Update'])) {
        $House_allowance = $_POST['House_allowance'];
        $loan_cut = $_POST['loan_cut'];
        $Bonus = $_POST['Bonus'];
        $other_bonus = $_POST['other_bonus'];
        $Medical_allowance = $_POST['Medical_allowance'];
        $overtime = $_POST['overtime'];
        $PF = $_POST['PF'];
        $Absence = $_POST['Absence'];

        $sql1 = "UPDATE salary_breakup SET House_allowance='$House_allowance',loan_cut='$loan_cut',Bonus='$Bonus',other_bonus='$other_bonus',Medical_allowance='$Medical_allowance',overtime='$overtime',PF='$PF',Absence='$Absence' WHERE Sb_id='$id' and Year='$Year' AND Month='$Month';";
        $result2 = mysqli_query($conn, $sql1);

        $sql2 = "CALL SALARY_ADD('$id',$Year,'$Month');";
        $result1 = mysqli_query($conn, $sql2);

        if (!$result1) {
            echo '<div class="wrong_psswd">Stored  procedure  fail!!!</div>';
        } else {
            echo '<div class="wrong_psswd">Stored  procedure  executed!!!</div>';
        }

        if (!$result2) {
            echo '<div class="wrong_psswd">Updation fail!!!</div>';
        } else {
            header('location:salary_breakup.php');
        }
    }
    ?>


</body>

</html>
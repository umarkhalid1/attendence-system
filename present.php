<?php
include 'connect/db.php';
global $con;

if (isset($_GET['rollno'])) {
    $x = $_GET['rollno'];
    $currentDate = date('Y-m-d');
    $present = "present";
    
    $existingQuery = "SELECT * FROM `check` WHERE stuid = '$x' AND attendence_date = '$currentDate'";
    $existingResult = mysqli_query($con, $existingQuery);

    if (mysqli_num_rows($existingResult) == 0) { 

        $query = "INSERT INTO `check` (stuid, attendence_date, attendence) VALUES ('$x', '$currentDate', '$present')";
        $run = mysqli_query($con, $query);

        if ($run) {
            echo "<script language='javascript'>window.location.href = 'attendence.php'</script>";
        } else {
            echo "Error";
        }
    } else {
        echo '<h2>'."Attendance for this student on today's date has already been recorded.".'</h2>';
    }
}

include 'connect/db.php';
global $con;

if (isset($_GET['name'])) {
    $x = $_GET['name'];
    $currentDate = date('Y-m-d');
    $absent = "absent";

    $existingQuery = "SELECT * FROM `check` WHERE stuid = '$x' AND attendence_date = '$currentDate'";
    $existingResult = mysqli_query($con, $existingQuery);

    if (mysqli_num_rows($existingResult) == 0) { 

        $query = "INSERT INTO `check` (stuid, attendence_date, attendence) VALUES ('$x', '$currentDate', '$absent')";
        $run = mysqli_query($con, $query);

        if ($run) {
            echo "<script language='javascript'>window.location.href = 'attendence.php'</script>";
        } else {
            echo "Error";
        }
    } else {
        echo '<h2>'."Attendance for this student on today's date has already been recorded.".'</h2>';
    }
}

?>
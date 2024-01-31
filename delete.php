<?php
include 'connect/db.php'; // Include your database connection file
global $con;

  if (isset($_GET['dID'])) {
    $x = $_GET['dID'];

    $query = "DELETE FROM `check` where ID='$x'";
    $run = mysqli_query($con, $query);
    echo "<script language='javascript'>window.location.href = 'check.php'</script>";
}

    if (isset($_GET['aID'])) {
	$x = $_GET['aID'];

	$query = "DELETE FROM `addstudent` where ID='$x'";
	$run = mysqli_query($con, $query);
	echo "<script language='javascript'>window.location.href = 'attendence.php'</script>";
}


?>
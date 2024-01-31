<?php

	include 'connect/db.php';
	function addstudent(){
	global $con;

	$sname = $_POST['stname'];
	$fname = $_POST['fname'];
	$roll = $_POST['roll'];
	$course = $_POST['sel'];

	$query = "INSERT INTO `addstudent`(`rollno`, `sname`, `fname`, `course`) VALUES ('$roll','$sname','$fname','$course')";
	$run = mysqli_query($con, $query);
 	if($run){
        echo '<script language="javascript">';
        echo 'alert("Student Added Successfully")';
        echo '</script>';
  	}else{
        echo '<script language="javascript">';
        echo 'alert("Error to add Studend")';
        echo '</script>';
  	}
	}

?>
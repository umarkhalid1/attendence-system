<?php
	
	session_start();
	if (isset($_SESSION['user'])) {
	include 'connect/db.php';
	global $con;

	$name = $_SESSION['user'];
	$query = "SELECT * FROM `admin` WHERE name = '$name'";
	$run = mysqli_query($con, $query);
	if ($row = mysqli_fetch_array($run)) {
		$img = $row['image'];
	}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attendence Management System</title>
	<link href="assets/images/icon.png" rel="icon">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="wrapper">
			<div class="heading">
				<h1>attendence management system</h1>
			</div>
			<div class="user">
				<div class="admin">
					<div class="aimg">
						<img src="assets/images/<?php echo $img; ?>" alt="admin">
					</div>
					<h3><?php echo $name; ?></h3>
				</div>
				<h3>Al-Noor Insititute of Computer and Technology</h3>
				<a href="logout.php">logout</a>
			</div>
			<div>
				<hr>
			</div>
			<div class="scheck">
				<h3>add new student</h3>
				<div class="buttons">
					<div class="btnatt">
						<a href="attendence.php">mark attendence</a>
					</div>
					<div>
						<a href="check.php">check record</a>
					</div>				
				</div>
			</div>
			<div class="myform">
				<form method="post">
					<div class="input-t">
						<div class="stud">
							<input type="text" name="stname" placeholder="Student Name">
						</div>
						<div class="fath">
							<input type="text" name="fname" placeholder="Father Name">
						</div>
					</div>
					<div class="roll">
						<div class="input-n">
							<input type="number" name="roll" placeholder="Studend Roll No">
						</div>
						<div class="opt">
							<select name="sel">
								<option>Course</option>
								<option>Computer Course</option>
								<option>Web Designing</option>
								<option>Web Development</option>
								<option>Wordpress</option>
								<option>Spoken English</option>
							</select>
						</div>
					</div>
					<div class="btn">
						<button name="btnadd">Add Student</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php

 } else {
 	header("location:login.php");
 } 
 ;?>

<?php
	
	include 'functions.php';

	if (isset($_POST['btnadd'])) {
		addstudent();
	}

?>
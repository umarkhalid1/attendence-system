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
<html>
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
						<img src="assets/images/<?php echo $img ?>" alt="admin">
					</div>
					<h3><?php echo $name ;?></h3>
				</div>
				<h3>Al-Noor Insititute of Computer and Technology</h3>
				<a href="logout.php">logout</a>
			</div>
			<div>
				<hr>
			</div>
			<div class="scheck">
				<div class="date">
					<h3>students previous record</h3>
					<span id="date"></span>
				</div>
				<div class="buttons">
					<div class="btnind">
						<a href="index.php">add student</a>
					</div>
					<div class="btnatt">
						<a href="attendence.php">mark attendence</a>
					</div>
					<div>
						<a href="check.php">check record</a>
					</div>				
				</div>
				
			</div>
			<section>
				<table>
					<tr>
					   <td>ID</td>
					   <td>Date</td>
					   <td>Roll No</td>
					   <td>Attendance</td>
					   <td>Delete</td>
				    </tr>

				    <?php 
				    include 'connect/db.php';
				    global $con;
				    $query = "SELECT * FROM `check`";
				    $run = mysqli_query($con, $query);
				    while($row = mysqli_fetch_array($run)){
				  ?>
				  <tr>
				    <td><?php echo $row['ID']; ?></td>
				    <td><?php echo $row['attendence_date'];?></td>
				    <td><?php echo $row['stuid']; ?></td>
				    <td><?php echo $row['attendence']; ?></td>
				    <td><input type="button" value="Delete" onclick="del(<?php echo $row['ID'] ;?>)" class="delete"> </td>
				  </tr>
				  <?php		
				    }
				  ?>

				</table>
			</section>
		</div>
	</div>
	<script type="text/javascript">
		function del(dID){
			if (confirm('Are you sure you want to delete')) {
				window.location.href = 'delete.php?dID='+dID;
				return true;
			}
		}
	</script>
</body>
</html>

<?php


 } else {
	header("location:login.php");
  }

?>
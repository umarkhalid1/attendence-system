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
				<div class="date">
					<h3>mark attendence</h3>
					<span id="date"></span>
				</div>
				<div class="buttons">
					<div class="btnind">
						<a href="index.php">add student</a>
					</div>
					<div>
						<a href="check.php">check record</a>
					</div>				
				</div>
			</div>
			<section>
				<table>
				  <tr>
				    <td>#</td>
				    <td>Name</td>
				    <td>Roll No</td>
				    <td>Course</td>
				    <td>Attendance</td>
				    <td>Delete</td>
				  </tr>
				  <?php 
				    include 'connect/db.php';
				    global $con;
				    $query = "SELECT * FROM `addstudent`";
				    $run = mysqli_query($con, $query);
				    while($row = mysqli_fetch_array($run)){
				  ?>
				  <tr>
				    <td><?php echo $row['ID'] ?></td>
				    <td><?php echo $row['sname'] ?></td>
				    <td><?php echo $row['rollno'] ?></td>
				    <td><?php echo $row['course'] ?></td>
				    <td>
				      <div class="buttonContainer">
				        <button onclick="present(<?php echo $row['rollno']; ?>)" class="present">Present</button>
				        <button onclick="absent(<?php echo $row['rollno']; ?>)" class="absent">Absent</button>
				      </div>
				    </td>
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
		function present(rollno){
	      if (confirm('Are you sure that student is present')) {
	        window.location.href = "present.php?rollno="+rollno;
	        return true;
	      }
	      
	    }
	    function absent(name){
	      if (confirm('Are you sure that student is absent')) {
	        window.location.href = "present.php?name="+name;
	        return true;
	      }
	      
	    }

	    function del(aID){
			if (confirm('Are you sure you want to delete')) {
				window.location.href = 'delete.php?aID='+aID;
				return true;
			}
		}

	</script>
	
	<script type="text/javascript">

		// date script code

		function clockTick()    {
        currentTime = new Date();
        month = currentTime.getMonth() + 1;
        day = currentTime.getDate();
        year = currentTime.getFullYear();
        document.getElementById('date').innerHTML=month + "/" + day + "/" + year;
       }
       setInterval(function(){clockTick();}, 1000);
		
	</script>
</body>
</html>

<?php
 
}else{
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head lang="eng">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Attendence Management System</title>
  <link href="assets/images/icon.png" rel="icon">
  <link rel="stylesheet" type="text/css" href="assets/styles/style-1.css">
</head>
<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1 class="heading">Attendence Management System</h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Register Now</span>
              <form id="stripe-login" method="post" enctype="multipart/form-data">
                <div class="field padding-bottom--24">
                  <label for="email">Username</label>
                  <input type="text" name="user">
                </div>
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" name="email">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                  </div>
                  <input type="password" name="password">
                </div>
                <div class="field padding-bottom--24">
                  <label for="email">Image</label>
                  <input type="file" name="img">
                </div>
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="checkbox"> Remember me
                  </label>
                </div>
                <div class="field padding-bottom--24 btnreg">
                  <button name="btnreg">Register</button>
                  <!-- <input type="submit" name="submit" value="Continue"> -->
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Already have an account? <a href="login.php">Log in</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex     center-center">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>

<?php

  include 'connect/db.php';
  global $con;

  if (isset($_POST['btnreg'])) {
    $name = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $img = $_FILES['img']['name'];
    $temp = $_FILES['img']['tmp_name'];
    move_uploaded_file($temp,'assets/images/'.$img);

    $count = 0;
    $querycheck = "SELECT * FROM `admin` WHERE name = '$name'";
    $runcheck = mysqli_query($con, $querycheck);

    if($row = mysqli_fetch_array($runcheck)) {
      $count++;
    }
    if ($count==0) {
       $query = "INSERT INTO `admin`(`name`, `email`, `password`, `image`)VALUES ('$name','$email','$password','$img')";
        $run = mysqli_query($con, $query);
        echo "<script language='javascript'>window.location.href = 'index.php'</script>";
     } else {
      echo "<h1>" . "User Name already exist....." . "</h1>";
     }
      
  }

?>
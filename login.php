<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Android Chapter | Login</title>
  
  
  
      <link rel="stylesheet" href="css/login.css">

  
</head>

<body>

  <div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login</div>
      <div class="eula">By loging in you agree to be the member of Android Chapter</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <form method="Post">
      <div class="form">
        <label for="email">USN</label>
        <input name="userName" type="text" id="email" required>
        <label for="password">Password</label>
        <input name="password" type="password" id="password" required>
        <input type="submit" id="submit" value="Submit">
      </div>
    </form>
    </div>
  </div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js'></script>

  

    <script  src="js/login.js"></script>




</body>

</html>


<!--====================================
  Author : Kartikeya P Malimath
  ==================================-->


<?php

include ('db/database.php');
 // Starting Session
session_start();
$_SESSION = array();
$error=''; // Variable To Store Error Message
if (isset($_POST['userName'])) {
    if (empty($_POST['userName']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else
    {
        // Define $username and $password
        $uname=$_POST['userName'];
        $password=$_POST['password'];
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        // To protect MySQL injection for Security purpose
        $uname = stripslashes($uname);
        $password = stripslashes($password);
        $uname = mysqli_real_escape_string($con,$uname);
        $password = mysqli_real_escape_string($con,$password);


        // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($con,"select * from login where password='$password' AND usn='$uname'");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {

          $sql = "UPDATE login SET online = '1' WHERE usn='$uname'";
          mysqli_query($con,$sql);
          if ($con->query($sql) === TRUE) {
              echo "user Online";
          } else {
              echo "Error" . $con->error;
          }

          $sqql = "SELECT * from login where usn = '$uname'";
          $result3 = $con->query($sqql);
          if (!$result3) {
              trigger_error('Invalid query: '.$con->error);
          }
          while($row =$result3->fetch_assoc()) {
            $name = $row['uname'];
            $team = $row['team'];
            $usn = $row['usn'];
            $role= $row['role'];
            
            $_SESSION['name'] = $name;
            $_SESSION['team'] = $team;
            $_SESSION['usn'] = $usn;
          }
            
            

            if ($role == 'admin'){
              echo "<script>top.window.location = 'adminPanel.php'</script>";
           } else {
              echo "<script>top.window.location = 'student.php'</script>";
           }
        }

    // Redirecting To Other Page
    else {
        $alrt = "<script>alert(\"invalid Username or password\")</script>";
        echo $alrt;
        exit();
    }
    mysqli_close($con); // Closing Connection
    }
}
?>
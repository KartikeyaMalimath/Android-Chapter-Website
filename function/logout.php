<!--====================================
  Author : Kartikeya P Malimath
  ==================================-->

<?php

include ('../db/database.php');

session_start();
    if(!isset($_SESSION['usn'])) {
    header("Location:index.html");
} 

$uname = $_SESSION['usn'];

$sql = "UPDATE login SET online = '0' WHERE usn='$uname'";
mysqli_query($con,$sql);
if ($con->query($sql) === TRUE) {
  echo "user Offline";
  unset($_SESSION);
  session_destroy();
  session_write_close();
  header('Location:../index.html');
  die;
} else {
  echo "Error" . $con->error;
}

?>
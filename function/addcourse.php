<?php
include ('../db/database.php');

session_start();

    date_default_timezone_set('Asia/Kolkata'); 
    $date=date("y/m/d");
    $time=date("h:i:sa");

    $usn = $_SESSION['usn'];
    $name = $_SESSION['name'];
    $team = $_SESSION['team'];
    $data = $_POST['coursedetails'];

$sqql = "INSERT INTO course (uname,name,team,coursedone,date,time) VALUES (?,?,?,?,?,?)";
 	$stmt = $con->prepare($sqql);
 	$stmt->bind_param('ssdsss',$usn,$name,$team,$data,$date,$time);


 	if ($stmt->execute()) {
    echo "new card added";
   
} else {
	
    echo "Error : " . $con->error; // on dev mode only
    
    // echo "Error, please try again later"; //live environment
}


header('Location: ../myupdate.php');

?>
<?php
include ('../db/database.php');

$id = $_GET['id'];
$sql1 = "SELECT * from assign where id = '$id'";
$result1 = $con->query($sql1);
if (!$result1) {
     trigger_error('Invalid query: '.$con->error);
}

while($row =$result1->fetch_assoc()) {
    $usn = $row['uname'];
    $name = $row['name'];
    $team = $row['team'];
    $data = $row['assigned'];
}

$sqql = "INSERT INTO learn (uname,name,team,learning) VALUES (?,?,?,?)";
 	$stmt = $con->prepare($sqql);
 	$stmt->bind_param('ssds',$usn,$name,$team,$data);


 	if ($stmt->execute()) {
    echo "new card added";

    $sql = "DELETE FROM assign WHERE id='$id'";
    mysqli_query($con,$sql);
    if ($con->query($sql) === TRUE) {
        echo "card updted";
    } else {
        echo "Error updating record: " . $con->error;
    }
   
} else {
	
    echo "Error : " . $con->error; // on dev mode only
    
    // echo "Error, please try again later"; //live environment
}

header('Location: ../student.php');
?>
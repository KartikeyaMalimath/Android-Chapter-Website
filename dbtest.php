<?php

include ('db/database.php');

$sql3 = "SELECT * from login";
$result3 = $con->query($sql3);
if (!$result3) {
    trigger_error('Invalid query: '.$con->error);
}
while($row =$result3->fetch_assoc()) {
    echo $row['usn'];
}

?>
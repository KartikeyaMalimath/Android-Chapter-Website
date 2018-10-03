<?php

$id = $_GET['id'];

$update = "UPDATE scrumboard SET workstatus = 3 WHERE id = $id";
$result1 = $con->query($update);
if (!$result1) {
     trigger_error('Invalid query: '.$con->error);
}

while($row =$result1->fetch_assoc()) {
    echo "record updated";
    header('Location: ../studenttest.php');
}

?>
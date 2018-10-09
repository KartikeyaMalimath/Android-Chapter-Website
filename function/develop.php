<?php

include ('../db/database.php');

$id = $_GET['id'];

$update = "UPDATE scrumboard SET workstatus = 3 WHERE id = $id";
$result1 = $con->query($update);
if (!$result1) {
     trigger_error('Invalid query: '.$con->error);
}

if($result1 === TRUE) {
    echo "record updated";
    header('Location: ../student.php');
    
}

?>
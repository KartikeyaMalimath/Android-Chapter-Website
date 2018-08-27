<?php
include ('../db/database.php');

$id = $_GET['id'];
$sql = "DELETE FROM assign WHERE id='$id'";
mysqli_query($con,$sql);
if ($con->query($sql) === TRUE) {
    echo "card updted";
} else {
    echo "Error updating record: " . $con->error;
}
header('Location: ../student.php');
?>
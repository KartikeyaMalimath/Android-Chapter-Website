<?php

include ('../db/database.php');

$id = $_GET['id'];

$sql = "DELETE FROM scrumboard WHERE id='$id'";
mysqli_query($con,$sql);
if ($con->query($sql) === TRUE) {
    echo "card updted";
    header('Location: ../student.php');
} else {
    echo "Error updating record: " . $con->error;
}
?>
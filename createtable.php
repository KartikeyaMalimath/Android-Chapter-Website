<?php

//Admin one time use only*

include ('db/database.php');

//$create = "CREATE TABLE `course` 

//( `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,  `uname` VARCHAR(10) NOT NULL ,  
//`name` VARCHAR(30) NOT NULL ,  `team` INT(3) NOT NULL ,  `coursedone` 
//VARCHAR(300) NOT NULL ,  `mockdone` VARCHAR(300) NOT NULL , `date` DATE NOT NULL, 
//`time` TIME NOT NULL,   
//PRIMARY KEY  (`id`)) ENGINE = InnoDB;";
    
//$results = mysqli_query($con, $create);
//if ($con->query($results) === TRUE) {
//echo "The tables have been created";
//} else {
//    echo "Error updating record: " . $con->error;
//}

$workstatus = "CREATE TABLE `vvce9996_android`.`scrumboard` 
( `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,  `uname` VARCHAR(10) NOT NULL ,  
`name` VARCHAR(30) NOT NULL ,  `team` INT(2) NOT NULL ,  
`workstatus` INT(2) NOT NULL, `data` VARCHAR(500) NOT NULL,
 PRIMARY KEY (`id`)) ENGINE = InnoDB;";

$statusResult = mysqli_query($con, $workstatus);
if($con->query($statusResult) === TRUE) {
    echo "Table workstatus created";
} else {
    echo "Error creating table".$con->error;
}

// $workstatus1 = "DROP TABLE `learn`";

// $statusResult1 = mysqli_query($con, $workstatus1);
// if($con->query($statusResult1) === TRUE) {
//     echo "learn table dropped";
// } else {
//     echo "Error creating table".$con->error;
// }

// $workstatus2 = "DROP TABLE `assign`";

// $statusResult2 = mysqli_query($con, $workstatus2);
// if($con->query($statusResult2) === TRUE) {
//     echo "assign table dropped";
// } else {
//     echo "Error creating table".$con->error;
// }

// $workstatus3 = "DROP TABLE `develop`";

// $statusResult3 = mysqli_query($con, $workstatus3);
// if($con->query($statusResult3) === TRUE) {
//     echo "develop table dropped";
// } else {
//     echo "Error creating table".$con->error;
// }

// $workstatus4 = "DROP TABLE `complete`";

// $statusResult4 = mysqli_query($con, $workstatus4);
// if($con->query($statusResult4) === TRUE) {
//     echo "complete table dropped";
// } else {
//     echo "Error creating table".$con->error;
// }


?>




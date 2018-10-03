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

$workstatus = "CREATE TABLE `android_chapter`.`scrumboard` 
( `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,  `uname` VARCHAR(10) NOT NULL ,  
`name` VARCHAR(30) NOT NULL ,  `team` INT(2) NOT NULL ,  
`workstatus` INT(2) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;";

$statusResult = mysqli_query($con, $workstatus);
if($con->query($statusResult) === TRUE) {
    echo "Table workstatus created";
} else {
    echo "Error creating table".$con->error;
}




?>




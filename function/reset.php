<?php

    /* Author : Kartikeya P Malimath*/

    include ('../db/database.php');
    session_start();
    if(!isset($_SESSION['usn'])) {
        header("Location:index.html");
    } 

    if(isset($_POST['submit'])){
        
        $uname = $_SESSION['usn'];
        $USN = $_POST['usn'];
        $opass = $_POST['Opassword'];
        $pass = $_POST['password'];

        if($uname == $USN) {
            $update = "UPDATE login SET password = '$pass' where usn = '$uname'";
            
            if ($con->query($update) === TRUE) {
                echo "Record updated successfully";
                echo "<script type='text/javascript'>alert('Password Reset successful');</script>";
                header("Location:../studentprofile.php");
            } else {
                echo "Error updating record: " . $con->error;
            }
        } else {
            header("Location:../studentprofile.php");
        }
    }

?>
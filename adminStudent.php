<!DOCTYPE html>
<html lang="en" >

<!--====================================
  Author : Kartikeya P Malimath
  ==================================-->

<?php
    include ('db/database.php');
    session_start();
    if(!isset($_SESSION['usn'])) {
    header("Location:index.html");
    } 
    $view = $_GET['view'];
?>

<head>
  <meta charset="UTF-8">
  <title>Android Chapter | VVCE</title>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/admin.css">

  
</head>
<body>

    <div class="sidenav">
        <a href="adminPanel.php"><span class="glyphicon glyphicon-home"></span></a>
        <a href="adminStudent.php?view=0"><span class="glyphicon glyphicon-user"></span></a>
        <a href="function/logout.php"><span class="glyphicon glyphicon-arrow-left"></span></a>
        <a href="#"><span class="glyphicon glyphicon-briefcase"></span></a>
    </div>

    <div class="container">
        <h3 style="color: white;">Android Chapter : Student Progress Portal</h3>
        <br/>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="cont">
                        <h3>Members</h3>
                                    <p><?php

                                        $sql2 = "SELECT * from login";
                                        $result2 = $con->query($sql2);
                                        if (!$result2) {
                                            trigger_error('Invalid query: '.$con->error);
                                        }
                                        while($row =$result2->fetch_assoc()) {  
                                            $viewid = $row['usn'];
                                            echo "<div class='row'>
                                            <div class='col-md-8'>                                            
                                                <h5 style='color:white;'>{$row['team']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['uname']}</h5>
                                            </div>

                                            <div class = 'col-md-4'>
                                                <button style='background-color: #22272B; color:white;' type='button' id='".$viewid."' onClick= 'view(this.id)'>View</button>
                                            </div>                                    
                                            </div>";
                                        }

                                    ?></p>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                    <div class="card">
                            <div class="cont">
                                
                                <p><?php
                                $sql1 = "SELECT * from course where uname = '$view'";
                                $result1 = $con->query($sql1);
                                $stud = $con->query($sql1);
                                if (!$result1) {
                                    trigger_error('Invalid query: '.$con->error);
                                }
                                $studName = mysqli_fetch_assoc($stud);
                                echo "<center><h3>{$studName['name']}</h3></center>";
                                
                                while($row =$result1->fetch_assoc()) {
                                    $assigned = $row['id'];                                    
                                    if($row['coursedone'] != NULL) {
                                    echo "<div class='card'>
                                            <div class='cont'>
                                                <h4><p>Course Completed<p></h4> 
                                                <p>{$row['coursedone']}</p>";
                                            if($view == '4vv17cs095' || $view == '4vv16cs108'){
                                                echo "</br>";
                                            } else {       
                                                echo "<h6><p>{$row['date']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['time']}</p></h6>";
                                            }  
                                            echo "</div>
                                        </div> <br/>";
                                    }
                                    if($row['mockdone'] != NULL) {
                                        echo "<div class='card'>
                                                <div class='cont'>
                                                    <h4><p>Mock Completed<p></h4> 
                                                    <p>{$row['mockdone']}</p>";
                                                    if($view == '4vv17cs095' || $view == '4vv16cs108'){
                                                        echo "</br>";
                                                    } else {       
                                                        echo "<h6><p>{$row['date']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['time']}</p></h6>";
                                                    }  
                                                    echo "</div>
                                            </div> <br/>";
                                    }
                                }
                                    ?></p>


                            </div>
                    </div>
            </div>
            
        </div>
        

    </div>

    <div class="footer">
   <copyright class="copy fade-in">&copy; 2018 developed by <a href="http://www.linkedin.com/in/kartikeya-malimath-b18441159">Kartikeya</a><a href="https://github.com/KartikeyaMalimath"> Malimath</a>. In association with DEV HUB | VVCE, Mysuru</copyright>
   
    </div>

<script type="text/javascript">
    function view(clicked_id) {
            window.location = ("adminStudent.php?view="+clicked_id);
    }
</script>

</body>
</html>
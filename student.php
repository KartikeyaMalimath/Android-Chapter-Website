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

$uname = $_SESSION['usn'];
$team = $_SESSION['team'];
$name = $_SESSION['name'];
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <link rel="stylesheet" href="css/student.css">

  
</head>


<style> 
input[type=text] {
    width: 100%;
    padding: 6px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid blue;
    background-color: rgba(0,0,0,0.2);
}

input[type=submit] {
    background-color: #026DAC;
    color: black;
    font-size: 18px;
    border: 2px solid #555555;
    width: 100%;
    padding: 8px 0 8px 0  ;
    
}

input[type=submit]:hover {
    background-color: #555555;
    color: white;
}
</style>

<body>
    <section class="hero" name="top"> 
            <div class="sidenav">
                    <a href="student.php"><span class="glyphicon glyphicon-home"></span></a>
                    <a href="myupdate.php"><span class="glyphicon glyphicon-briefcase"></span></a>
                    <a href="studentprofile.php"><span class="glyphicon glyphicon-user"></span></a>
                    <a href="function/logout.php"><span class="glyphicon glyphicon-arrow-left"></span></a>
                </div>
        <!--navbar-->
        <nav class="navbar navbar-inverse">
                <div class="navbar-header"></div>
                <a class="navbar-brand" href="">Welcome to Android Chapter - <?php echo $name;?></a>
                </div>
        </nav>

        <div class="container">

            <!--update notification-->
            <h3>Notice : Read the instruction before continuing</h3>
            <p>The website has been updated and is under beta version, This page should be used only while working on projects. Please dont update your 
                course learning or mocks here. There a briefcase symbol at the left of the desktop. go to that page for updating your learning progress and mocks.
                Please Abide by the rules your course progress will be monitored strictly. if you have already inserted cards here please delete them and
                updated those details in that page. For further doubts please contact admin. Thank you.</p>

            <br>
            <div class="col-sm-3">
                <div class="panel panel-danger">
                    <div class="panel-heading"><h4>Assigned Work</h4></div>
                    <div class="panel-body">
                    
                        <?php
                        $sql1 = "SELECT * from scrumboard where team = '$team' and workstatus = 1";
                        $result1 = $con->query($sql1);
                        if (!$result1) {
                            trigger_error('Invalid query: '.$con->error);
                        }
                        while($row =$result1->fetch_assoc()) {
                            $primid1 = $row['id'];
                            echo "<div class='card'>
                                    <div class='cont'>
                                        <h4><b>{$row['name']}</b></h4> 
                                        <p>{$row['data']}</p>
                                        <p><button style='color:black' id='".$primid1."' onclick='learn(this.id)'>Learn</button>
                                        <button style='color:black' id='".$primid1."' onclick='develop(this.id)'>Develop</button>
                                        <button style='color:black' id='".$primid1."' onclick='complete(this.id)'>Done</button>
                                        <button style='color:black' id='".$primid1."' onClick='delete1(this.id)'>Delete</button></p>
                                    </div>
                                </div> <br/>";

                        }
                        
                        ?>
                        <div class='card' style="background-color:#1de9b6;">
                            <div class='cont'>
                            <form method="post" style="padding-top:6px; padding-bottom: 6px; width:100%">
                                <h5><center>Add new card</center></h5>
                                <select name='student' style="width: 100%; color: black;">
                                <?php
                                $sql1 = "SELECT * from login where team = '$team'";
                                $result1 = $con->query($sql1);
                                if (!$result1) {
                                    trigger_error('Invalid query: '.$con->error);
                                }
                                while($row =$result1->fetch_assoc()) {

                                    echo "
                                            <option value='" . $row['uname'] ."'>" . $row['uname'] ."</option>";

                                }
                                
                                ?>
                            </select>
                            <input style="width: 100%; color: black; margin-top:5px; margin-bottom:5px;" type="text" name="details" required>  
                            <input type="submit" name="submit">
                            </form> 
                            </div>
                        </div> 

                    </div>
                </div>
            </div>            
            <div class="col-sm-3">
                <div class="panel panel-warning">
                    <div class="panel-heading"><h4>Learning</h4></div>
                    <div class="panel-body">

                        <?php
                        $sql2 = "SELECT * from scrumboard where team = '$team'And workstatus = 2";
                        $result2 = $con->query($sql2);
                        if (!$result2) {
                            trigger_error('Invalid query: '.$con->error);
                        }
                        while($row =$result2->fetch_assoc()) {
                            $primid2 = $row['id'];
                            echo "<div class='card'>
                                    <div class='cont'>
                                        <h4><b>{$row['name']}</b></h4> 
                                        <p>{$row['data']}</p>
                                        <p><button style='color:black' id='".$primid2."' onclick='assign(this.id)'>Assign</button>
                                        <button style='color:black' id='".$primid2."' onclick='develop(this.id)'>Develop</button>
                                        <button style='color:black' id='".$primid2."' onclick='complete(this.id)'>Done</button>
                                        <button style='color:black' id='".$primid2."' onClick='delete1(this.id)'>Delete</button></p>
                                    </div>
                                </div> <br/>";

                        }
                        
                        ?>

                    </div>
                </div>                
            </div>
            <div class="col-sm-3">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4>Developing</h4></div>
                    <div class="panel-body">

                        <?php
                        $sql3 = "SELECT * from scrumboard where team = '$team'And workstatus = 3";
                        $result3 = $con->query($sql3);
                        if (!$result3) {
                            trigger_error('Invalid query: '.$con->error);
                        }
                        while($row =$result3->fetch_assoc()) {
                            $primid3 = $row['id'];
                            echo "<div class='card'>
                                    <div class='cont'>
                                        <h4><b>{$row['name']}</b></h4> 
                                        <p>{$row['data']}</p>
                                        <p><button style='color:black' id='".$primid3."' onclick='assign(this.id)'>Assign</button>
                                        <button style='color:black' id='".$primid3."' onclick='learn(this.id)'>Learn</button>
                                        <button style='color:black' id='".$primid3."' onclick='complete(this.id)'>Done</button>
                                        <button style='color:black' id='".$primid3."' onClick='delete1(this.id)'>Delete</button></p>
                                    </div>
                                </div> <br/>";

                        }
                        
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-success">
                    <div class="panel-heading"><h4>Completed</h4></div>
                    <div class="panel-body">
                    
                    <?php
                        $sql4 = "SELECT * from scrumboard where team = '$team' And workstatus = 4";
                        $result4 = $con->query($sql4);
                        if (!$result4) {
                            trigger_error('Invalid query: '.$con->error);
                        }
                        while($row =$result4->fetch_assoc()) {
                            $primid4 = $row['id'];
                            echo "<div class='card'>
                                    <div class='cont'>
                                        <h4><b>{$row['name']}</b></h4> 
                                        <p>{$row['data']}</p>
                                        <p><button style='color:black' id='".$primid4."' onclick='assign(this.id)'>Assign</button>
                                        <button style='color:black' id='".$primid4."' onclick='learn(this.id)'>Learn</button>
                                        <button style='color:black' id='".$primid4."' onclick='develop(this.id)'>Develop</button>
                                        <button style='color:black' id='".$primid4."' onClick='delete1(this.id)'>Delete</button>
                                        </p>
                                    </div>
                                </div> <br/>";

                        }
                        
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--footer--> 
 <hr />
 <section class="section section-gray background-img">
    <div class="row">
     <div class="col-sm-8 col-sm-offset-2">
                  <p class="section-paragraph white">Contact us:</p>
     <p class="section-paragraph">
        <a href="#" class="button">android chapter @ gmail.com</a> 
        <a href="#" class="button" target="_blank">git-hub</a>
        <a href="#" class="button" target="_blank">facebook</a> 
        <a href="#" class="button" target="_blank">DEV HUB</a>

       </p>
     </div>
   </div>
   <div class="row">
     <div class="col-sm-8 col-sm-offset-2 spacing">
               <a class="hero-down" href="#top">
         <div class="btn-react"></div>
           <i class="fa fa-chevron-up"></i>
       </a>
     </div>
   </div>
 </section>

 <div class="footer">
   <copyright class="copy fade-in">&copy; 2018 developed by <a href="http://www.linkedin.com/in/kartikeya-malimath-b18441159">Kartikeya</a><a href="https://github.com/KartikeyaMalimath"> Malimath</a>. In association with DEV HUB | VVCE, Mysuru</copyright>
   
 </div>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.1/velocity.min.js'></script>

  <script  src="js/index.js"></script>

<!--script for cards-->
<script type="text/javascript">

  //learn function  

function learn(clicked_id) {
			window.location.href = ("function/learn.php?id="+clicked_id);		
    }

//assign function

function assign(clicked_id) {
			window.location.href = ("function/assign.php?id="+clicked_id);		
    }

//develop function

function develop(clicked_id) {
			window.location.href = ("function/develop.php?id="+clicked_id);		
    }


//complete function

function complete(clicked_id) {
			window.location.href = ("function/complete.php?id="+clicked_id);		
    }	

//delete function

function delete1(clicked_id){
    if (window.confirm('Do you want to delete this card?'))
    {
        alert('Card Deleting');
        window.location = ("function/delete.php?id="+clicked_id);
    }
    else
    {
        die();
    }
}
    
</script>


<!--card script end-->
  
</body>

</html>

<?php

if(isset($_POST['submit']))
 {
 	$name = $_POST['student'];
   $assign = $_POST['details'];
   $workstatus = 1;

    $usn = mysqli_query($con,"select usn from login where uname = '$name'");
    $usnres = mysqli_fetch_array($usn);

 	$sqql = "INSERT INTO scrumboard (uname,name,team,workstatus, data) VALUES (?,?,?,?,?)";
 	$stmt = $con->prepare($sqql);
 	$stmt->bind_param('ssdds',$usnres['usn'],$name,$team,$workstatus,$assign);


 	if ($stmt->execute()) {
 	$link = "<script>window.location.replace(\"student.php\")</script>";
    echo "new card added";
    echo $link;
 	exit();
   
} else {
	
    echo "Error : " . $con->error; // on dev mode only
    
    // echo "Error, please try again later"; //live environment
}

$con->close();
 }

?>
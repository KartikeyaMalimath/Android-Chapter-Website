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

<body>
    <section class="hero" name="top"> 
            <div class="sidenav">
                    <a href="#"><span class="glyphicon glyphicon-home"></span></a>
                    <a href="#"><span class="glyphicon glyphicon-user"></span></a>
                    <a href="function/logout.php"><span class="glyphicon glyphicon-arrow-left"></span></a>
                </div>
        <!--navbar-->
        <nav class="navbar navbar-inverse">
                <div class="navbar-header"></div>
                <a class="navbar-brand" href="">Welcome to Android Chapter - <?php echo $name;?></a>
                </div>
        </nav>

        <div class="container">
            <div class="col-sm-3">
                <div class="panel panel-danger">
                    <div class="panel-heading"><h4>Assigned Work</h4></div>
                    <div class="panel-body">
                    
                        <?php
                        $sql1 = "SELECT * from assign where team = '$team'";
                        $result1 = $con->query($sql1);
                        if (!$result1) {
                            trigger_error('Invalid query: '.$con->error);
                        }
                        while($row =$result1->fetch_assoc()) {
                            $assigned = $row['id'];
                            echo "<div class='card'>
                                    <div class='cont'>
                                        <h4><b>{$row['name']}</b></h4> 
                                        <p>{$row['assigned']}</p>
                                        <p><button style='color:black' id='".$assigned."' onclick='learn1(this.id)'>Learn</button><button style='color:black' id='".$assigned."' onclick='develop1(this.id)'>Develop</button><button style='color:black' id='".$assigned."' onclick='complete1(this.id)'>Done</button><button style='color:black' id='".$assigned."' onClick='delete1(this.id)'>Delete</button></p>
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
                            <input type="submit" name="submit" style="background-color:#026DAC; width: 100%;">
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
                        $sql2 = "SELECT * from learn where team = '$team'";
                        $result2 = $con->query($sql2);
                        if (!$result2) {
                            trigger_error('Invalid query: '.$con->error);
                        }
                        while($row =$result2->fetch_assoc()) {
                            $learn = $row['id'];
                            echo "<div class='card'>
                                    <div class='cont'>
                                        <h4><b>{$row['name']}</b></h4> 
                                        <p>{$row['learning']}</p>
                                        <p><button style='color:black' id='".$learn."' onclick='assign2(this.id)'>Assign</button><button style='color:black' id='".$learn."' onclick='develop2(this.id)'>Develop</button><button style='color:black' id='".$learn."' onclick='complete2(this.id)'>Done</button><button style='color:black' id='".$learn."' onClick='delete2(this.id)'>Delete</button></p>
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
                        $sql3 = "SELECT * from develop where team = '$team'";
                        $result3 = $con->query($sql3);
                        if (!$result3) {
                            trigger_error('Invalid query: '.$con->error);
                        }
                        while($row =$result3->fetch_assoc()) {
                            $develop = $row['id'];
                            echo "<div class='card'>
                                    <div class='cont'>
                                        <h4><b>{$row['name']}</b></h4> 
                                        <p>{$row['developing']}</p>
                                        <p><button style='color:black' id='".$develop."' onclick='assign3(this.id)'>Assign</button><button style='color:black' id='".$develop."' onclick='learn3(this.id)'>Learn</button><button style='color:black' id='".$develop."' onclick='complete3(this.id)'>Done</button><button style='color:black' id='".$develop."' onClick='delete3(this.id)'>Delete</button></p>
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
                        $sql4 = "SELECT * from complete where team = '$team'";
                        $result4 = $con->query($sql4);
                        if (!$result4) {
                            trigger_error('Invalid query: '.$con->error);
                        }
                        while($row =$result4->fetch_assoc()) {
                            $complete = $row['id'];
                            echo "<div class='card'>
                                    <div class='cont'>
                                        <h4><b>{$row['name']}</b></h4> 
                                        <p>{$row['completed']}</p>
                                        <p><button style='color:black' id='".$complete."' onclick='assign4(this.id)'>Assign</button><button style='color:black' id='".$complete."' onclick='learn4(this.id)'>Learn</button><button style='color:black' id='".$complete."' onclick='develop4(this.id)'>Develop</button><button style='color:black' id='".$complete."' onClick='delete4(this.id)'>Delete</button></p>
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
    function delete1(clicked_id){
        if (window.confirm('Do you want to delete this card?'))
        {
            alert('Card Deleting');
            window.location = ("function/delete1.php?id="+clicked_id);
        }
        else
        {
            die();
        }
    }

    function delete2(clicked_id){
        if (window.confirm('Do you want to delete this card?'))
        {
            alert('Card Deleting');
            window.location = ("function/delete2.php?id="+clicked_id);
        }
        else
        {
            die();
        }
    }

    function delete3(clicked_id){
        if (window.confirm('Do you want to delete this card?'))
        {
            alert('Card Deleting');
            window.location = ("function/delete3.php?id="+clicked_id);
        }
        else
        {
            die();
        }
    }

    function delete4(clicked_id){
        if (window.confirm('Do you want to delete this card?'))
        {
            alert('Card Deleting');
            window.location = ("function/delete4.php?id="+clicked_id);
        }
        else
        {
            die();
        }
    }

function learn1(clicked_id) {
			window.location.href = ("function/learn1.php?id="+clicked_id);		
    }

function learn3(clicked_id) {
			window.location.href = ("function/learn3.php?id="+clicked_id);		
    }

function learn4(clicked_id) {
			window.location.href = ("function/learn4.php?id="+clicked_id);		
    }

function assign2(clicked_id) {
			window.location.href = ("function/assign2.php?id="+clicked_id);		
    }
function assign3(clicked_id) {
			window.location.href = ("function/assign3.php?id="+clicked_id);		
    }
function assign4(clicked_id) {
			window.location.href = ("function/assign4.php?id="+clicked_id);		
    }
function develop1(clicked_id) {
			window.location.href = ("function/develop1.php?id="+clicked_id);		
    }
function develop2(clicked_id) {
			window.location.href = ("function/develop2.php?id="+clicked_id);		
    }
function develop4(clicked_id) {
			window.location.href = ("function/develop4.php?id="+clicked_id);		
    }
function complete1(clicked_id) {
			window.location.href = ("function/complete1.php?id="+clicked_id);		
    }
function complete2(clicked_id) {
			window.location.href = ("function/complete2.php?id="+clicked_id);		
    }
function complete3(clicked_id) {
			window.location.href = ("function/complete3.php?id="+clicked_id);		
    }
    
</script>

<!--card script end-->
  
</body>

</body>

<?php

if(isset($_POST['submit']))
 {
 	$name = $_POST['student'];
   $assign = $_POST['details'];

    $usn = mysqli_query($con,"select usn from login where uname = '$name'");
    $usnres = mysqli_fetch_array($usn);

 	$sqql = "INSERT INTO assign (uname,name,team,assigned) VALUES (?,?,?,?)";
 	$stmt = $con->prepare($sqql);
 	$stmt->bind_param('ssds',$usnres['usn'],$name,$team,$assign);


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
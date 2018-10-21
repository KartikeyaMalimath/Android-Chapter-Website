<!DOCTYPE html>
<html lang="en" >

<!--====================================
  Author : Kartikeya P Malimath
  ==================================-->

<?php

include ('db/database.php');

session_start();
    //if(!isset($_SESSION['usn'])) {
    //header("Location:index.html");
//} 

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
       <!--body of the page code should come here-->








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

<!--scripts-->

<script type='text/javascript'>

    function deleteboth(clicked_id){
        if (window.confirm('Do you want to delete this card?'))
        {
            alert('Card Deleting');
            window.location = ("function/deletemock.php?id="+clicked_id);
        }
        else
        {
            die();
        }
    }

</script>
<!--end of scripts-->
  
</body>

</html>
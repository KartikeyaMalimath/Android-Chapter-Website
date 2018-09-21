<html lang="en" >

<!--====================================
  Author : Kartikeya P Malimath
  ==================================-->

<head>
  <meta charset="UTF-8">
  <title>Android Chapter | VVCE</title>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>


  
</head>
</html>


<?php

include ('db/database.php');

$sql3 = "SELECT * from login";
$result3 = $con->query($sql3);
if (!$result3) {
    trigger_error('Invalid query: '.$con->error);
}
while($row =$result3->fetch_assoc()) {

    echo "<div class='row'>
    <div class='col-sm-4'>
        <h5>{$row['uname']}</h5>
    </div>
    <div class='col-sm-4'>
        <h5>{$row['usn']}</h5>
    </div>
    <div class = 'col-sm-4'>
        <h5>{$row['password']}</h5>
    </div>
    </div>";
}

?>
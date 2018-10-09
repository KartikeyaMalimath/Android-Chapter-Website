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
        <a href="#"><span class="glyphicon glyphicon-home"></span></a>
        <a href="#"><span class="glyphicon glyphicon-user"></span></a>
        <a href="function/logout.php"><span class="glyphicon glyphicon-arrow-left"></span></a>
        <a href="#"><span class="glyphicon glyphicon-briefcase"></span></a>
    </div>

    <div class="container">
        <h3 style="color: white;">Android Chapter Admin Panel</h3>
        <br/>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="cont">
                        <form method="post">
                            <h3 style="color:whitesmoke">Sign-Up (Admins Only)</h3>
                            <label for="usn"><p>usn</p></label>
                            <input style="width:100%" type="text" id="usn" name="usn" placeholder="USN.." required>

                            <label for="name"><p>Name</p></label>
                            <input style="width:100%" type="text" id="name" name="name" placeholder="Member name.." required>

                            <label for="email"><p>E-mail</p></label>
                            <input style="width:100%" type="text" id="email" name="email" placeholder="Email ID.." required>

                            <label for="password"><p>Password</p></label>
                            <input style="width:100%" type="password" id="password" name="password" placeholder="password..." required>

                            <label for="mobile"><p>Mobile</p></label>
                            <input style="width:100%" type="text" id="mobile" name="mobile" placeholder="Mobile No..." min="10" max="10" required>

                            <label for="team"><p>Team Number</p></label>
                            <select style="width:100%" id="team" name="team">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                            <label for="role"><p>Membership</p></label>
                            <select style="width:100%; margin-botton:20px;" id="role" name="role">
                            <option value="student">Student</option>
                            <option value="admin">Admin</option>
                            </select>
                            
                            <input type="submit" name="submit" value="Sign-Up" style="width:100%; margin-top: 20px; margin-bottom:20px;" >
                        </form>
                    </div>
                </div>
            </div>
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
                                        $del = $row['usn'];
                                        echo "<div class='row'>
                                        <div class='col-md-8'>                                            
                                            <h5 style='color:white;'>{$row['team']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['uname']}</h5>
                                        </div>";
                                        if($del  == '4vv16cs046' || $del == '4vv16cs108'){
                                            echo "
                                            <div class = 'col-md-4'>
                                                <button style='background-color: #22272B; color:white;' type='button'>Delete</button>
                                            </div>";
                                        }
                                        else {
                                            echo "
                                            <div class = 'col-md-4'>
                                                <button style='background-color: #22272B; color:white;' type='button' id='".$del."' onClick= 'deluser(this.id)'>Delete</button>
                                            </div>";
                                        }
                                        
                                        echo "</div>";
                                    }

                                ?></p>
                            </div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="card">
                            <div class="cont">
                                <h3 style="color:whitesmoke">Members Online <i class="glyphicon glyphicon-heart"></i></h3>
                                <br/><br/>
                                <p><?php

                                    $sql1 = "SELECT * from login where online = '1'";
                                    $result1 = $con->query($sql1);
                                    if (!$result1) {
                                        trigger_error('Invalid query: '.$con->error);
                                    }
                                    while($row =$result1->fetch_assoc()) {  
                                        echo "<h4 style='color:white;'>{$row['uname']} <i class='fa fa-android'></i></h4>";
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
    function deluser(clicked_id) {
        if (window.confirm('Do you want to delete this User?'))
        {
            alert('User Deleting');
            window.location = ("function/deluser.php?id="+clicked_id);
        }
        else
        {
            die();
        }
    }
</script>

</body>
</html>
<?php

if(isset($_POST['submit']))
 {
     $usn = $_POST['usn'];
    
     $name = $_POST['name'];
     $password = $_POST['password'];
     $email = $_POST['email'];
     $team = $_POST['team'];
     $role = $_POST['role'];
     $mobile = $_POST['mobile'];

 	$sqql = "INSERT INTO login (usn,uname,password,email,mobile,role,team) VALUES (?,?,?,?,?,?,?)";
 	$stmt = $con->prepare($sqql);
 	$stmt->bind_param('ssssdsd',$usn,$name,$password,$email,$mobile,$role,$team);


 	if ($stmt->execute()) {
        $link = "<script>window.location.replace(\"adminPanel.php\")</script>";
        echo "<script type='text/javascript'>alert('Membership Created');</script>";
        echo $link;
    exit();
   
    } else {
        header('Location: student.php');
    echo "Error : " . $con->error; // on dev mode only
    
    // echo "Error, please try again later"; //live environment
    }

$con->close();
 }

?>
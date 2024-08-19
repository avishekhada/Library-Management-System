<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>

	  <link rel="stylesheet" type="text/css" href="header.css">
	 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-primary ">
     
<div class="container-fluid">
<div class="navbar-header">
<img src="ic_logo2.svg"    style="max-width: 110px; height: 100px;">
<a style="color:white; font-size:35px;text-decoration:none;padding-left:80px;">LIBRARY MANAGEMENT SYSTEM</a>
</div>
<?php
 if(isset($_SESSION['login_user']))
 {
?>
                
   <ul class="nav navbar-nav navbar-right">
       <li><a href="">
      <div style="color: white">
       <?php

echo "<img class='img-circle profile_img' height=30 width=30 src='image/".$_SESSION['picture']."'>";

     echo " ".$_SESSION['login_user']; 
          ?>
     </div>
     </a></li>
<li><a href="books.php"><b style="font-size: 20px;color: white;">Books</b></a></li>

<li><a href="logout.php"><b style="font-size: 20px;color: white;"><span class="glyphicon glyphicon-log-out">Logout</span></b></a></li>
          
</ul>
<?php
 }
  else
            {   ?>
              <ul class="nav navbar-nav navbar-right">
              
<li><a href="index.php"><b style="font-size: 20px;color:white;"> <span class="glyphicon glyphicon-home">Home</span></b></a></li>
 <li><a href=""><b style="font-size: 20px;color: white;">Books</b></a></li>
<li><a href="student.php"><b style="font-size: 20px;color: white;"><span class="glyphicon glyphicon-log-in">StudentLogin </span></b></a></li>
<li><a href="librarian.php"> <b style="font-size: 20px;color: white;"><span class="glyphicon glyphicon-log-in">AdminLogin</span></b></a></li>
          </ul>
          <?php
            }
          ?>

      </div>
    </nav>
    
</body>
</html>
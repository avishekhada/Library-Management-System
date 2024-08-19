<?php
include "connection.php";
include "navbar.php";

?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="header.css">
        <link rel="stylesheet" type="text/css" href="header.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</style>
<style type="text/css">
.srch
{
 padding-right=800px;
}
body {
    background:#e2e1e7;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
	margin-top:101px;
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#337ab7;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover
{   background-color:#050e68;
	color:white;
	height:50px;
	width:300px
	
}
.books
{
margin:0px auto;
width:400px;
}
    </style>
     </head>


    <body>
   <!--   sidenav--->
   <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color: white;margin-left:80px;font-size:20px;">
       <?php
     echo "<img class='img-circle profile_img' height=120 width=100 src='image/".$_SESSION['picture']."'>";
echo "<br><br>";
     echo "Welcome ". $_SESSION['login_user']; 
          ?>
     </div>
  <div class="h"><a href="#">Add Books</a></div>
  <div class="h"> <a href="books">Delete Books</a></div>
  <div class="h"><a href="#">Books Request</a></div>
  <div class="h"><a href="#">Issue Information</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
  <div class="container">
    <h2 style="text-align:center";> Add New Books</h2>






<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
   
<form method="post" action="" class="books" >
    <input type="text" name="id" placeholder="ID" class="form-control" required="" >
</br>
<input type="text" name="Title" placeholder="Title" class="form-control" required="" >
<br>
<input type="text" name="Author" placeholder="Author" class="form-control" required="" >
<br>
<input type="text" name="copy" placeholder="Copy" class="form-control" required="" >
<br>
<input type="text" name="Status" placeholder="Status" class="form-control" required="" >
<br>
<button type="submit" name="submit"  class="btn btn-default" >Submit</button>
<?php

if( isset ($_POST['submit']))
{
    if (isset($_SESSION['login_user']))
    {
  mysqli_query($db,"INSERT INTO `books` VALUES ('$_POST[id]', '$_POST[Title]', '$_POST[Author]', '$_POST[copy]', '$_POST[Status]') ;");
?>
<script>
    alert("Book added sucessfully. ")
    </script>
    <?php
    }
}


?>

</form>
</div>

</body>
</html>

    
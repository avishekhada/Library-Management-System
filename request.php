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
  
  <div class="h"> <a href="profile.php">Profile</a></div>
  <div class="h"><a href="request.php">Books Request</a></div>
  <div class="h"><a href="issue.php">Issue Information</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


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
   
<?php
if(isset ($_SESSION['login_user']))

{
    $q="SELECT * from `issue` where username like '$_SESSION[login_user]' ";
    $q=mysqli_query($db,$q);

    if (mysqli_num_rows($q)==0)
    {
        echo"There No pending request";
    }
    else
    {
        echo "<table  class='table table-bordered'>";
echo "<tr>";
echo "<th>";echo "Title";echo"</th>";
echo "<th>";echo "Approve";echo"</th>";
echo "<th>";echo "Issue Date";echo"</th>";
echo "<th>";echo "Return Date";echo"</th>";
echo "</tr>";

while ($row=mysqli_fetch_assoc($q))
{
echo "<tr>";
echo "<td>";echo $row['Title'];  echo "</td>";
echo "<td>";echo $row['approve'];echo "</td>";
echo "<td>";echo $row['issue'];echo "</td>";
echo "<td>";echo $row['return'];echo "</td>";

echo "</tr>";
}
echo "</table>";
    }
}
?>
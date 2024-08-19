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

		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
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
.container
{
    background-color:black;
    opacity:0.9;
    height:700px;
    color:white;


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
     <a href="#">Profile</a>
  <div class="h"> <a href="profile.php">Profile</a></div>
  <div class="h"><a href="request.php">Books Request</a></div>
  <div class="h"><a href="issue.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired Date</a></div>
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
<div class="container">
    <h3   style="text-align:center;">Information of Books</h3>
    <?php
     if(isset($_SESSION['login_user']))
     {
      $sql="SELECT student.username,firstname, books.id,Title,Author,issue,issue.return FROM student inner join issue ON 
      student.username=issue.username inner join books
       ON issue.id=books.id WHERE issue.approve ='Approve' ORDER BY `issue`.`return` ASC";
       $res=mysqli_query($db,$sql);


       echo "<table  class='table table-bordered'>";
       echo"<div class='scroll'>";
       echo "<tr>";
       echo "<th>";echo "Username";echo"</th>";
       echo "<th>";echo "firstname";echo"</th>";
       echo "<th>";echo "Title";echo"</th>";
       echo "<th>";echo "ID";echo"</th>";
       echo "<th>";echo "Author";echo"</th>";
       echo "<th>";echo "Issue Date";echo"</th>";
       echo "<th>";echo "Return Date";echo"</th>";
       echo "</tr>";
       
       while ($row=mysqli_fetch_assoc($res))
       {
        $d=date("Y-m-d");
        if($d > $row['return'])
        {
    $c=$c+1;
          $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';

mysqli_query($db,"update `issue` set approve='$var' where `return`='$row[return]' and `approve`='Approve' limit $c;");
echo $d."<br>";    
}
         echo "<tr>";
         echo "<td>";echo $row['username'];  echo "</td>";
         echo "<td>";echo $row['firstname'];echo "</td>";
         echo "<td>";echo $row['Title'];echo "</td>";
         echo "<td>";echo $row['id'];echo "</td>";
         echo "<td>";echo $row['Author'];echo "</td>";
         echo "<td>";echo $row['issue'];echo "</td>";
         echo "<td>";echo $row['return'];echo "</td>";

       
       
       
       
       echo "</tr>";
       }
       echo "</table>";
       
     }
else
{
  ?>
    <h3   style="text-align:center;"> Login to  see  Information of Books</h3>


<?php
}
    
    ?>


</div>
</body>
</html>

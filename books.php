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
   




<!-----search bar-->

<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: blue;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
    <form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="Title" placeholder="Enter  book ID.." required="">
				<button style="background-color: blue;" type="submit" name="submit1" class="btn btn-default">
					Request
				</button>
		</form>
</div >
<h2>List of Books</h2>
<?php
if(isset ($_POST['submit']))

{
    $q="SELECT * from `books` where title like '%$_POST[search]%' ";
    $q=mysqli_query($db,$q);

    if (mysqli_num_rows($q)==0)
    {
        echo"No result";
    }
    else
    {
        echo "<table  class='table table-bordered'>";
echo "<tr>";
echo "<th>";echo "ID";echo"</th>";
echo "<th>";echo "Title";echo"</th>";
echo "<th>";echo "Auther";echo"</th>";
echo "<th>";echo "Copies";echo"</th>";
echo "</tr>";

while ($row=mysqli_fetch_assoc($q))
{
echo "<tr>";
echo "<td>";echo $row['id'];  echo "</td>";
echo "<td>";echo $row['Title'];echo "</td>";
echo "<td>";echo $row['Author'];echo "</td>";
echo "<td>";echo $row['copy'];echo "</td>";

echo "</tr>";
}
echo "</table>";
    }
}
else
		{$sql="SELECT * FROM `books` ";
            $result=mysqli_query($db,$sql);
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: lightgreen;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Title";  echo "</th>";
				echo "<th>"; echo "Authors ";  echo "</th>";
				echo "<th>"; echo "copies";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($result))
			{
				echo "<tr>";
				echo "<td>"; echo $row['id']; echo "</td>";
				echo "<td>"; echo $row['Title']; echo "</td>";
				echo "<td>"; echo $row['Author']; echo "</td>";
				echo "<td>"; echo $row['copy']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		}
    
    if(isset ($_POST['submit1']))
    
      {
        if (isset($_SESSION['login_user']))
        {
          $q="insert into `issue` values ( '$_SESSION[login_user]','$_POST[Title]','','','') ";
          $q=mysqli_query($db,$q);
          ?>

          <script>
           windows.location="request.php"
            </script>
            <?php
        }
      }
  
       
?>


<?php    

?>






</div>


</body>
</html>


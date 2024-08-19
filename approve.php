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
    background-color:#0e0f60;
    opacity:0.9;
    height:700px;
    color:white;


}
.Approve
{
    margin-left:400px;
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
   <div class="container">
    <h3 style="text-align:center"> Approve Request</h3><br>
    <form method="post" action=""  class="Approve"name="form1">
			<input type="text" name="approve" class="form-control" placeholder="yes or not" required=""><br>


            <input type="text" name="issue" class="form-control" placeholder="Issue Date yyyy-mm-dd" required=""><br>

            <input type="text" name="return" class="form-control" placeholder="Return Date yyyy-mm-dd" required=""><br>           
			<button class="btn btn-default" name="submit" type="submit">Submit</button><br>
		</form>
<?php
if(isset($_POST['submit']))
{
    mysqli_query($db,"UPDATE `issue` SET `approve`='$_POST[approve]',`issue`='$_POST[issue]',`return`='$_POST[return]' 
    WHERE username='$_SESSION[name]'
    and id='$_SESSION[id]';");

    mysqli_query($db,"UPDATE `books` SET copy = copy-1 where id='$_SESSION[id]' ;");

    $res=mysqli_query($db,"SELECT copy from `books` where id='$_SESSION[id]';");

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['copy']==0)
      {
        mysqli_query($db,"UPDATE `books` SET status='Not available' where id='$_SESSION[id]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php"
      </script>
    <?php
  }
?>

<?php
?>
</div>
</div>
</body>
</html>

<?php
include "connection.php";
include "navbar.php";

?>
<html>
    <head>
      
<link rel="stylesheet" type="text/css" href="header.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
 section
 {
  margin-top:-20px;
 }
  </style>




 </head>

 <body>
 <div >
 
    

<section>
       
<div class="log_img">
                 <br> 
<div class="box1">
      
            <h1 style="text-align:left; font-size: 25px;">Student Login </h1>    &nbsp &nbsp<br>
           <form name="login" action="" method="post">
          <br>
          <div class="login">
        <input class="form-control"   type="text" name="username" placeholder="Username" required=""> <br><br>
        <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br><br>
        <input class="btn btn-default" type="submit" name="submit"  value="Login" style="color: black;height:30px;  width:70px">
    
    </div>
        </form>
</div>
</div>
</div>
                 </section>
                 
                

<?php

if(isset($_POST['submit']))
{
  $count=0;
  $sql="SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]'";
  $result=mysqli_query($db,$sql);
  $row=mysqli_fetch_assoc($result);

  $count=mysqli_num_rows($result);

  if($count==0)
  {
    ?>
          
          <script type="text/javascript">
            alert("The username and password doesn't match.");
          </script> 
         

    <?php
  }
  else
  { 
    $_SESSION['login_user']=$_POST['username'];
   
    $_SESSION['picture']=$row['picture'];
    ?>
   <script type="text/javascript">
        window.location="index.php"
        </script> 
     <?php   
  }

}
?>
<div>

</div>

</body>
</html>


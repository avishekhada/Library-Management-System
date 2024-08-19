<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="header.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
    nav{
    float: right ;
  padding-right: 90px;
   padding-bottom: 40px;
   word-spacing: 20px;
   padding-top: 20px;
  
   
}
nav li{
    display: inline  ;
    line-height: 100px;
   
}
    </style>




    </head>

    <body>
         <div >
 <header>
    
    <div class="logo">
    <img src="ic_logo2.svg"    style="max-width: 100%; height: 110px;">

    </div>

    <?php
if (isset($_SESSION['login_user']))
    {?>
     <nav>
        <ul>
        <ul  class="nav navbar-nav navbar-right">
        <li><a href="">
                    <b style="color: white;font-size:15px;padding: top 5px;; ">
                      <?php
                   
                        echo "Welcome ". $_SESSION['login_user']; 
                      ?>
                    </b>
            
          </a></li>
        <li><a href="books.php"><b style="font-size: 20px;color: white;">Books</b></a></li>
       
 <li><a href="logout.php"><b style="font-size: 20px;color: white;"><span class="glyphicon glyphicon-log-out">Logout</span></b></a></li>
          </ul>
        </nav>
<?php
    }
    else
{?>
<nav>
 <ul >
<li><a href="index.php"><b style="font-size: 20px;"> <span class="glyphicon glyphicon-home">Home</span></b></a></li>
<li><a href=""><b style="font-size: 20px;color: white;">Books</b></a></li>
 <li><a href="student.php"><b style="font-size: 20px;color: white;"><span class="glyphicon glyphicon-log-in">StudentLogin </span></b></a></li>
<li><a href="librarian.php"> <b style="font-size: 20px;color: white;"><span class="glyphicon glyphicon-log-in">AdminLogin</span></b></a></li>
         
          
    
        </ul>
        </nav>


<?php
}
 ?>
<p><h1 style="color:white;">Library Management system</h1></p>

   </header>
    <section>
        <div  >
        <img src="2.webp"   height= "652px"  width= "1499px"             ><br />
                </div>

 </section>
        </div>
        </body>
</html>


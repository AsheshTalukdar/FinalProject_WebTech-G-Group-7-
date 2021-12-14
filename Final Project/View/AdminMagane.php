<?php session_start(); 

if(!isset($_SESSION)){
  header('location: Home.php');
  exit;
}

?>
<?php
if(!empty($_POST["remember"])) {
  setcookie ("uName",$_POST["uName"],time()+ 3600);
  setcookie ("Pass",$_POST["Pass"],time()+ 3600);
  echo "Cookies Set Successfuly";
} else {
  setcookie("uName","");
  setcookie("Pass","");
  echo "Cookies Not Set";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

  <style>

 body {
   
     background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
     background-size: cover;
     background-color: #D3D3D3;
font-family: Agency FB;

}

 h1{
        font-size:40px ;
    }
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}
li {
  float: right;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
 
  background-color: #008000;
}






</style>
</head>
<body>


      




<h1  style="text-align: center; color: black;"><a href="#" style="text-decoration: none;">Online Auction System</a></h1>

<ul>
  <li><a href="ULogout.php"><b>Logout</b></a></li>
  <!--<li><a href="Search.php"><b>Current Running Bid</b></a></li>---->

  <li><a href="Notification_Admin.php"><b>Notification</b></a></li>  
  <li><a href="ADeletePost.php"><b>Delete Post</b></a></li>
  <li><a href="ADeleteUser.php"><b>Delete User</b></a></li>
    <li><a href="tryAjax.php"><b>Products</b></a></li>
   <li><a href="AdminPost.php"><b>Post a Product</b></a></li>
  <li><a href="AddAdmin.php"><b>Add Admin</b></a></li>
    <li><a class="active" href="AdminMagane.php"><b>Home</b></a></li>  
    </ul>
<?php


              echo "<div align='center'>";
              echo "<h1 style'margin:2% auto auto 40%;float:right;' >";
              echo "Welcome Admin";
 

?>



</body>
</html>


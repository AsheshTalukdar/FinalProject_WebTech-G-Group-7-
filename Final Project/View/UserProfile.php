<?php
if(!empty($_POST["remember"])) {
  setcookie ("uname",$_POST["uname"],time()+ 3600);
  setcookie ("Pass",$_POST["Pass"],time()+ 3600);
  echo "Cookies Set Successfuly";
} else {
  setcookie("uname","");
  setcookie("Pass","");
  echo "Cookies Not Set";
}

?>





<?php session_start() ?>

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
  
    background-color: lightgray;
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
  <li><a href="Notification_User.php"><b>Notification</b></a></li>
  <li><a href="Bidding.php"><b>Bidding</b></a></li>
  <li><a href="UUpdate.php"><b>Update Profile</b></a></li>  
  <li><a href="MyBid.php"><b>MyBid</b></a></li>
  <li><a href="MyPost.php"><b>MyPost</b></a></li>
  <li><a href="UserPost.php"><b>Post</b></a></li>
  <li><a href="UserProfile.php"><b>Home</b></a></li>  
    </ul>


<?php
    $DATABASE="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($DATABASE,$username,$psrd,$dbname);
    
    $uname= $_SESSION['uname'];
   
     $query="select * from User where UserName='$uname'";
      $Result=mysqli_query($connection,$query);
        
        $row = mysqli_fetch_array($Result);

        echo "<div align='center'>";
          echo "<img style='margin:2% auto auto 2%;float:center;border:3px solid black;border-radius:20px;width:250px;height:220px' src='".$row['Photo']."'>";
         echo "</div>";
              echo "<div align='center'>";
              echo "<h1 style'margin:2% auto auto 40%;float:right;' >";
              echo $row['Name'];
              echo "<br>";
              echo $row['Email'];
              echo "<br>";
              echo $row['Address'];
              echo "<br>";
              echo "</div>";
           
         echo"</div>";   

?>
</body>
</html>


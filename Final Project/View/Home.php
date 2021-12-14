

<?php
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 


     $query = "SELECT * FROM Product WHERE ProductStatus = 'No' ";

     $result=mysqli_query($connection,$query);

	while ($row=mysqli_fetch_array($result))
	{
		$datenow = date("Y-m-d");
        
		$duedate = $row['EndDate'];
			
		$prodid = $row['ProductID'];
		if($datenow >= $duedate){


           $buyer=$row['Buyer'];


			if($buyer=="Null")
			{
				$seller=$row['UserName'];
				 $ProductName=$row['ProductName'];

				 $message="Sorry Mr.".$seller.", Your Product ".$ProductName." Remain Unsold  No one bid your product";
                 $query1="insert into Notification values('$seller','$message','No')";
                  mysqli_query($connection,$query1);

			}
            else
            {

			$qry="UPDATE Product SET ProductStatus = 'Yes' WHERE ProductID = '$prodid'";
			mysqli_query($connection,$qry);

			$seller=$row['UserName'];
			$buyer=$row['Buyer'];
            $ProductName=$row['ProductName'];

			$qry1="select * from User where UserName='$seller'";
			$result1=mysqli_query($connection,$qry1);
	        $row1=mysqli_fetch_array($result1);
	        $sname=$row1['Name'];
	        $semail=$row1['Email'];
	        $sphone=$row1['Phone'];

	        $qry2="select * from User where UserName='$buyer'";
			$result2=mysqli_query($connection,$qry2);
	        $row2=mysqli_fetch_array($result2);
	        $bname=$row2['Name'];
	        $bemail=$row2['Email'];
	        $bphone=$row2['Phone'];
            
            $message="Congratulation Mr.".$sname.", Your Product ".$ProductName." has been sold and Buyer is ".$bname." You can contact with Buyer by Email:".$bemail." or You can use phone:".$bphone.".";
            $query1="insert into Notification values('$seller','$message','No')";
            mysqli_query($connection,$query1);

            $message="Congratulation Mr.".$bname.", Your are the final and highest bidder of  Product ".$ProductName.". Now This is Your Product. Product Seller is ".$sname.", You can contact with Seller by Email:".$semail." or You can use phone: ".$sphone.".";
            $query2="insert into Notification values('$buyer','$message','No')";
            mysqli_query($connection,$query2);
           }



		}
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
<link rel="stylesheet" type="text/css" href="../CSS/Home.css">
  <style>

 body {
    background-image: url("icon1.jpg");
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

<script type="text/javascript">

function bid(id)
{
  if(confirm('Sure Participate?'))
  {
    alert('You Are Not Sign in, Please Sign In For Bid');
    window.location='BidProduct.php?bid='+id
  }
}
</script>


</head>
<body>


<h1  style="text-align: center; color: #000000;"><a href="Home.php" style="text-decoration: none;"> Online Auction System</a></h1>







<ul>
   <li><a class="active" href="Search.php"><b>Current Running Bid</b></a></li>
 <li><a class="active" href="About Project.php"><b>About Site</b></a></li>
  <li><a class="active" href="Contact Us.php"><b>Contact Us</b></a></li>

      <li><a href="UserLogin.php"><b>User Login</b></a></li>
      <li><a href="AdminLogin.php"><b>Admin Login</b></a></li>
      <li><a href="Registration.php"><b>Sign Up</b></a></li>
     
    </ul>



<!----
<?php
if (isset($_GET['message'])) {
    print '<script type="text/javascript">alert("' . $_GET['message'] . '");</script>';
}

if (isset($_GET['loginmessage'])) {
    print '<script type="text/javascript">alert("' . $_GET['loginmessage'] . '");</script>';
}


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

  echo "<script> alert('name'); </script>";
}

?>

<div class="bodysection templete clear">

<div class="mainsection templete clear">

<form action="" method="POST">

<table>


<?php
   $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 

    $query="select * from product where ProductStatus='No'";
    $Result=mysqli_query($connection,$query);
    $break=0;


    while ($row=mysqli_fetch_array($Result)) {

      if($break==2){
        echo "<tr>";
        $break=0;
      }
   
   $datenow = date("Y-m-d");
        
  $sdate = $row['StartDate'];
  if($sdate<=$datenow){
    echo'<td>';
    echo"<img src='".$row['Image']."' width='170px' height='220px'><br>";
    echo'</td>';
    echo'<td>';
    echo "<h2> Description</h2>";
     
    echo "<h4>";
    echo "<b>";
    $name=$row['ProductID'];
    echo $row['ProductName'];
    echo "</b>";
    echo "</h4>";
    
    echo $row['Description'];
    echo "<br>";
    echo "<b>";
    echo "Price: ";
    echo $row['Price'];
    echo "</b>";

    echo "<br>";
    
?>
   <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/bidnow.png"  width="50px" height="50px"  alt="Bid" /> <span style="color: green;font-size: 20px"><b>Running</b></span> </a>
<?php 
      $break++;
      echo "<hr>";

echo'</td>';

    }
}
?>
 
</table>
</div>

<div class="sidebar clear">

    <div class="Semisidebar clear">


      <h2>Sold Product Here</h2>

     <?php


    $query="select * from product where ProductStatus='Yes'";
    $Result=mysqli_query($connection,$query);
    $break=0;

    while ($row=mysqli_fetch_array($Result)) {

      if($break==1){
        echo "<tr>";
        $break=0;
      }

    echo'<td>';
    echo"<img src='".$row['Image']."' width='285px' height='220px'><br>";
    echo'</td>';

    echo'<td>';
     
    echo "<h4>";
    echo "<b>";
    echo $row['ProductName'];
    echo "</b>";
    echo "</h4>";
    
    echo $row['Description'];

    echo "<br>";
    echo "<b>";

    echo "Sold Price: ";
    echo $row['Price'];
    echo "</b>";

    echo "<br>";
                ?>
     <a href="#"> <img src="Image/sold.jpg"  width="285px" height="100px"  alt="Bid" /> </a>
<?php 

      $break++;
      echo'</td>';
    echo "<hr>";

    }
  
?>

  
   </div>
   

 </div>
	

</form>

----->

</body>
</html>


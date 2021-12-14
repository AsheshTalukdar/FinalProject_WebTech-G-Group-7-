
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>

	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <style>

 body {

  
font-family: Agency FB;
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

<?php include('header_outside.php'); ?>

<table align="center">

<?php 

   $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 

     $query="select * from Product";
    

      $result=mysqli_query($connection,$query);
      $break=0;

      if(mysqli_num_rows($result)>0)
      {

      while ($row=mysqli_fetch_array($result)) {
      	   if($break==2){
        echo "<tr>";
        $break=0;
      }
   

    echo'<td>';
     echo"<img src='".$row['Image']."' width='200px' height='220px'>";
    echo'</td>';
    echo'<td>';
    echo "<h1> Product Details</h1>";
    echo "<h3>";
    echo "Name: ".$row['ProductName'];
    echo "</h3>";

     echo "Description: ".$row['Description'];
     echo "<br>";
     echo "<b>";
    echo "Price: ".$row['Price'];
    echo "<b>";
     echo "<br>";
?>
   <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/bidnow.png"  width="50px" height="50px"  alt="Bid" /> <span style="color: green;font-size: 20px"><b>Running</b></span> </a>
<?php 
   
$break++;      
echo "<hr>";
echo "<hr>";
echo'</td>';

    }
  }
  else
   {
 echo "<script>window.alert('Data Not Found');</script>";
   }



?>

</body>
</html>





<?php 


 session_start();

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
<link rel="stylesheet" type="text/css" href="../CSS/Bidding.css">
  <style>

 body {
    background-color: lightgray;
font-family: Agency FB;
}




</style>

<script type="text/javascript">

function bid(id)
{
  if(confirm('Sure Participate ?'))
  {
    window.location='UserBid.php?bid='+id
  }
}
</script>


</head>
<body>



  <?php include('header_user.php'); ?>

  
<div class="bodysection templete clear">

<div class="mainsection templete clear">


<table>


<?php
   $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 
$uname=$_SESSION['uname'];
  $query="select * from product where ProductStatus='No' and UserName!='$uname'";
    $Result=mysqli_query($connection,$query);
    $break=0;

    while ($row=mysqli_fetch_assoc($Result)) {

      //if($break==2){

        //echo "<tr>";
       // $row['ProductName'];
        //$row['CatagoryName'];
    
       // $break=0;
        echo $row["ProductID"];
        echo $row["ProductName"];
        echo $row["CatagoryName"];
        echo $row['StartDate'];
            echo'<td>';
     echo"<img src='".$row['Image']."' width='200px' height='220px'>";
    echo'</td>';
    echo'<td>';
    echo "<h1> Description</h1>";
    echo "<h3>";
    echo $row['ProductName'];
    echo "</h3>";

     echo $row['Description'];
     echo "<br>";
     echo "<b>";
     echo "Price: ";
    echo $row['Price'];
    echo "</b>";
     echo "<br><br>";
        //print_r($row);

      }

      
      //print_r(mysqli_fetch_assoc($Result));
  /*$datenow = date("Y-m-d");
        
  $sdate = $row['StartDate'];
  if($sdate<=$datenow){
    echo'<td>';
     echo"<img src='".$row['Image']."' width='200px' height='220px'>";
    echo'</td>';
    echo'<td>';
    echo "<h1> Description</h1>";
    echo "<h3>";
    echo $row['ProductName'];
    echo "</h3>";

     echo $row['Description'];
     echo "<br>";
     echo "<b>";
     echo "Price: ";
    echo $row['Price'];
    echo "</b>";
     echo "<br><br>";*/
    ?>
    <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/bidnow.png"  width="50px" height="50px"  alt="Bid" /> <span style="color: green;font-size: 20px"><b>Running</b></span> </a>
<?php 
      $break++;
echo'</td>';
   // }
  //}
?>

  
</table>

</div>


 </div>
  


</body>
</html>


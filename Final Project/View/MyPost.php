<?php session_start() ?>


<?php 

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

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
  
    background-color: lightgray;
font-family: Agency FB;
}

#heading
{
 text-align:center;
 margin-top:10px;
 font-size:30px;
 color:#228B22;
}
#election
{
 width:400px;
 background-color:#286090;
 padding:2px;
 height:40px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
}

select
{
 width:400px;
 height:40px;
 border:1px solid #20B2AA;
 margin-top:20px;
 padding:2px;
 font-size:20px;
 color:grey;
 border-radius:5px;

}

table {
      margin: auto;
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
      font-size: 12px;
    }

    h1 {
      margin: 25px auto 0;
      text-align: center;
      text-transform: uppercase;
      font-size: 17px;
    }

    table td {
      transition: all .5s;
    }
    
    /* Table */
    .data-table {
      border-collapse: collapse;
      font-size: 14px;
      min-width: 537px;
    }

    .data-table th, 
    .data-table td {
      border: 1px solid #e1edff;
      padding: 7px 17px;
    }
    .data-table caption {
      margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
      background-color: #508abb;
      color: #FFFFFF;
      border-color: #6ea1cc !important;
      text-transform: uppercase;
    }

    /* Table Body */
    .data-table tbody td {
      color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: right;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
      background-color: green;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #e5f5ff;
      text-align: right;
    }
    .data-table tfoot th:first-child {
      text-align: left;
    }
    .data-table tbody td:empty
    {
      background-color: #ffcccc;
    }
</style>


<script>
  
  function validform()
  {

   
   if(document.getElementById("Catagory").value == "Select Catagory")
   {
      alert("Please select Product Catagory"); // prompt user
     // document.getElementById("election").focus(); //set focus back to control
      return false;
   }
  // return true;
  }

</script>


</head>
<body>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

       $catagory=$_POST['Catagory'];
 

    $uname=$_SESSION['uname'];


     
    if($catagory=='All')
    {
       $query="select * from Product where UserName='$uname'";
        $Rows=mysqli_query($connection,$query);

     if(mysqli_num_rows($Rows)>0){
     	echo '<table class="data-table">';
       echo'<thead>';
       echo'<tr>';
       echo'<th>Catagory </th>';    
       echo'<th>Photo </th>'; 
       echo'<th>Product Name</th>';
       echo '<th>Price</th>';
       echo '<th>Sold or Not?</th>';
       echo '<th>Start Date</th>';
       echo '<th>End Date</th>';
      echo'</tr>';
      echo'</thead>';

      echo'<tbody>';

   while($row = mysqli_fetch_array($Rows))
      {
     
        echo '<tr>
           <td>'.$row['CatagoryName'].'</td>
           <td> <img style="width:100px;height:100px" src='.$row['Image'].'>;
            <td>'.$row['ProductName'].'</td>
             <td>'.$row['Price'].'</td>
             <td>'.$row['ProductStatus'].'</td>

            <td>
              '.$row['StartDate'].'
            </td>
         
         
            <td>
              '.$row['EndDate'].'
            </td>
        </tr>';
      }
  }
  else
   {
   	echo "<script> window.alert('You Have Not Any Post Yet');</script>";
   }
   
    }
    
    else
    {

    	$query="select * from Product where UserName='$uname' and CatagoryName='$catagory'";
        $Rows=mysqli_query($connection,$query);

     if(mysqli_num_rows($Rows)>0){
     	echo '<table class="data-table">';
       echo'<thead>';
       echo'<tr>';
        echo'<th>Catagory </th>';  
       echo'<th>Photo </th>';    
       echo'<th>Product Name</th>';
       echo '<th>Price</th>';
       echo '<th>Sold or Not?</th>';
       echo '<th>Start Date</th>';
       echo '<th>End Date</th>';
      echo'</tr>';
      echo'</thead>';

      echo'<tbody>';

   while($row = mysqli_fetch_array($Rows))
      {
     
        echo '<tr>
           <td>'.$row['CatagoryName'].'</td>
           <td> <img style="width:100px;height:100px" src='.$row['Image'].'>;
            <td>'.$row['ProductName'].'</td>
           
             <td>'.$row['Price'].'</td>
             <td>'.$row['ProductStatus'].'</td>

            <td>
              '.$row['StartDate'].'
            </td>
         
         
            <td>
              '.$row['EndDate'].'
            </td>
        </tr>';
      }
  }
  else
   {
   	echo "<script> window.alert('You Have Not Any Post Yet On this Catagory');</script>";
   }
   

    }

echo '</tbody>';

}
?>

  <?php include('header_user.php'); ?>


  <p id="heading">Select Product Catagory</p>
<center>
<form method="POST" name="CatagoryForm"  onsubmit="return validform();">
<br><div align="center">

 <select name="Catagory" id="Catagory" onchange="fetch_select(this.value);">
 <option>Select Catagory</option>
  <option>Mobile</option>
  <option>Computer</option>
  <option>Car</option>
  <option>All</option>
 </select><br>

</div>   
</center>
<p style=" margin: -2.7% 10% 10% 68%">
<button type="submit" class="btn btn-primary">View</button>
</form>


</body>
</html>


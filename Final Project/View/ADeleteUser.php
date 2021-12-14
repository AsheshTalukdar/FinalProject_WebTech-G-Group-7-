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
      background-color: lightgray;
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

<script type="text/javascript">

function del(id)
{ 
  console.log('OK');
  if(confirm('Are you sure?'))
  {
    alert(id);
    window.location='AUserDelete.php?Delete='+id
  }
}

</script>
</head>
<body>

<?php include('header_admin.php'); ?>


<form action="" method="POST">
<table class="data-table">
 <thead>
     <tr>
       <th>Photo</th>      
       <th>Name</th>
       <th>Email</th>
       <th>Gender</th>
       <th>Address</th>
       <th>Delete</th>
    </tr>
  </thead>

<tbody>

<?php





    $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 

    $query="select * from User";
    $Result=mysqli_query($connection,$query);
   while ($row=mysqli_fetch_array($Result))
    {
      $id=$row['UserId'];
         echo "<tr>";
          echo "<td>";
         echo "<img style='width:100px;height:100px' src='".$row['Photo']."'>";
           echo "</td>";
           echo "<td>";
          echo $row['Name'];
           echo "</td>";
          echo "<td>";
         echo $row['Email'];
         echo "</td>";
          echo "<td>";
          echo $row['Gender'];
           echo "</td>";
          echo "<td>";
          echo $row['Address'];
           echo "</td>";
            echo "<td>";
            $name=$row[1];
         
         echo "<img src='Image/remove.png'  onclick='del(\"$id\")'   width='50px' height='50px' alt='Bid'/>";
          echo "</td>";
          echo "</tr>";
}
    ?>



</tbody>
</table>
</form>

</body>
</html>


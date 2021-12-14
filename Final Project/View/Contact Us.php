<?php session_start() ?>


<?php 

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

?>



<!DOCTYPE html>
<html>

<head>

<title>Bidding System</title> 

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" type="text/css" href="../CSS/Contact.css">
<style>
  div.Parallel {
      display:inline-block;
    }

    p {
      text-align:center;
    }


table 
{

 
    border-radius:20px;
  
   
}

h2
{
  
  margin:0% auto auto 15%;

   
}


 body {
 
font-family: Agency FB;
   background-image: url("icon1.jpg");
     background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
     background-size: cover;
     background-color: #D3D3D3;

}
input {
    width: 150%;
    height:100%;
}

.modal-header
 {
     padding:9px 15px;
     border-bottom:1px solid #eee;
     background-color: #A9A9A9;
 }
.modal-footer
{
background-color: #A9A9A9;
}
.modal-body
{
 background-color: lightgray;
}


.bottomright{

position: fixed;
right: 0px;
bottom: 0px;
width: 200px;
height: 40px;
padding: 5px;

}



</style>

<script type="text/javascript">
  

  function validmessage()
  {
    var name=UserMessage.name;
    var email=UserMessage.email;
    var message=UserMessage.message;

    if(name.value=="")
    {
      alert("Need Your Name");
      name.focus();
    }
    if(email.value=="")
    {
      alert("Need Your Email");
      email.focus();
    }

  }

</script>
</head>
<div class="container-fluid">



<body>

<?php
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {


$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$seen="No";

$query="insert into ANotification values('$name','$email','$message','$seen')";

mysqli_query($connection,$query);



}
?>


 <?php include('header_outside.php'); ?>






<h3> Developed By:</h3>
<br>

<div class="Parallel">

<p><a style="background-color:white;height:30px;width:100%;"> <span style="color:black"><font size="5">Kajol Ashesh Talukdar</span></a></p>
<p><a style="background-color:white;height:30px;width:100%;"> <span style="color:black"><font size="5">19-40459-1@student.aiub.edu</span></a></p>
</div>


<div class="Parallel">

<p><a style="background-color:white;height:30px;width:100%;"> <span style="color:black"><font size="5">MD. Nomanuzzaman Chisty</span></a></p>
<p><a style="background-color:white;height:30px;width:100%;"> <span style="color:black"><font size="5">19-40431-1@student.aiub.edu</span></a></p>
</div>
<div class="Parallel">

<p><a style="background-color:white;height:30px;width:100%;"> <span style="color:black"><font size="5">Iffat Sohana Niha</span></a></p>
<p><a style="background-color:white;height:30px;width:100%;"> <span style="color:black"><font size="5">19-40473-1@student.aiub.edu</span></a></p>
</div>






</body>
</html>


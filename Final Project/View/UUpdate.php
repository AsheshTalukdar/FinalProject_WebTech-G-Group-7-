
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" type="text/css" href="../CSS/userlogin">
  <style type="text/css">
    
body {   background-color: lightgray;
  
font-family: Agency FB;
}

.btn {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}
  </style>


<script>
  
function ValidateContactForm()
{

 
    var Name=ContactForm.Name;
    var Pass=ContactForm.Password;
    var Email=ContactForm.Email;
    var Phone=ContactForm.Phone;
    var Address=ContactForm.Address


    if (Name.value=="") 
    {
      window.alert("Enter Your Name");
      Email.focus();
      return false;
    }

   if (Pass.value=="") 
    {
      window.alert("Enter Password");
      Pass.focus();
      return false;
    }


    if (Email.value=="") 
    {
      window.alert("Enter Your Email");
      Email.focus();
      return false;
    }

   if (!validateCaseSensitiveEmail(Email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
   if (Phone.value=="") 
    {
      window.alert("Enter Your Phone Number");
      Email.focus();
      return false;
    }
    
    return true;

}
function validateCaseSensitiveEmail(email) 
{ 
 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
 if (reg.test(email)){
 return true; 
}
 else{
 return false;
 } 
} 

</script>

</head>
<body>


  <?php include('header_user.php'); ?>

<?php
    $uName= $_SESSION['uname'];
     $Pass= $_SESSION['Pass'];

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
     
     
    
       $query="select * from User where UserName='$uName' and Password='$Pass'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");
         
    
    $Rows=mysqli_fetch_array($Complete);

    $name=$Rows['Name'];
    $email=$Rows['Email'];
    $phone=$Rows['Phone'];
    $address=$Rows['Address'];;

?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $uName= $_SESSION['uname'];

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
     
     $name=$_POST['Name'];
     $Password=$_POST['Password'];
     $Email=$_POST['Email'];
     $Phone=$_POST['Phone'];
     $Address=$_POST['Address'];
    
     $query="update User set Name='$name',Password='$Password',Email='$Email',Phone='$Phone', Address='$Address' where UserName='$uName'";
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");

      echo "<script>alert('Update Successfully');</script>";
         
}
?>




<div class="container">
    <div class="row">
        <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Update Profile</h2><br><br>
  <form class="login-container" method="post" action="" name="ContactForm" onsubmit="return ValidateContactForm();">

<table style="font-size: 20px;">
    <tr><td>
    <label>Name:</label></td>
    <td><input type="text" name="Name" placeholder="Your Name"value="<?php echo $name;?>"><br>
</td></tr>
<tr><td>
    <label>Password:</label></td>
    <td><input type="password" placeholder="New Password" name="Password"><br>
    </td></tr>
    <tr><td>
    <label>Email:</label></td>
    <td><input type="Email" name="Email" placeholder="Your Email" value="<?php echo $email;?>"><br>
    </td></tr>
    <tr><td>
    <label>Phone:</label></td>
    <td><input type="text" name="Phone" placeholder="Your Phone Number"value="<?php echo $phone;?>"><br>
    </td></tr>
       <tr><td>
    <label>Address:</label></td>
    <td><input type="text" name="Address" placeholder="Your Address" value="<?php echo $address;?>"><br>
 </td></tr>
       </table><br><br>
    <input class="btn" type="submit" value="Update Now">
    
  </form>
</div>
    </div>
</div>


</body>
</html>





<?php 
    require('../Controller/addadmin.php');
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
  <link rel="stylesheet" type="text/css" href="../CSS/userlogin.css">

  <style>

 body {
     background-color: lightgray;
font-family: Agency FB;
}

</style>

<script type="text/javascript">


function validadmin()
{
 


var uname=AAdmin.username;

var password=AAdmin.password;
var email=AAdmin.email;


if(uname.value=="")
{
  window.alert("Need Valid Username for new admin");
  uname.focus();
  return false;

}

if(password.value=="")
{
  window.alert("Need password for new admin");
  password.focus();
  return false;
  
}

if(email.value=="")
{
  window.alert("Need Valid Email for new admin");
  email.focus();
  return false;
  
}
   if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
return true;

}

        function checkUname() {
            if (document.getElementById("uname").value == "") {
                document.getElementById("unameErr").innerHTML = "User Name can't be blank";
                document.getElementById("uname").style.borderColor = "red";
            }else{
                document.getElementById("unameErr").innerHTML = "";
                document.getElementById("uname").style.borderColor = "green";

            }
            
        }
      function checkPass() {
            if (document.getElementById("password").value == "") {
                document.getElementById("passErr").innerHTML = "Password can't be blank";
                document.getElementById("password").style.borderColor = "red";
            }else{
                document.getElementById("passErr").innerHTML = "";
                document.getElementById("password").style.borderColor = "green";

            }
            
        }

           function checkEmail() {
            if (document.getElementById("email").value == "") {
                document.getElementById("emErr").innerHTML = "Email can't be blank";
                document.getElementById("email").style.borderColor = "red";
            }else{
                document.getElementById("emErr").innerHTML = "";
                document.getElementById("email").style.borderColor = "green";

            }
            
        }


















</script>
</head>
<body>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

        
          $uname    =$_POST['username'];
          $Password =$_POST['password'];
          $email    =$_POST['email'];

          $query="insert into Admin(AdminName,AdminPassword,AdminEmail) values('$uname','$Password','$email')";
          mysqli_query($connection,$query);
      
          echo '<script language="javascript">';
          echo 'alert("Added successfully")';
          echo '</script>';     
}

?>
 <?php include('header_admin.php'); ?>

  
<div class="container-fluid">
   <form  class="register-form" method="POST" name="AAdmin"> 
      <div class="row">      
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="Username">ADMINNAME</label>
               <input type="text" name="username" id="uname" class="form-control" onblur="checkUname()" onkeyup="checkUname()"/>
                                   <p id="unameErr"></p>
                                    <span style="color: red;"></span>
                                </div>
                                 
      </div>

       <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="password">PASSWORD</label>
               <input type="password" name="password" id="password" class="form-control" onblur="checkPass()" onkeyup="checkPass()"/>
                               <p id="passErr"></p>
                                    <span style="color: red;"></span>  
                                </div>
                                   
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="email">EMAIL</label>
               <input type="email" name="email" id="email" class="form-control"onblur="checkEmail()" onkeyup="checkEmail()"/>
                             <p id="emErr"></p>
                                    <span style="color: red;"></span>   
                                </div>
                                    <p id="emErr"></p>
                                    <span style="color: red;"></span>
      </div>
     
      <hr>
      <div class="row">
        
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
              <input  type="submit" name="addadmin" class="btn btn-default regbutton"  onclick=" return validadmin();" >
            </div>   
      </div>    
    </form>
</div>
</body>
</html>


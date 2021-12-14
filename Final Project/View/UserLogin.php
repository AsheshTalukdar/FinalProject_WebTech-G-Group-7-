<!DOCTYPE html>

<html>
<head>
	<title>Bidding System</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <link rel="stylesheet" type="text/css" href="../CSS/userlogin.css">

<style>

table 
{

    border-spacing: 20px;
   
    margin:4% auto auto 20%;
   
    border-radius:20px;
  
   
}


body 
{
	  background-color: lightgray;
	   
        font-family: Agency FB;
		
}


 .size 
	 {
		 width: 250px; 
		 height: 30px;
		 padding: 2px
	 }
	 
	 .Error 
	 {
		 color: red;
     }

div.temp
{
	  margin:4% auto auto 20%;
}
td
{
	 
   font-size:35px;
   border-width:10px;

  
}
input, select, textarea {
font-size: 75%;
font-family: Agency FB;
text-align:center;

}

</style>


<script type="text/javascript">
  
  function ValidUser()
  {
    var name=UserLogin.uname;
    var Password=UserLogin.Pass;

    if(name.value=="")
    {
      window.alert("Name Field Can Not Be Empty");
      name.focus();
      return false;
    }
    if(Password.value=="")
    {
      window.alert("Password Field Can Not Be Empty");
      Password.focus();
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
     
     $uname=$_POST['uname'];
     $Pass=$_POST['Pass'];
    
       $query="select * from User where UserName='$uname' and Password='$Pass'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");
         
    
    $Rows=mysqli_fetch_array($Complete);
    
    if($Rows['UserName']==$uname &&$Rows['Password']==$Pass)
    {
        session_start();
        $_SESSION['uname'] = $uname;
        $_SESSION['Pass'] = $Pass;
        header("Location:UserProfile.php");
         exit();
     
    }
    else
    {
      
      echo ("<script LANGUAGE='JavaScript'>
            window.alert('Wrong User Name Or Password Try Again');
            window.location.href='UserLogin.php';
            </script>");
   
    }
    
      mysqli_close($connection);                     
   }

	

?>

  <?php include('header_outside.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><b>Sign in to continue</b></h1>
            <div class="account-wall">
                <img class="profile-img" src="Image/admin.png " alt="">
                <form class="form-signin" action="" method="POST" name="UserLogin" onsubmit="return ValidUser();">
                <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter User Name" onblur="checkUname()" onkeyup="checkUname()" value="<?php if(isset($_COOKIE["uname"])) { echo $_COOKIE["uname"]; } ?>" />
                  <p id="unameErr"></p>
                  <span style="color: red;"></span>

                <input type="password" class="form-control" name="Pass" id="password" placeholder="Password" onblur="checkPass()" onkeyup="checkPass()" value="<?php if(isset($_COOKIE["Pass"])) { echo $_COOKIE["Pass"]; } ?>"/>
                  <p id="passErr"></p>
                  <span style="color: red;"></span>


                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
             
                <input type="checkbox" name="remember" value="remember-me">Remember me
                </label>
                <a href="ForgotPass.php" class="pull-right need-help">Forgot Password?</a><span class="clearfix"></span>
                </form>
            </div>
            
        </div>
    </div>
</div>

</div>




</body>
</html>



<?php 
    require('../Controller/alogin.php');
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
<link rel="stylesheet" type="text/css" href="../CSS/Adminlogin.css">

  <style>

 body {
   
    background-color: lightgray;
font-family: Agency FB;
}



</style>

<script type="text/javascript">
  
  function validadmin()
  {
    var name=AdminLogin.uName;
    var Password=AdminLogin.Pass;

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


<?php 



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
     
     $aname=$_POST['uName'];
     $Pass=$_POST['Pass'];
    
       $query="select * from Admin where AdminName='$aname' and AdminPassword='$Pass'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");
         
    
    $Rows=mysqli_fetch_array($Complete);
    
    if($Rows['AdminName']==$aname &&$Rows['AdminPassword']==$Pass)
    {
        session_start();
       $_SESSION['uName'] = $aname;
        $_SESSION['Pass'] = $Pass;
         header("Location:AdminMagane.php");
         exit();
     
    }
    else
  {

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Wrong User Name Or Password Try Again');
            window.location.href='AdminLogin.php';
            </script>");
    }
    
      mysqli_close($connection);                     
   }
   

  

?>


  <?php include('header_outside.php'); ?>

 <div class="container" style="margin-top:40px">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><b>Sign in to continue</b></h1>
          <div class="panel-body">
            <form role="form" action="#" method="POST" name="AdminLogin" onsubmit=" return validadmin();">
              <fieldset>
                <div class="row">
                  <div class="center-block">
                    <img class="profile-img"src="iMAGE/user.png" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                        </span> 
                        <input class="form-control" placeholder="Username" name="uName" id="uname" type="text" onblur="checkUname()" onkeyup="checkUname()" value="<?php if(isset($_COOKIE["uName"])) { echo $_COOKIE["uName"]; } ?>" />
                
                </div>
                  <p id="unameErr"></p>
                  <span style="color: red;"><?php echo $uname_error ?></span>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                        </span>
                        <input class="form-control" placeholder="Password" name="Pass" type="password" id="password" onblur="checkPass()" onkeyup="checkPass()"  value="<?php if(isset($_COOKIE["Pass"])) { echo $_COOKIE["Pass"]; } ?>"/>
                
                </div>
                  <p id="passErr"></p>
                  <span style="color: red;"><?php echo $password_error ?></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="alogin"class="btn btn-lg btn-primary btn-block" value="Sign in"><br>
                         <input type="checkbox" name="remember" value="remember-me">Remember me
                </label>
                    </div>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
          
                </div>
      </div>
    </div>
  </div>


</body>
</html>


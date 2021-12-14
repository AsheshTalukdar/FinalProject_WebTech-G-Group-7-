

<?php 
    require('../Controller/reg.php');
?>





<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		<title>Bidding System</title>


  <style>

 body {
   
    background-color: lightgray;
font-family: Agency FB;
}



</style>

<script type="text/javascript">
	

	function RegisterValid()
	{


    var Name     =Registerform.name;
    var Uname    =Registerform.uname;
    var Password =Registerform.password;
    var email    =Registerform.email;
    var phone    =Registerform.phone;
    var dob      =Registerform.dob;
    var gender   =Registerform.gender;
    var address  =Registerform.address;


    if (Name.value == "")
    {
        window.alert("Please enter your name.");
        Name.focus();
        return false;
    }

    if (!/^[a-zA-Z]*$/g.test(Name.value)) {
        alert("Invalid Characters For Name");
        Name.focus();
        return false;
    }

    if (Uname.value == "")
    {
        window.alert("Please enter your username.");
        Uname.focus();
        return false;
    }
    if (Password.value == "")
    {
        window.alert("Please enter your Password.");
        Password.focus();
        return false;
    }
    
    if (email.value == "")
    {
        window.alert("Please enter your email.");
        email.focus();
        return false;
    }

     if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }



    if (phone.value == "")
    {
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }

    if (phone.value.length != 11)
    {
        window.alert("Please  your telephone number must be 11 digit.");
        phone.focus();
        return false;
    }


    if (dob.value == "")
    {
        window.alert("Please Date of Birth.");
        dob.focus();
        return false;
    }
    if (address.value == "")
    {
        window.alert("Please provide Your Address");
        address.focus();
        return false;
    }

    if (gender.value == "")
    {
        window.alert("Please provide Gender.");
        gender.focus();
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

        function checkName() {
            if (document.getElementById("name").value == "") {
                document.getElementById("nameErr").innerHTML = "Name can't be blank";
                document.getElementById("name").style.borderColor = "red";
            }else{
                document.getElementById("nameErr").innerHTML = "";
                document.getElementById("name").style.borderColor = "green";

            }
            
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


           function checkPhn() {
            if (document.getElementById("phone").value == "") {
                document.getElementById("phnErr").innerHTML = "Phone Number can't be blank";
                document.getElementById("phone").style.borderColor = "red";
            }else{
                document.getElementById("phnErr").innerHTML = "";
                document.getElementById("phone").style.borderColor = "green";

            }
            
        }



           function checkDob() {
            if (document.getElementById("dob").value == "") {
                document.getElementById("dobErr").innerHTML = "Date of Birth can't be blank";
                document.getElementById("dob").style.borderColor = "red";
            }else{
                document.getElementById("dobErr").innerHTML = "";
                document.getElementById("dob").style.borderColor = "green";

            }
            
        }
            function checkAdd() {
            if (document.getElementById("address").value == "") {
                document.getElementById("addErr").innerHTML = "Address can't be blank";
                document.getElementById("address").style.borderColor = "red";
            }else{
                document.getElementById("addErr").innerHTML = "";
                document.getElementById("address").style.borderColor = "green";

            }
            
        }




</script>

</head>
<body>
<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Server="localhost";
		 $username="root";
		 $psrd="";
		 $dbname = "Bidding";
		 $connection= mysqli_connect($Server,$username,$psrd,$dbname);

         $name     =$_POST['name'];
         $uname    =$_POST['uname'];
         $Password =$_POST['password'];
         $email    =$_POST['email'];
         $phone    =$_POST['phone'];
         $dob      =$_POST['dob'];
         $gender   =$_POST['gender'];
         $address  =$_POST['address'];


         $destination = "UserPhoto/".$_FILES['image']['name'];
         $filename    = $_FILES['image']['tmp_name'];  

         move_uploaded_file($filename, $destination);

         $query="insert into User(Name,UserName,Password,Email,Phone,Gender,DOB,Address,Photo) values('$name','$uname','$Password','$email','$phone','$gender','$dob','$address','$destination')";
         $ret= mysqli_query($connection,$query);
      
        echo '<script language="javascript">';
        echo 'alert("Registration successfully")';
        echo '</script>';
      } 

?>

	<?php include('header_outside.php'); ?>
  

		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h3>User Registration Form</h5>
					<form method="POST"  enctype="multipart/form-data" name="Registerform"  onsubmit="return RegisterValid();" >
						
						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
								
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" onblur="checkName()" onkeyup="checkName()"/>
								
								</div>
									<p id="nameErr"></p>
									<td><span style="color: red;"><?php echo $name_error ?></span></td>
							</div>
						</div>
					    <div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<input type="text" class="form-control" name="uname" id="uname"  placeholder="Enter your User Name" onblur="checkUname()" onkeyup="checkUname()"/>
								
								</div>
									<p id="unameErr"></p>
									<span style="color: red;"><?php echo $uname_error ?></span>
							</div>
						</div>

						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" onblur="checkPass()" onkeyup="checkPass()"/>
								
								</div>
									<p id="passErr"></p>
									<span style="color: red;"><?php echo $password_error ?></span>
							</div>
						</div>


						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" onblur="checkEmail()" onkeyup="checkEmail()"/>
								
								</div>
									<p id="emErr"></p>
									<span style="color: red;"><?php echo $email_error ?></span>
							</div>
						</div>

						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter your Phone Number"onblur="checkPhn()" onkeyup="checkPhn()"/>
								
								</div>
									<p id="phnErr"></p>
									<span style="color: red;"><?php echo $phone_error ?></span>
							</div>
						</div>
							

                        <div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<input type="date" class="form-control" name="dob" id="dob" onblur="checkDob()" onkeyup="checkDob()"/>
								
								</div>
									<p id="dobErr"></p>
									<span style="color: red;"><?php echo $dob_error ?></span>
							</div>
						</div>

                        <div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<input type="text" class="form-control" name="address" placeholder="Your Address" id="address" onblur="checkAdd()" onkeyup="checkAdd()"/>
								
								</div>
									<p id="addErr"></p>
									<span style="color: red;"><?php echo $address_error ?></span>
							</div>
						</div>
                            <div class="form-group">
							<label  class="cols-sm-2 control-label">Your Gender</label>
							<div class="cols-sm-10">
								<div class="input-group">
									
									<input type="radio" name="gender" value="Male" />Male
									<input type="radio" name="gender" value="Female" />Female
								</div>
							</div>
						</div>
						  <div class="form-group">
							<label class="cols-sm-2 control-label">Your Profile Picture</label>
							<div class="cols-sm-10">
								<div class="input-group">
								
									<input type="file" name="image">
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input  type="submit" name="reg" id="button" value="Registration" class="btn btn-primary btn-lg btn-block login-button">
						</div>
						
					</form>
				</div>
			</div>
		</div>

	
	</body>
</html>
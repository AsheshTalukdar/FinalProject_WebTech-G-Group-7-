<?php
  $name="";
  $name_error="";
  $uname="";
  $uname_error="";
  $password="";
  $password_error="";
  $email="";
  $email_error="";
  $phone="";
  $phone_error="";
  $dob="";
  $dob_error="";
  $address="";
  $address_error="";
  $hasError=false;

  function checkSpecialChar($str) {
        $len=strlen($str);
    for($i=0;$i<$len;$i++)
    {
      if($str[$i]=='#')
      {
        return true;
      }
    }
        return false;
  }
    
    if(isset($_POST['reg']))
    {

    if(empty($_POST['name']))
    {
      $hasError=true;
      $name_error="Field Can Not Be Empty";
    }
    else
    {
      $name=$_POST['name'];
    }
 
        if(empty($_POST['uname']))
    {
      $hasError=true;
      $uname_error="Field Is Required";
    }
    elseif(strlen($_POST['uname'])<5)
    {
      $hasError=true;
      $uname_error="Username must be greater then 5";
    }
    else
    {
      $uname=$_POST['uname'];
    }


    if(empty($_POST['password']))
    {
      $hasError=true;
      $password_error="Field Can Not Be Empty";
    }
    elseif((strlen($_POST['password'])<6))
    {
      $hasError=true;
      $password_error="Password must be greater then 6";
    }
    elseif(!checkSpecialChar($_POST['password']))
    {
      $hasError=true;
      $password_error="Password must Contain special Char";
    }

    else{
      $password=$_POST['password'];
    }


if(empty($_POST['email']))
    {
      $hasError=true;
      $email_error="Field Can Not Be Empty";
    }
    elseif(!(strpos($_POST["email"],"@")>0) and !(strpos($_POST["email"],".")>0))
    {
      $hasError=true;
      $email_error="Email Must Contain '@' and '.'";
    }
    else
    {
      $email=$_POST['email'];
    }



    if(empty($_POST['phone']))
    {
      $hasError=true;
      $phone_error="Field Can Not Be Empty";
    }
      elseif(strlen($_POST['phone'])<10)
    {
      $hasError=true;
      $phone_error="Phone number must be 11";
    }
    else
    {
      $phone=$_POST['phone'];
    }

    

    if(empty($_POST['dob']))
    {
      $hasError=true;
      $dob_error="Field Can Not Be Empty";
    }

    else
    {
      $dob=$_POST['dob'];
    }

        if(empty($_POST['address']))
    {
      $hasError=true;
      $address_error="Field Can Not Be Empty";
    }

    else
    {
      $address=$_POST['address'];
    }



    if(!$hasError)
    {
      setcookie('name',$name,time()+(60*10));
      setcookie('uname',$uname,time()+(60*10));
      setcookie('password',$password,time()+(60*10));
      setcookie('email',$email,time()+(60*10));
      setcookie('phone',$phone,time()+(60*10));
      setcookie('dob',$dob,time()+(60*10));
      setcookie('address',$address,time()+(60*10));
      header('Location: ../view/Registration.php');
    }
    }
?>
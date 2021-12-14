<?php
  $username="";
  $username_error="";
  $password="";
  $password_error="";
  $email="";
  $email="";
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
    
    if(isset($_POST['addadmin']))
    {

        if(empty($_POST['username']))
    {
      $hasError=true;
      $username_error="Field Is Required";
    }
    elseif(strlen($_POST['username'])<5)
    {
      $hasError=true;
      $username_error="Username must be greater then 5";
    }
    else
    {
      $username=$_POST['username'];
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


    if(!$hasError)
    {
      setcookie('uname',$uname,time()+(60*10));
      setcookie('password',$password,time()+(60*10));
      header('Location: ../view/AdminLogin.php');
    }
    }
?>
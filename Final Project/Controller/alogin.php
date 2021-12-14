<?php
  $uname="";
  $uname_error="";
  $password="";
  $password_error="";
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
    
    if(isset($_POST['alogin']))
    {

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

    if(!$hasError)
    {
      setcookie('uname',$uname,time()+(60*10));
      setcookie('password',$password,time()+(60*10));
      header('Location: ../view/AdminLogin.php');
    }
    }
?>
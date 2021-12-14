<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
     if(empty($_POST["date"]))  
      {  
           $error = "<label class='text-danger'>Please Put a date</label>";  
      }
      else if(empty($_POST["time"]))  
      {  
           $error = "<label class='text-danger'>Time must be Selected</label>";  
      }

      else if(empty($_POST["notify"]))  
      {  
           $error = "<label class='text-danger'>Message Cannot be empty</label>";  
      }
       
      else  
      {  
           if(file_exists('Notification_dataJson.json'))  
           {  
                $current_data = file_get_contents('Notification_dataJson.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'notify'          =>     $_POST['notify'],
                      'date'               =>     $_POST['date'], 
                       'time'               =>     $_POST['time']
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('Notification_dataJson.json', $final_data))  
                {  
                     $message = "<label class='text-success'>Notification Posted Successfully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File does not exist';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Notification</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
             <style>

 body {
     background-color: lightgray;
font-family: Agency FB;
}

</style>

<script type="text/javascript">
     


     function checkDate() {
            if (document.getElementById("date").value == "") {
                document.getElementById("dateErr").innerHTML = "Date can't be blank";
                document.getElementById("date").style.borderColor = "red";
            }else{
                document.getElementById("dateErr").innerHTML = "";
                document.getElementById("date").style.borderColor = "green";

            }
            
        }
      function checkTime() {
            if (document.getElementById("time").value == "") {
                document.getElementById("timeErr").innerHTML = "Choose Time";
                document.getElementById("time").style.borderColor = "red";
            }else{
                document.getElementById("timeErr").innerHTML = "";
                document.getElementById("time").style.borderColor = "green";

            }
            
        }
        



function validNotification()
{
 


var date=noti.date;

var time=noti.time;
var notify=noti.notify;


if(date.value=="")
{
  window.alert("Need Date for giving Notification");
  date.focus();
  return false;

}

if(time.value=="")
{
  window.alert("Need Time for giving Notification");
  time.focus();
  return false;
  
}

if(notify.value=="")
{
  window.alert("Need Message for giving Notification");
  notify.focus();
  return false;
  
}
return true;

}



</script>
      </head>  
      <body>  

             <form  class="Notification" method="POST" name="noti"> 
           <?php include('header_admin.php'); ?>
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Message to Users</h3><br />
<?php
echo "Today is " . date("m/d/Y") . "<br>";


?>

<?php
date_default_timezone_set("Asia/Dhaka");
echo "The time is " . date("h:i:sa");
?>

                <div style="text-align: right;">
    <a href="deletenotifications.php" class="button large hpbottom">Previous Posted Notifications</a>
</div>               
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />

                     <label>Date:</label>
                     <input type="date" name="date" id="date" onblur="checkDate()" onkeyup="checkDate()"/>
                                   <p id="dateErr"></p>
                                    <span style="color: red;"></span> 
                     <label>Time:</label>
                     <input type="Time" name="time" id="time" onblur="checkTime()" onkeyup="checkTime()"/>
                                   <p id="timeErr"></p>
                                    <span style="color: red;"></span> 

                     <textarea id="notify" name="notify" rows="12" cols="120">
                     </textarea>
                      
                     
                     <input type="submit" name="submit" value="Notify" class="btn btn-info" onclick=" return validNotification();"  /><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  


                </form>  
           </div>  
           <br />  
      </body>  
 </html>  
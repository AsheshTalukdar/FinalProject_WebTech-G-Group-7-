<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  


           <style>
                
                body {
  
                background-color: lightgray;
          font-family: Agency FB;
                    }
           </style>
      </head>  
      <body>  
            <?php include('header_user.php'); ?>
        <div class="container" style="width:500px;">              
                <div class="table-responsive"> 
                     <table class="table table-bordered"> 
                     <thead class="thead-dark">
                          <tr>  
                               <th>Date</th> 
                               <th>Time</th>  
                               <th>Notification</th>    
                          </tr> 
                          </thead>  
                          <?php   
                          $data = file_get_contents("Notification_dataJson.json");  
                          $data = json_decode($data, true); 

                         if (empty($data)) {
                               echo "No Notifications!";
                          } 
                          else{
                          foreach($data as $row)  
                          {  
                                   
                               echo '<tr>
                               <td>'.$row["date"].'</td>
                               <td>'.$row["time"].'</td>
                               <td>'.$row["notify"].'</td>
                               </tr>'; 
                          }  }
                          ?>  
                     </table>  
                   </div>
                 </div>
      </body>  
 </html>  
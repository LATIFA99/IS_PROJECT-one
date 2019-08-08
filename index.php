<?php
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="login.css"/>
    <title>WELCOME PAGE</title>
</head>
    <body>
       <style >
        .wrapper {
            background-image: url(rr.jpg);
            min-height: 100vh;
  min-width: 100vw;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    align-items: center;
    justify-content: center;

            
        }
        .button {
        width: 200px;
        background-color: #5758BB;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
     }

h1 {
  font-family: sans-serif;
  font-size: 100px;
  color: blue;
  font-weight: 200px;
}
       
       </style>

       <div class="wrapper">
    	<center><h1>BUS PARCEL RESERVATION SYSTEM</h1></center>
    	
      <center><input type="button" class="button" value="Log In" onclick="window.location.href='login.php'" /></center>
      &nbsp;
      <!-- <center><input type="button" class="button" value="ADMIN" onclick="window.location.href='adminlogin.php'" /></center>-->
    		 
          

</div>
    </body>
   </html>
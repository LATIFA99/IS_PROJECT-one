<?php
$msg = NULL;

//initialize the session
session_start();
//if session variable is not set it will reirect it to the login page
if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){
    header("location: login.php");
    exit;
  require_once ('config.php');
}
?>
<?php
//include header page
require_once('header.php');
//include insert code
require_once ('parcel_submit.php');
?>

<!--form page-->
<!--body part one senders information on parcel-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="parcel.css">
<style type="text/css">

.body {
    background-color: lightblue;
}
.h3{
    font-family: Times New Roman;
     font-size: 40px;
     color: grey;


}

</style>
</head>
<body>
    <h3>Parcel Details</h3>


<table style="width:100%">
  <tr>
    <th>Parcel approximate weight</th>
    <th colspan="2">Price</th>
  </tr>
  <tr>
    <td></td>
    <td>In KSHS</td>
    <td>In Dollars</td>
  </tr>
    <tr>
    <td>1-7kgs</td>
    <td>2,500</td>
    <td>2.50</td>
  </tr>
   <tr>
    <td>8-10kgs</td>
    <td>3,000</td>
    <td>3.00</td>
  </tr>
   <tr>
    <td>11-15kgs</td>
    <td>3,500</td>
    <td>3.50</td>
  </tr>
   <tr>
    <td>16-19kgs</td>
    <td>4,000</td>
    <td>4.00</td>
  </tr>
   <tr>
    <td>20-25kgs</td>
    <td>5,000</td>
    <td>5.00</td>
  </tr>
</table>

<form action="parcel_submit.php" method="post" class="body">
     <p>
        <h1>SENDER'S INFORMATION</h1>
    </p>
    <p>
       <h3> <label for="description">DESCRIPTION:</label></h3>
        <input type="text" name="description" id="description">
    </p>
    <p>
        <h3><label for="approximate_weight">APPROXIMATE_WEIGHT:</label></h3>
        <input type="text" name="approximate_weight" id="approximate_weight">
    </p>
    <p>
        <h3><label for="dropoff_location">DROPOFF_LOCATION:</label></h3>
        <select name="dropoff_location">
       <option value="Bondo,Total Bondo Service">Bondo,Total Bondo Service</option>
        <option value="Bungoma,Shariffs Center">Bungoma,Shariffs Center</option>
        <option value="Equity bank,Mbale">Equity bank,Mbale</option>
         <option value="Kamas, Kobil Petrol Station">Kamas, Kobil Petrol Station</option>
         <option value="Migori , Post Bank Migori">Migori , Post Bank Migori</option>
         <option value="Mumias , Mumias Sugar Complex Primary School">Mumias , Mumias Sugar Complex Primary School</option>
         <option value="Nairobi,Railway Headquaters">Nairobi,Railway Headquaters</option>
         <option value="Siaya, Mwalimu Guest House">Siaya, Mwalimu Guest House</option>
         <option value="Uganda,Point 10">Uganda,Point 10</option>
         </select>
    </p>
     <p>
       <h3> <label for="dropoff_time">DROPOFF_TIME:</label> </h3>
        <select name="dropoff_time">
       <option value="8:30am">8:30am</option>
        <option value="12:30pm">12:30pm</option>
        <option value="4:30pm">4:30pm</option>
         <option value="8:30pm">8:30pm</option>
         </select>
    </p>
     <p>
       <h3> <label for="email_of_sender">EMAIL_OF_SENDER:</label> </h3>
        <input type="text" name="email_of_sender" id="email_of_sender">
    </p>
     <p>
       <h3> <label for="mobile_of_sender">MOBILE_OF_SENDER:</label> </h3>
        <input type="text" name="mobile_of_sender" id="mobile_of_sender">
    </p>
     <p>
       <h1>RECEIVER'S INFORMATION</h1>
    </p>
     <p>
        <h3><label for="name_of_receiver">NAME_OF_RECEIVER:</label></h3>
        <input type="text" name="name_of_receiver" id="name_of_receiver">
    </p>
     <p>
        <h3><label for="email_of_receiver">EMAIL_OF_RECEIVER:</label></h3>
        <input type="text" name="email_of_receiver" id="email_of_receiver">
    </p>
      <p>
        <h3><label for="mobile_of_receiver">MOBILE_OF_RECEIVER:</label></h3>
        <input type="text" name="mobile_of_receiver" id="mobile_of_receiver">
    </p>
     <p>
        <h3><label for="pickup">PICKUP:</label></h3>
        <select name="pickup">
              <option value="Bondo,Total Bondo Service">Bondo,Total Bondo Service</option>
        <option value="Bungoma,Shariffs Center">Bungoma,Shariffs Center</option>
        <option value="Equity bank,Mbale">Equity bank,Mbale</option>
         <option value="Kamas, Kobil Petrol Station">Kamas, Kobil Petrol Station</option>
         <option value="Migori , Post Bank Migori">Migori , Post Bank Migori</option>
         <option value="Mumias , Mumias Sugar Complex Primary School">Mumias , Mumias Sugar Complex Primary School</option>
         <option value="Nairobi,Railway Headquaters">Nairobi,Railway Headquaters</option>
         <option value="Siaya, Mwalimu Guest House">Siaya, Mwalimu Guest House</option>
         <option value="Uganda,Point 10">Uganda,Point 10</option>
       
         </select>
    </p>
   
    <input type="submit" value="Submit"/>
    
</form>
<!--code for payment through paypal-->

</body>
</html>

<!--footer-->
<?php

require_once ('footer.php');
?>



<?php
 //connection to the parcel
 require_once ('parcel.php');
 /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "tifa");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}


    // Prepare an insert statement
    $sql= "INSERT INTO parcel (description, approximate_weight, dropoff_location, dropoff_time, email_of_sender, mobile_of_sender, name_of_receiver, email_of_receiver, mobile_of_receiver, pickup ) 
    VALUES (?, ?, ?, ?, ?, ?,  ?,?, ?, ?)";

if($stmt = $mysqli->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssssssssss", $description, $approximate_weight, $dropoff_location, $dropoff_time, $email_of_sender,$mobile_of_sender,$name_of_receiver,$email_of_receiver,$mobile_of_receiver,$pickup);
    
     

    /* Set the parameters values and execute
    the statement again to insert another row */
    $description = $_POST['description'];
    $approximate_weight = $_POST['approximate_weight'];
    $dropoff_location = $_POST['dropoff_location'];
    $dropoff_time = $_POST['dropoff_time'];
    $email_of_sender = $_POST['email_of_sender'];
    $mobile_of_sender = $_POST['mobile_of_sender'];
    $name_of_receiver = $_POST['name_of_receiver'];
    $email_of_receiver = $_POST['email_of_receiver'];
    $mobile_of_receiver = $_POST['mobile_of_receiver'];
    $pickup = $_POST['pickup'];
    $stmt->execute();
    
  echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
}
 
    // echo "Sent Successfully! Thank you"." ".$fname.",We will contact you shortly!";

    

 //end of main if
// Close statement
mysqli_stmt_close($stmt);
 
// Close connection
mysqli_close($link);
 
 ?>

    
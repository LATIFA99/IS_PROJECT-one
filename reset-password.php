<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 //include header

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    
    <style type="text/css">
       .txtfname{
        width: 300px;
        padding: 8px 8px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing : border-box;
       }
     .txtname{
        width: 200px;
        background-color: #30336b;
        color: white;
        padding: 10px 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
     }
     .wrapper{
        background-image: url(c.jpg);
        min-height: 100vh;
        min-width: 100vh;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        align-items: center;
        justify-content: center;
     }
     
        h5{
     font-family: Times New Roman;
     font-size: 20px;
     color: #686de0;

  }
  .ss{
    float: right;
  }

    </style>
    <link rel="stylesheet" type="text/css" href="nav_bar.css">
    <!--includes the navigation bar of all pages-->
    <div class="navbar">
        <a href="home.php">HOME</a>
        <a href="parcel.php">PARCEL</a>
        <a href="contact us.php">CONTACT US</a>
        <a href="about us.php">ABOUT US</a>
        <a href="logout.php">LOGOUT</a>

    </div>
    &nbsp;
    <br/>
</head>
<body>
    <div class="wrapper">
        <h5>Reset Password</h5>
        <h5><p>PLEASE FILL OUT THIS FORM TO RESET YOUR PASSWORD.</p></h5>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
               <h5> <label>NEWPASSWORD</label></h5>
                <input type="password" name="new_password" class="txtfname" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <h5><label>CONFIRM PASSWORD</label></h5>
                <input type="password" name="confirm_password" class="txtfname">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="txtname" value="Submit">
                &nbsp; &nbsp; &nbsp; &nbsp;
                <a class="txtname" href="login.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>
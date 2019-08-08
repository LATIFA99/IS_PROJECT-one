<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location home.php");
    exit;
}
 
// Include config file
require_once "config.php";

 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
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
    <title>Login</title>
    
    <link rel="stylesheet" type="text/css" href="nav_bar.css">
    <!--includes the navigation bar of all pages-->
    <br/>


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
        background-color: #d35400;
        color: white;
        padding: 10px 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
     }
     .wrapper{
        background-image: url(B.jpg);
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
     color: #d35400;

  }
  .ss{
    float: right;
  }


    </style>
    <div class="ss">
         <h5><p>DON'T HAVE AN ACCOUNT? <a href="signup.php">SIGN UP NOW</a>.</p></h5>
  
    </div>
   
</head>
<body>
    <div class="wrapper">
        <h5>LOGIN</h5>
        <h5><p>PLEASE FILL IN YOUR CREDENTIALS TO LOG IN.</p></h5>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <h5><label> USERNAME</label></h5>
                <input type="text" name="username" class="txtfname" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <h5><label>PASSWORD</label></h5>
                <input type="password" name="password" class="txtfname">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <br>
            <br>
            <div class="form-group">
                <input type="submit" class="txtname" value="Login">
            </div>

           </div>
                 
            

        </form>
    </div>    
</body>
</html>


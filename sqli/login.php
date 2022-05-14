<?php
// Initialize the session
session_start();
// Include config file
require_once('config.php');

if(isset($_POST) & !empty($_POST)){

    $username=$_POST['username']; # User-specified username.
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result=mysql_query($link, $sql);

    $count=mysql_num_rows($result);

    if ($count==1){

        $_SESSION['username'] = $username; # Creates a session with the specified $username.
        //$_SESSION['password'] = $password; # Creates a session with the specified $password.
        header("location:index.php"); # Redirect to homepage.
    }   
    else { # If there's no singular result of a user/pass combination:
        $fmsg = "Invalid username/password";

    }
}
if(isset($_SESSION['username'])){
    $smsg = "User already logged in";
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php if(isset ($smsg)){ ?><div role="alert"> <?php echo $smsg; ?> </div><?php } ?>
        <?php if(isset ($fmsg)){ ?><div role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
                
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
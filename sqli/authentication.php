<?php      
    include('connection.php');  
    session_start();
    $username = $_POST['user'];  
    $password = $_POST['pass'];  

	$sql = "select * from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count != 1){  
            header("location: index.html");  
  
        }  
        else{  
            $_SESSION["user"] = $username;
            $_SESSION["pass"] = $password;
            header("location: dashboard.php");
        }     
?>  

<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  

	$sql = "select * from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("location: dashboard.php");
		
        }  
        else{  
            echo "<h1 style="text-align: center"> Failed attempt</h1>";  
        }     
?>  

<?php      
    include('connection.php');  
    session_start();
    $text = $_POST['textbox'];  

	$sql = "INSERT INTO tickets (text) VALUES ($text);";  
    mysqli_query($con, $sql);  
    header("location: dashboard.php");
    
?>  

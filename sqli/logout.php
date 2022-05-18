<?php
    $_SESSION["user"] = null;
    $_SESSION["pass"] = null;
    
    session_unset();
    session_destroy();

    header("location: index.html"); 
?>
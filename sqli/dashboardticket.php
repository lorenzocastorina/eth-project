<?php
  include('connection.php');  
  session_start();
  if ($_SESSION["user"] == null && $_SESSION["pass"] == null) {
    header("location: index.html");
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <meta name="robots" content="noindex" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5" />
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <!-- (A) SIDEBAR -->
    <div id="pgside">
      <!-- (A1) BRANDING OR USER -->
      <!-- LINK TO DASHBOARD OR LOGOUT -->
      <div id="pguser">
        <i class="txt"> <?php echo $_SESSION["user"] ?> </i>
      </div>

      <!-- (A2) MENU ITEMS -->
      <a href="dashboard.php" class="current">
        <i class="ico">&#9745;</i>
        <i class="txt">Report</i>
      </a>
      <a href="logout.php" class="current" >
        <i class="ico"></i>
        <i class="txt">Logout</i>
      </a>
    </div>

    <!-- (B) MAIN -->
    <main id="pgmain">
      <h1><i class="ico" style="font-style: normal; font-size: 30px;"></i> Ticket  <?php echo $_GET['id'] ?> </h1> 
      <ul>
        <?php 
          $host = "localhost";  
          $user = "root";  
          $password = '';  
          $db_name = "test";  
      
          $con = mysqli_connect($host, $user, $password, $db_name);
          $sql = "SELECT * FROM tickets WHERE id='$_GET['id']';";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_array($result)) {
            echo "<h3>" . $row["text"] . "</h3>";
          }
        ?>
      </ul>
    </main>

  </body>
</html>

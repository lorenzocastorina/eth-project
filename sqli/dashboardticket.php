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
      <h1><i class="ico" style="font-style: normal; font-size: 30px;"></i> Ticket   </h1> <?php echo $_GET['id'] ?>
      <ul>
        <?php 
          $sql = "select * FROM tickets;";

          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo $row['text']; 
          }
        ?>
      </ul>
    </main>

  </body>
</html>

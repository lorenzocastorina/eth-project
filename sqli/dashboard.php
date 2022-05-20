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
      <a href="#" class="current">
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
      <h1><i class="ico" style="color: green; font-style: normal; font-size: 50px;">&#9900;</i> Last access to the machine: </h1>
      <ul>
        <li><p>lang - 12:03 5/04/2022 UTC rome</p></li>
        <li><p>fsociety - 00:25 4/05/2022 UTC rome</p></li>
        <li><p>luigi - online</p></li>
      </ul>
      <h1><i class="ico" style="font-style: normal; font-size: 30px;">&#43;</i> Make a request ticket: </h1>
      <form name="f2" action="add.php" method = "POST" onsubmit = "return validation2()">
        <ul>
        <label> Type your question here: </label> 
        <p><input type="text" name="textbox" id="textbox"></p>
        <p><input type="submit" value="Insert" id="btn2"></p>
      </ul>
      </form>
      <h1><i class="ico" style="font-style: normal; font-size: 30px;"></i> Old tickets: </h1>
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

    <script>  
      function validation2()  
      {  
          var text=document.f2.textbox.value;  
              if(text.length=="") {  
                  alert("Text box is empty");  
                  return false;  
              }   

      }                             
        
  </script>  
  </body>
</html>

<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sessions</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 { color: purple; }
        h3 { color: turquoise; }
        .containing-div {
            border: 1px solid #7c73f6;
            border-radius: 15px;
            margin-top: 100px;
        }
    </style>
      
  </head>
  <body>
      <?php
      include "23.header.php";
      ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 containing-div">
                <h1>Sessions</h1>
                <?php
                // start a session
                session_start();
                // store data in session  
                $_SESSION["firstname"] = "Mark";
                $_SESSION["lastname"] = "Zuckerberg";
                $firstname = $_SESSION["firstname"];
                $lastname = $_SESSION["lastname"];
                echo "<p>Hi $firstname $lastname!</p>";
                // remove session data
                if(isset($_SESSION["firstname"])){
                    unset($_SESSION["firstname"]);
                }
                echo $_SESSION["firstname"] ? 1 : 0;
                // destroy session
                session_destroy();
                ?>
            </div>
        </div>
      </div>
      <?php
      include "23.footer.php";
      ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
ob_flush();
?>
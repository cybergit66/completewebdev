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
    <title>Data Types: String functions</title>

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
                <h1>Error Handling</h1>
                <h3>Example 1</h3>
                <?php
                function errorHandler1($errno, $errstr, $errfile, $errline, $errcontext){
                    echo "<p><strong>Error</strong>: [$errno] $errstr. </p>";
                }
                // Set error handler
                set_error_handler("errorHandler1");
                echo filesize("nonexistentfile.txt");
                ?>
                <h3>Example 2</h3>
                <?php
                function calculateFileSize($file){
                    if(!file_exists($file)){
                        trigger_error($file . " does not exist and thus size cannot be retrieved!", E_USER_WARNING);
                        return false;
                    }else{
                        return filesize($file);
                    }
                }
                function errorHandler2($errno, $errstr, $errfile, $errline, $errcontext){
                    $log = "Error[$errno] on " . date("m/d/Y H:i:s") . "\r\n";
                    $log .= "Details: $errstr. \r\n";
                    $log .= "Location: In $errfile on line $errline. \r\n";
                    $log .= "Variables: " . print_r($errcontext, true) . "\r\n";
                    error_log($log, 3, "logs/error.log");
                    error_log($log, 3, "terence.highsmith@gmail.com");
                    die("<p>An error occured, please try again</p>");
                }
                set_error_handler("errorHandler2");
                echo calculateFileSize("nonexistentfile.txt");
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
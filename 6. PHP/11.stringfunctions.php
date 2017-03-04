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
    </style>
      
  </head>
  <body>
    <div class="container-fluid">
        <h1>String Functions</h1>
        <div>
            <?php
                $message = "welcome to my website. have a good time here!";
                echo "Length of message: " . strlen($message);
                echo "<br />";
                echo "my message contains " . str_word_count($message) . " words";
                echo "<br />";
                echo str_replace("website","world", $message,$num_repl);
                echo "<br />";
                echo "number of words replaced = " . $num_repl;
                echo "<br />";
                echo "reversing my message yields <br />";
                echo strrev($message);
            ?>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
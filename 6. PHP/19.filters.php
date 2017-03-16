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
        h3 { color: green; }
    </style>
      
  </head>
  <body>
    <div class="container-fluid">
        <h1>Filters:</h1>
        <h3>Clean user inputs</h3>
        <div>
            <?php
                //username example
                $myUsername = '<script>window.alert("Hi")</script>';
                $myUsername = filter_var($myUsername, FILTER_SANITIZE_STRING);
                echo $myUsername;
            
                //email example
                $myEmail = 'sam@      completedev//// enlkjs.com';
                $myEmail = filter_var($myEmail, FILTER_SANITIZE_EMAIL);
                echo "<br/>" . $myEmail;
            
                //URL example
                $myUrl = "http://www.    google.com";
                $myUrl = filter_var($myUrl, FILTER_SANITIZE_URL);
                echo "<br/>" . $myUrl;
            ?>
        </div>
        <h3>Validate user inputs</h3>
        <div>
            <?php
                //Email validation
                $myEmail = 'sam      completedev//// enlkjs.com';
                $myEmail = filter_var($myEmail, FILTER_SANITIZE_EMAIL);
                echo "<p>Cleaned email: $myEmail</p>";
                echo "<p>Email validation: " . filter_var($myEmail, FILTER_VALIDATE_EMAIL) . "</p>";
                if(filter_var($myEmail, FILTER_VALIDATE_EMAIL)){
                    echo "<p>Valid Email</p>";
                } else {
                    echo "<p style='color:red;'>Invalid Email</p>";
                }
            
                // URL validation
                $myUrl = "http://www.    google.com";
                $myUrl = filter_var($myUrl, FILTER_SANITIZE_URL);
                echo "<p>Cleaned URL: $myUrl</p>";
                echo "<p>URL validation: " . filter_var($myUrl, FILTER_VALIDATE_URL) . "</p>";
            ?>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
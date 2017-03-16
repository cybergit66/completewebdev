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
        <h1>Send Email</h1>
        <div>
            <?php
                $to = "terence.highsmith@gmail.com";
                $subject = "I am learning PHP";
                $message = "<html><body><h1 style='color:green'>I am learning PHP</h1><h3 style='color:orange'>So what are you waiting for?</h3><p>Join us and spread the word</p></body></html>";
                $headers = "Content-type: text/html";
                echo mail($to, $subject, $message, $headers);
            ?>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
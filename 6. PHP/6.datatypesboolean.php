<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Data Types: booleans</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 { color: purple; }
    </style>
      
  </head>
  <body >
    <div class="container-fluid">
        <h1>Booleans</h1>
        <div>
            <?php
                $booleanVariable1 = (5 < 6);
                $booleanVariable2 = (3 > 5);
                $booleanVariable3 = $booleanVariable1 && $booleanVariable2;
                var_dump($booleanVariable1);
                echo "<br />";
                var_dump($booleanVariable2);
                echo "<br />";
                var_dump($booleanVariable3);
                echo "<br />";
                var_dump(!$booleanVariable3);
            ?>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
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
        <h1>While Loop</h1>
        <div>
            <?php
               $i = 1;
                while($i < 10){
                    echo $i . "</br>";
                    $i++;
                }
            
                $carmakes = array("benz","audi","lexus");
                $j = 0;
                while($j < 3){
                    echo $carmakes[$j] . "</br>";
                    $j++;
                }
            ?>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
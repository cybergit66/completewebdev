<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Data Types: integers and floats</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 { color: purple; }
    </style>
      
  </head>
  <body >
    <div class="container-fluid">
        <h1>Integers and Floats</h1>
        <div>
            <?php
                $x = 7;
                var_dump($x);
                $y = 3;
                $z = $x + $y;
                echo "<br />";
                echo $z;
                $z = 0x1A;
                echo "<br />";
                echo var_dump($z);
                $w = 0123;
                echo "<br />";
                var_dump($w);
            
                $floatingnumber = 3.7;
                echo "<br />";
                var_dump($floatingnumber);
            ?>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
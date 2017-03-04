<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Data Types: arrays</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 { color: purple; }
    </style>
      
  </head>
  <body >
    <div class="container-fluid">
        <h1>Arrays</h1>
        <div>
            <?php
            // Index Arrays
                $carmakes = array("Audi", "BMW", "Mercedes");
                echo "<p> Car Makes: </p>";
                print_r($carmakes);
                echo "<p> Car Makes: element one</p>";
                echo $carmakes[0];
            // Associative Arrays
                $shoppingBasket = array("a"=>"bread","b"=>"milk","c"=>"eggs");
                echo "<p>Shopping basket:</p>";
                print_r($shoppingBasket);
                echo "<br />";
                var_dump($shoppingBasket);
                $shoppingBasket2 = array("b"=>"milk","a"=>"bread","c"=>"eggs");
                echo "<p>shoppingBasket == shoppingBasket2</p>";
                var_dump($shoppingBasket == $shoppingBasket2);
                echo "<p>shoppingBasket === shoppingBasket2</p>";
                var_dump($shoppingBasket === $shoppingBasket2);
                $shoppingBasket3 = array("d"=>"yogurt","e"=>"orange","f"=>"apple");
                echo "<p>Basket 3</p>";
                print_r($shoppingBasket3);
                echo "<p>shoppingBasket <> shoppingBasket3</p>";
                var_dump($shoppingBasket <> $shoppingBasket3);
                $shoppingBasket4 = $shoppingBasket + $shoppingBasket3;
                echo "<p>shopingBasket + shoppingBasket3</p>";
               print_r($shoppingBasket + $shoppingBasket3);
            ?>
            
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
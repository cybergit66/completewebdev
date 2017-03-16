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
        <h1>Array Functions</h1>
        <div>
            <?php
                $shoppingBasket1 = array("bread","eggs","milk");
                $shoppingBasket2 = array("apple","banana","orange");
                $shoppingBasket = array_merge($shoppingBasket1,$shoppingBasket2);
                echo "<p>Shopping Basket:</p>";
                print_r($shoppingBasket);
                echo "<p>Number of items in shopping basket</p>" . count($shoppingBasket);
            
                $count = array_count_values($shoppingBasket);
                echo "<p>Basket Count</p>";
                print_r($count);
            
                echo "<p>Number of bread items in Basket: </p>" . $count["bread"];
            
                if(in_array("bread", $shoppingBasket)){
                    echo "<p>There is bread in the basket</p>";
                } else {
                    echo "<p>there is no bread in the basket</p>";
                }
            
                array_push($shoppingBasket, "yogurt");
                echo "<p>shopping basket after adding yogurt: </p>";
                print_r($shoppingBasket);
            
                if($_GET["submit"]){
                    if($_GET["item"]){
                        array_push($shoppingBasket, $_GET["item"]);
                    }
                }
                echo "</br>";
                print_r($shoppingBasket);
            
                array_splice($shoppingBasket, 0, 2, array("mango","kiwi"));
                echo "<p>Shopping Basket:</p>";
                print_r($shoppingBasket);
            
                sort($shoppingBasket);
                echo "<p>Basket sorted in ascending order</p>";
                print_r($shoppingBasket);
            
                rsort($shoppingBasket);
                echo "<p>Basket sorted in descending order</p>";
                print_r($shoppingBasket);
            
                $carMakes = array("bmw"=>"x5","audi"=>"a6","mercedes"=>"cls");
                echo "<p>Car makes</p>";
                print_r($carMakes);
                echo "<p>Car makes in ascending order by value</p>";
                asort($carMakes);
                print_r($carMakes);
                echo "<p>Car makes in ascending order by key</p>";
                ksort($carMakes);
                print_r($carMakes);
            
                echo "<br/><br/>";
            ?>
            <form method="get">
                <label for="item">Add item to basket:</label>
                <input type="text" name="item" id="item">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
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
        <h1>For Loop:</h1>
        <div>
            <?php
                for($i = 1; $i<=10; $i++){
                    echo $i . "<br />";
                }
            
                $carmakes = array("benz","lexus","audi");
                foreach($carmakes as $value){
                    echo $value . "</br>";
                }
            
                $shopping = array("a"=>"yougurt","b"=>"apple","c"=>"milk");
                foreach($shopping as $key=>$value){
                    echo $key . " : " . $value . "</br>";
                }
            ?>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
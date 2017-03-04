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
        <h1>If else and switch:</h1>
        <div>
            <?php
                $believeinyourdream = true;
                if($believeinyourdream) {echo "<p>you will succeed</p>";} 
                else {echo "<p>believe in your dream.</p>";}
            
                $x = ($believeinyourdream) ? "A" : "B";
                echo $x;
            
                $temp = 25;
                if($temp<15){echo "<p>It's cold</p>";} 
                elseif($temp>30){echo "<p>It's hot</p>";} 
                else{echo "<p>temp is medium</p>";}
            
                $strength = "belief";
                switch($strength){
                    case "belief": echo "<p>you have core value</p>"; break;
                    case "hello": echo "<p>good to meet you</p>"; break;
                    case "no": echo "<p>you gotta believe</p>"; break;
                    case "yes": echo "<p>good for you</p>"; break;
                    default: echo "<p>get a life</p>"; break;
                }
            ?>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
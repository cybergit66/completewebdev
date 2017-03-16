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
        <h1>Get and Post</h1>
        <div>
            <?php
                echo "<h3>GET:</h3>";
                print_r($_GET);
                if($_GET["submit"]){
                    if($_GET["username"]){
                        echo "<p>the get form has been submitted with the name" . $_GET["username"] . "</p>";
                    }
                }
            
                echo "<h3>POST:</h3>";
                print_r($_POST);
                if($_POST["submit"]){
                    if($_POST["country"]){
                        echo "<p>the post form has been submitted with the country " . $_POST["country"] . "</p>";
                    }
                }
            ?>
            <form method="get" action="16.GetandPost.php">
                <label for="username">username: </label>
                <input type="text" name="username" id="username">
                <input type="submit" name="submit" value="Submit">
            </form>
            <form method="post" action="16.GetandPost.php">
                <label for="country">country: </label>
                <input type="text" name="country" id="country">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
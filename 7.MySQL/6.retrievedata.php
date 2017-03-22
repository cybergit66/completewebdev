<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Retrieve Data</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 { color: purple; }
        h3 { color: turquoise; }
        .containing-div {
            border: 1px solid #7c73f6;
            border-radius: 15px;
            margin-top: 100px;
        }
    </style>
      
  </head>
  <body>
      <?php
      include "23.header.php";
      ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 containing-div">
                <h1>Retrieve Data</h1>
                <?php
                //mysqli_connect(host, username, password, dbname)
                $link = mysqli_connect("localhost", "terencet_user", "+HB.7ZNCyXxF", "terencet_users");
                if (!$link) {
                    echo "Error: Unable to connect to MySQL." . PHP_EOL;
                    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                    exit;
                }
                echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
                echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
                
                $sql = "SELECT * FROM users2";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result)>0){
                        echo "<table class='table table-striped table-hover table-condensed table-border'><tr><th>ID</th><th>First name</th><th>Last name</th><th>Email</th><th>Password</th></tr>";
                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
//                            $count++;
//                            echo "<p>Row number: $count</p>";
//                            print_r($row);
                            echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["password"] . "</td></tr>";
                        }
                        echo "</table>";
                        // close the result set
                        mysqli_free_result($result);
                    }else{
                        echo "<p>No results returned.</p>";
                    }
                }else{
                    echo "<p>Unable to execute query: $sql " . mysqli_error($link) . "</p>";
                }
                mysqli_close($link);
                ?>
            </div>
        </div>
      </div>
      <?php
      include "23.footer.php";
      ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
ob_flush();
?>
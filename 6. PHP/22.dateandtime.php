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
        h3 { color: turquoise; }
        .contact-form {
            border: 1px solid #7c73f6;
            border-radius: 15px;
            margin-top: 50px;
        }
    </style>
      
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 contact-form">
                <h1>Date and Time</h1>
                <div>
                    <h3>Date using the date() function</h3>
                    <?php
                    // Reference documentation at http://php.net/manual/en/function.date.php
                    $today = date("d M Y");
                    echo "<p>Today is: $today.</p>";
                    ?>
                    <h3>Time using the date() function</h3>
                    <?php
                    $today = date("H:i:s a");
                    echo "<p>Time is: $today</p>";
                    ?>
                    <h3>Current timestamp using time() function</h3>
                    <?php
                    $timestamp = time();
                    echo "<p>Timestamp is: $timestamp</p>";
                    ?>
                    <h3>Convert timestamp to time:</h3>
                    <?php
                    $time = date("F d, Y H:i:s A", $timestamp);
                    echo "<p>The current time is: $time</p>";
                    ?>
                    <h3>Convert time to timestamp using mktime() function</h3>
                    <?php
                    //mktime(hour, minute, second, month, day, year)
                    $timestamp = mktime(15, 20, 12, 3, 10, 2017);
                    echo "<p>The timestamp is: $timestamp</p>";
                    $time = date("F d, Y H:i:s A", $timestamp);
                    echo "<p>The converted timestamp is: $time</p>";
                    ?>
                    <h3>Find out what day of the week you were born</h3>
                    <?php
                    $timestamp = mktime(0, 0, 0, 3, 9, 1966);
                    echo "<p>Your birth timestamp is: $timestamp</p>";
                    $day_of_week = date("l", $timestamp);
                    echo "<p>You were born on a $day_of_week</p>";
                    ?>
                    <h3>Date in 1000 days from now</h3>
                    <?php
                    $timestamp = mktime(0,0,0, date("m"), date("d")+1000, date("Y"));
                    $time = date("D M d, Y", $timestamp);
                    echo "<p>Date in 1000 will be $time</p>";
                    ?>
                </div>
            </div>
        </div>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
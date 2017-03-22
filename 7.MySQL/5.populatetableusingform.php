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
    <title>Populate Table Using Forms</title>

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
                <h1>Populate Table Using Forms</h1>
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
                // get form data
                $id = $_POST["ID"];
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                // error messages
                $missingFirstname = "<p><strong>Please enter first name</strong></p>";
                $missingLastname = "<p><strong>Please enter last name</strong></p>";
                $missingEmail = "<p><strong>Please enter email</strong></p>";
                $invalidEmail = "<p><strong>Please enter valid email</strong></p>";
                $missingPassword = "<p><strong>Please enter password</strong></p>";
                // check for errors and sanitize form input
                if($_POST["submit"]){
                    if(!$firstname){
                        $errors .= $missingFirstname;
                    } else {
                        $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
                    }
                    if(!$lastname){
                        $errors .= $missingLastname;
                    } else {
                        $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
                    }
                    if(!$firstname){
                        $errors .= $missingEmail;
                    } else {
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors .= $invalidEmail;
                        }
                    }
                    if(!$password){
                        $errors .= $missingPassword;
                    }
                    if($errors){
                        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
                        echo $resultMessage;
                    }else{ // if no errors found
                        $tblname = "users2";
                        $firstname = mysqli_real_escape_string($link, $firstname);
                        $lastname = mysqli_real_escape_string($link, $lastname);
                        $email = mysqli_real_escape_string($link, $email);
                        $password = mysqli_real_escape_string($link, $password);
                        $password = md5($password);
                        // execute insert query
                        if(!$_POST["ID"]){
                            $sql = "INSERT INTO users2 (firstname, lastname, email, password) VALUES ('$firstname','$lastname','$email','$password')";
                        }else{
                            $sql = "INSERT INTO users2 (ID, firstname, lastname, email, password) VALUES ('$id','$firstname','$lastname','$email','$password')";
                        }
                        if(mysqli_query($link, $sql)){
                            $resultMessage = '<div class="alert alert-success">Data successfully added to table</div>';
                            echo $resultMessage;
                        }else{
                            $resultMessage = '<div class="alert alert-danger">ERROR: Unable to execute INSERT:' . $sql . '. ' . mysqli_error($link) . '</div>';
                        }
                    }
                }
                mysqli_close($link);
                ?>
                <form action="5.populatetableusingform.php" method="post">
                    <div class="form-group">
                        <label for="ID">ID:</label>
                        <input type="number_format" id="ID" placeholder="ID" class="form-control" name="firstname" maxlength="4">
                        <label for="firstname">Firstname:</label>
                        <input type="text" id="ID" placeholder="Firstname" class="form-control" name="firstname" maxlength="20">
                        <label for="lastname">Lastname:</label>
                        <input type="text" id="lastname" placeholder="Lastname" class="form-control" name="lastname" maxlength="20">
                        <label for="email">Email</label>
                        <input type="email" id="ID" placeholder="Email" class="form-control" name="email" maxlength="30">
                        <label for="password">Password:</label>
                        <input type="password" id="password" placeholder="Password" class="form-control" name="password" maxlength="40"><br/>
                        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Send data">
                    </div>
                </form>
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
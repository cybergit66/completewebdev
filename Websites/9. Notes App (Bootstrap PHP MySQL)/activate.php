<?php
//<!--the user is redirected to this file after clicking the activation link-->
//<!--signup link contains two GET parameters: email and activation key-->
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Account Activation</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 { color: purple; }
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
                <h1>Account Activation</h1>
    
<?php
 //<!--if email or activation key is missing show an error-->
if(!isset($_GET['email']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the activation code you received</div>';
    exit;
}
//<!--else-->
//    <!--store them in two variables-->
$email = $_GET['email'];
$key = $_GET['key'];
//    <!--prepare variables for the query-->
$email = mysqli_real_escape_string($link, $email);
$key = mysqli_real_escape_string($link, $key);
//    <!--run query: set activation field to "activated" for the provided email-->
$sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
$result = mysqli_query($link, $sql);
//    <!--if query is successful, show success message and invite user to login-->
if(mysqli_affected_rows($link) == 1){
        echo '<div class="alert alert-success">Your account has been created</div>';
        echo '<a href="index.php" type=button class="btn-lg btn-success">Log in</a>';
}else{
//    <!--else-->
//        <!--show error message-->
        echo '<div class="alert alert-danger">Your account could not be activated. Please try again.</div>';
        echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
}           
?>
                
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
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
    <title>Password Reset</title>

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
                <h1>Reset Password</h1>
    <div id="resultmessage"></div>
    
<?php
 // if user id and activation are missing
// print error message
if(!isset($_GET['user_id']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the link you received by email</div>';
    exit;
}
//<!--else-->
//    <!--store them in two variables-->
$user_id = $_GET['user_id'];
$key = $_GET['key'];
$time = time() - 86400;
//    <!--prepare variables for the query-->
$user_id = mysqli_real_escape_string($link, $user_id);
$key = mysqli_real_escape_string($link, $key);
// Run query: check combination of user_id and Key in the table and make sure key is less than 24h old
//
$sql = "SELECT user_id FROM forgot_password WHERE resetkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
// if not successful query, show error message
//
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
//    if combination does not exist
//      show error message
$count = mysqli_num_rows($result);

if(!$count){
    echo '<div class="alert alert-danger">Please try again.</div>';
    exit;
}
// print form for user to reset password with hidden user_id and key fields
echo "<form method='POST' id='passwordreset'>
    <input type='hidden' name='key' value='$key'>
    <input type='hidden' name='user_id' value='$user_id'>
    <div class='form-group'>
    <label for='password'>Enter new password</label>
    <input type='password' name='password' id='password' placeholder='Enter password' class='form-control'>
    </div>
    <div class='form-group'>
    <label for='password2'>Re-Enter new password</label>
    <input type='password' name='password2' id='password2' placeholder='Re-Enter password' class='form-control'>
    </div>
    <input type='submit' name='resetpassword' class='btn btn-success btn-lg' value='Reset Password'>
</form>"
?>
                
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- script for ajax call -->
    <script>
        $("#passwordreset").submit(function (event) {
                // once the form is submitted
                //prevent default php form processing
                event.preventDefault();
                //collect user inputs
                var data_to_post = $(this).serializeArray();
                //send them to forgot_password.php using AJAX
                $.ajax({
                    url: "store_reset_password.php",
                    type: "POST",
                    data: data_to_post,
                    success: function(data){
                        $('#resultmessage').html(data);
                    },
                    error: function(){
                        //AJAX call fails: show AJAX call error
                        $("#resultmessage").html("<div class='alert alert-danger'>Error with AJAX call. Check URL.</div>");
                    }
                }); // option is to use $.post({})
            });
    </script>
  </body>
</html>
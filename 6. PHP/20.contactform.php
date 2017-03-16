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
    <title>Data Types: String functions</title>

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
                <h1>Contact Us:</h1>
    <?php
    // Get user input
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
                
    // error messages
    $missingName = '<p><strong>Please enter your name</strong></p>';
    $missingEmail = '<p><strong>Please enter your email address</strong></p>';
    $invalidEmail = '<p><strong>Please enter a valid email</strong></p>';
    $missingMessage = '<p><strong>Please enter a message</strong></p>';
                
      // if the user has submitted the form
        if($_POST["submit"]){
            // check for errors
            if(!$name){
                $errors .= $missingName;
            } else {
                $name = filter_var($name, FILTER_SANITIZE_STRING);
            }
            
            if(!$email){
                $errors .= $missingEmail;
            } else {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $errors .= $invalidEmail;
                }
            }
            
            if(!$message){
                $errors .= $missingMessage;
            } else {
                $message = filter_var($message, FILTER_SANITIZE_STRING);
            }
                    // if errors found
                    if($errors){
                        // print error message
                        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
                    } else { // if errors not found
                        // send email
                        $to = "terence.highsmith@gmail.com";
                        $subject = "Contact";
                        $message = "<p>Name: $name</p>
                                    <p>$email. </p>
                                    <p>Message:</p>
                                    <p><strong>$message</strong></p>";
                        $headers = "Content-type: text/html";
                        if(mail($to, $subject, $message, $headers)){ // if successful send
                            // print success message
//                            $resultMessage = '<div class="alert alert-success">Thanks for your message. We will get back to you soon</div>';
                            header("Location: 21.thanksforyourmessage.php");
                        } else { // if unsuccessful send
                            // print warning message
                            $resultMessage = '<div class="alert alert-warning">Unable to send email. Please try again later</div>';
                        }
                    }
        // print results
        echo $resultMessage;
        } 
    ?>
                <form action="20.contactform.php" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?php echo $_POST["name"];?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $_POST["email"];?>">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" rows="5" class="form-control"><?php echo $_POST["message"];?></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success btn-large" value="Send Message">
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
ob_flush();
?>
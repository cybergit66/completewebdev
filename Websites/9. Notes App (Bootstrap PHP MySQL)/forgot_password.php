<?php
//<!--start session-->
//
session_start();
//
//<!--connect to the database-->
//
include('connection.php');
//
//<!--check user inputs-->
//    <!--define error messages-->
$errors = '';
$missingEmail = '<p><strong>Please enter email address</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email</strong></p>';
//    <!--get email-->
//
if(empty($_POST["forgotemail"])){
//    if no email found
    //    <!--store errors in errors variable-->
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["forgotemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        // if invalid email format
        //    <!--store error in errors variable-->
        $errors .= $invalidEmail;
    }
}
//    <!--if there are any errors-->
//        <!--print error message-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}
//    <!--else: No errors-->
//        <!--prepare variables for the query-->
$email = mysqli_real_escape_string($link, $email);
//
//        <!--run query: check for email in users table-->
//
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
//
//        <!--if email doesn't exist-->
//            <!--print error message-->
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}

$count = mysqli_num_rows($result);

if(!$count){
    echo '<div class="alert alert-danger">That email does not exist.</div>';
    exit;
}
//
//        <!--else-->
//            <!--get user_id-->
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user_id = $row['user_id'];
//
//            <!--create unique activation code-->
$key = bin2hex(openssl_random_pseudo_bytes(16));
//
//            <!--insert user details and activation code in the forgot_password table-->
$time = time();
$status = 'pending';

$sql = "INSERT INTO forgot_password (`user_id`,`resetkey`,`time`,`status`) VALUES ('$user_id','$key','$time','$status')";

$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting user details</div>';
    exit;
}
//
//            <!--send email with the link to reset_password.php with user id and activation code-->
//
$message = "Please click on this link to reset your account:\n\n";

$message .= "http://terence.thecompletewebhosting.com/9.%20Notes%20App%20%28Bootstrap%20PHP%20MySQL%29/reset_password.php?user_id=$user_id&key=$key";
//
//            <!--if email sent successfully-->
//
if(mail($email, 'Reset your password', $message, 'From:' . 'notes.com')){
    //                    <!--print "success" message-->
    echo "<div class='alert alert-success'>An email has been sent to $email. Please click on link to reset your password.</div>";
}
?>
<?php
//<!--Start session-->
 session_start();
//<!--Connect to the database-->
include('connection.php');
//<!--check user inputs-->
//    <!--define error messages-->
$missingUsername= '<p><strong>Please enter a username!</strong></p>';
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword = '<p><strong>Please enter a password!</strong></p>';
$invalidPassword = '<p><strong>Your password must be at least 6 characters and contain 1 capital letter and 1 number!</strong></p>';
$differentPassword = '<p><strong>Your passwords do not match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password!</strong></p>';
$errors = '';
//
//  get username
if(empty($_POST["username"])){
    $errors .= $missingUsername;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
//
// get email
if(empty($_POST["email"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
}
// get password, password2
if(empty($_POST["password"])){
    $errors .= $missingPassword;
}elseif(!(strlen($_POST["password"])>6 and preg_match('/[A-Z]/', $_POST["password"]) and preg_match('/[0-9]/', $_POST["password"]))){
    $errors .= $invalidPassword;
}else{
    $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"],FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}
//    <!--store errors in errors variable-->
//    <!--if there are any errors print error-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
}
//<!--no error-->
//    <!--prepare variables for the queries-->
$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);
//    <!--if username exists in the users table print error-->
$sql = "SELECT * FROM 'users' WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';
    exit;
}
//    <!--else-->
//        <!--if email exists in the users table print error-->
$sql = "SELECT * FROM 'users' WHERE username = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';
    exit;
}
//        <!--else-->
//            <!--create a unique activation code-->
//            <!--insert user details and activation code in the users table-->
//            <!--send the user an email with a link to activate.php with their email and activation code-->
?>
<?php
//<!--start session-->
session_start();
//<!--connect to the database-->
include("connection.php");
//
//<!--check user inputs-->
//    <!--define error messages-->
//
$missingEmail = '<p><strong>Please enter email address</strong></p>';
$missingPassword = '<p><strong>Please enter password</strong></p>';
$errors = '';
//    
// get email
//
if(empty($_POST["loginemail"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
}
//
// get password
//
if(empty($_POST["loginpassword"])){
    $errors .= $missingPassword;
}else{
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
}
//
//    <!--if there are any errors-->
//
if($errors){
    //        <!--print error message-->
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
}else{  //    <!--else: No errors-->
        //        <!--prepare variables for the query-->
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    $password = hash('sha256',$password);
    //
    //        <!--run query: check combination of email and password exists-->
    //
    $sql = "SELECT * FROM users WHERE (email='$email' AND password='$password' AND activation='activated')";

    $result = mysqli_query($link, $sql);

    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>';
        exit;
    }
    //
    //        <!--if email & password don't match print error-->
    //
    $count = mysqli_num_rows($result);

    if($count !== 1){
        echo '<div class="alert alert-danger">Invalid username/password combination</div>';
        }else{
            //            <!--log the user in: set session variables-->
            //
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            //  <!--if remember me is not checked-->
            //  <!--print "success"-->
            if(empty($_POST['rememberme'])){
                echo "success";
            }else{
                //<!--create two variables $authenticator1 and $authenticator2-->
                $authenticator1 = bin2hex(openssl_random_pseudo_bytes(10));
                $authenticator2 = openssl_random_pseudo_bytes(20);
                //
                //<!--store them in a cookie-->
                //
                function f1($a, $b){
                    $c = $a . "," . bin2hex($b);
                    return $c;
                }
                $cookieValue = f1($authenticator1, $authenticator2);
                setcookie("rememberme", $cookieValue, time() + 1296000);
                //
                //<!--prepare variables to store in remember_me table-->
                //
                function f2($a){
                    $b = hash('sha256', $a);
                    return $b;
                }
                $f2authenticator2 = f2($authenticator2);
                $user_id = $_SESSION['user_id'];
                $expiration = date('Y-m-d H:i:s', time() + 1296000);
                //
                //<!--run query to store them in remember_me table-->
                //
                $sql = "INSERT INTO remember_me (`authenticator1`,`f2authenticator2`,`user_id`,`expiration`) VALUES ('$authenticator1', '$f2authenticator2', '$user_id', '$expiration')";
                
                $result = mysqli_query($link, $sql);
                if(!$result){
                    //<!--if query unsuccessful-->
                    //<!--print error-->
                    echo '<div class="alert alert-danger">Error running the query!</div>';
                    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
                    exit; 
                }else{
                    echo "success";
                }
            }
        }
    }
?>
<?php
//<!--connect to the database-->
include("connection.php");
//<!--if the user is not logged in and rememberme cookie exists-->
//array_key_exists('user_id', $_SESSION); alternative to isset below
//f1: COOKIE = $a . "," . bin2hex($b); see index.php
//f2: hash('sha256', $a)

if(!isset($_SESSION['user_id']) && !empty($_COOKIE['rememberme'])){
    //    <!--extract $auththenticators 1&2 from the cookie-->
    list($auththenticator1, $auththenticator2) = explode(',', $_COOKIE['rememberme']);
    $auththenticator2 = hex2bin($auththenticator2);
    $f2authenticator2 = hash('sha256', $auththenticator2);
    //    <!--look for auththenticator1 in remember_me table-->
    //
    $sql = "SELECT * FROM remember_me WHERE authenticator1 = '$auththenticator1'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>';
        echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count !== 1){
        echo '<div class="alert alert-danger">Could not remember you!</div>';
        exit;
        }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //    <!--if auththenticator2 does not match-->
    //        <!--print error-->
    if(!hash_equals($row['f2authenticator2'],$f2authenticator2)){
        echo '<div class="alert alert-danger">Hash does not equal</div>';
    }else{
            //
            //        <!--generate new auththenticators-->
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
            }
    //        <!--log the user in and redirect to notes page-->
    $_SESSION['user_id'] = $row['user_id'];
    header("location:mainpage.php");
    }
    
}
?>
<?php
// check to see if user is logged in
if(isset($_SESSION['user_id']) && $_GET['logout'] == 1){
    // destroy session
    session_destroy();
    setcookie("rememberme","", time()-3600);
}
?>
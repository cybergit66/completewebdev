<!--if the user is not logged in and rememberme cookie exists-->
    <!--extract $auththenticators 1&2 from the cookie-->
    <!--look for auththenticator1 in remember_me table-->
    <!--if auththenticator2 does not match-->
        <!--print error-->
    <!--else-->
        <!--generate new auththenticators-->
        <!--store them in cookie and remember_me table-->
        <!--log the user in and redirect to notes page-->
<!--start session-->
<!--connect to the database-->

<!--check user inputs-->
    <!--define error messages-->
    <!--get email-->
    <!--store errors in errors variable-->
    <!--if there are any errors-->
        <!--print error message-->
    <!--else: No errors-->
        <!--prepare variables for the query-->
        <!--run query: check for email in users table-->
        <!--if email doesn't exist-->
            <!--print error message-->
        <!--else-->
            <!--get user_id-->
            <!--create unique activation code-->
            <!--insert user details and activation code in the forgot_password table-->
            <!--send email with the link to reset_password.php with user id and activation code-->
            <!--if email sent successfully-->
                    <!--print "success" message-->
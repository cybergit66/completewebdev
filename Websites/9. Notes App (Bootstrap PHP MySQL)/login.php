<!--start session-->
<!--connect to the database-->

<!--check user inputs-->
    <!--define error messages-->
    <!--get email and password-->
    <!--store errors in errors variable-->
    <!--if there are any errors-->
        <!--print error message-->
    <!--else: No errors-->
        <!--prepare variables for the query-->
        <!--run query: check combination of email and password exists-->
        <!--if email & password don't match print error-->
        <!--else-->
            <!--log the user in: set session variables-->
            <!--if remember me is not checked-->
                <!--print "success"-->
            <!--else-->
                <!--create two variables $authenticator1 and $authenticator2-->
                <!--store them in a cookie-->
                <!--run query to store them in remember_me table-->
                <!--if query unsuccessful-->
                    <!--print error-->
                <!--else-->
                    <!--print "success"-->
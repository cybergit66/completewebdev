//Ajax call for the signup form
$("#signupForm").submit(function (event) {
    // once the form is submitted
    //prevent default php form processing
    event.preventDefault();
    //collect user inputs
    var data_to_post = $(this).serializeArray();
    console.log(data_to_post);
    //send them to signup.php using AJAX
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: data_to_post,
        success: function(data){
            //AJAX call successful: show error or success message
            if(data){
                $("#signupMessage").html(data);
            }
        },
        error: function(){
            //AJAX call fails: show AJAX call error
            $("#signupMessage").html("<div class='alert alert-danger'>Error with AJAX call. Check URL.</div>");
        }
    }); // option is to use $.post({})
});

//Ajax Call for the login form
$("#loginForm").submit(function (event) {
    // once the form is submitted
    //prevent default php form processing
    event.preventDefault();
    //collect user inputs
    var data_to_post = $(this).serializeArray();
    console.log(data_to_post);
    //send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: data_to_post,
        success: function(data){
            //AJAX call successful: show error or success message
            if(data == "success"){
                //if php files return "success": redirect the user to notes page
                window.location = "mainpage.php"
            }else{
                //otherwise show error message
                $('#loginMessage').html(data);
            }
        },
        error: function(){
            //AJAX call fails: show AJAX call error
            $("#loginMessage").html("<div class='alert alert-danger'>Error with AJAX call. Check URL.</div>");
        }
    }); // option is to use $.post({})
});

//Ajax call for the forgot password form
$("#forgotPasswordForm").submit(function (event) {
    // once the form is submitted
    //prevent default php form processing
    event.preventDefault();
    //collect user inputs
    var data_to_post = $(this).serializeArray();
    //send them to forgot_password.php using AJAX
    $.ajax({
        url: "forgot_password.php",
        type: "POST",
        data: data_to_post,
        success: function(data){
            $('#forgotPasswordMessage').html(data);
        },
        error: function(){
            //AJAX call fails: show AJAX call error
            $("#forgotPasswordMessage").html("<div class='alert alert-danger'>Error with AJAX call. Check URL.</div>");
        }
    }); // option is to use $.post({})
});
//ONce the form is submitted
    //prevent default php processing
    //collect user inputs
    //send them to login.php using AJAX
        //AJAX CALL successful: show error or success message
        //AJAX call fails: show AJAX call error
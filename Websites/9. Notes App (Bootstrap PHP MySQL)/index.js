//Ajax call for the signup form
// once the form is submitted
$("#signupForm").submit(function (event) {
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
//Once the form is submitted
    //prevent default php processing
    //collect user inputs
    //send them to login.php using AJAX
        //AJAX CALL successful
            //if php files return "success": redirect the user to notes page
            //otherwise show error message
        //AJAX call fails: show ajax call error

//Ajax call for the forgot password form
//ONce the form is submitted
    //prevent default php processing
    //collect user inputs
    //send them to login.php using AJAX
        //AJAX CALL successful: show error or success message
        //AJAX call fails: show AJAX call error
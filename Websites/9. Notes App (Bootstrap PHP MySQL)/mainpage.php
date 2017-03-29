<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Notes</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--    custom css-->
    <link href="styling.css" rel="stylesheet">
<!--arvo font-->
      <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
<!--      custom styling -->
      <style>
          #container {
              margin-top: 120px;
          }
          
          .container {
              margin-top: 120px;
          }
          
          #allNotes, #done{
              display: none;
          }
          
          .buttons{
              margin-bottom: 20px;
          }
          
          textarea{
              width: 100%;
              max-width: 100%;
              font-size: 16px;
              line-height: 1.5em;
              border-left-width: 20px;
              border-color: #62aacf;;
              color: darkblue;
              background-color: #fbefff;
              padding: 10px;
          }
      </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!--    Navigation Bar-->
    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Online Notes</a>
                <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbarCollapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="active"><a href="#">My Notes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Logged in as <b>username</b></a></li>
                    <li><a href="#">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!--Container-->
    <div class="container">
        <div class="row">
            <div class="col-md-offset3 col-md-6">
                <div class="buttons">
                    <button id="addNote" type="button" class="btn btn-info btn-lg">Add Note</button>
                    <button id="editNote" type="button" class="btn btn-info btn-lg pull-right">Edit</button>
                    <button id="done" type="button" class="btn green btn-lg pull-right">Done</button>
                    <button id="allNotes" type="button" class="btn btn-info btn-lg">All Notes</button>
                </div>
                <div id="notePad">
                    <textarea rows="10"></textarea>
                </div>
                <div id="notes" class="notes">
<!--                ajax call to php file-->
                </div>
            </div>
        </div>
    </div>
<!--    Login Form-->
      <form method="post" id="loginForm">
        <!--        the modal-->
        <div id="loginModal" class="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
<!--                modal header goes here-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Login</h4>
                    </div>
<!--                    modal content-->
                    <div class="modal-body">
<!--                        login message from PHP file-->
                        <div id="loginMessage"></div>
<!--                        end signup message from php file-->
                        <div class="form-group">
                            <label for="loginEmail" class="sr-only">Login Email</label>
                            <input  id="loginEmail" class="form-control" type="email" name="loginemail" placeholder="Email" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword" class="sr-only">Login Password</label>
                            <input  id="loginPassword" class="form-control" type="password" name="loginpassword" placeholder="Enter your password" maxlength="30">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="rememberme" id="rememberMe">Remember me</label>
                            <a class="pull-right" style="cursor: pointer;" data-target="#forgotPasswordModal" data-toggle="modal" data-dismiss="modal">Forgot password?</a>
                        </div>
                    </div>
<!--                    modal footer-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
                        <input class="btn green" name="login" type="submit" value="Login">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
<!--        end modal-->
      </form>
<!--      end login form-->
      
<!--    Sign up Form -->
      <form method="post" id="signupForm">
        <!--        the modal-->
        <div id="signupModal" class="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
<!--                modal header goes here-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Sign Up Today and Start Using Online Notes App</h4>
                    </div>
<!--                    modal content-->
                    <div class="modal-body">
<!--                        signup message from PHP file-->
                        <div id="signupMessage"></div>
<!--                        end signup message from php file-->
                        <div class="form-group">
                            <label for="Username" class="sr-only">Username</label>
                            <input  id="Username" class="form-control" type="text" name="username" placeholder="Username" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="Email" class="sr-only">Email</label>
                            <input  id="Email" class="form-control" type="email" name="email" placeholder="Email" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="Password" class="sr-only">Password</label>
                            <input  id="Password" class="form-control" type="password" name="password" placeholder="Choose a password" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="Password2" class="sr-only">Confirm Password</label>
                            <input  id="Password2" class="form-control" type="password" name="password2" placeholder="Confirm password" maxlength="30">
                        </div>
                    </div>
<!--                    modal footer-->
                    <div class="modal-footer">
                        <input class="btn green" name="signup" type="submit" value="Sign Up">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
<!--        end modal-->
      </form>
<!--      end signup form-->
      
<!--      Forgot password form -->
      <form method="post" id="forgotPasswordForm">
        <!--        the modal-->
        <div id="forgotPasswordModal" class="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
<!--                modal header goes here-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Forgot Password? Enter your email address</h4>
                    </div>
<!--                    modal content-->
                    <div class="modal-body">
<!--                        login message from PHP file-->
                        <div id="forgotPasswordMessage"></div>
<!--                        end signup message from php file-->
                        <div class="form-group">
                            <label for="forgotEmail" class="sr-only">Forgot Email</label>
                            <input  id="forgotEmail" class="form-control" type="email" name="forgotemail" placeholder="Email" maxlength="50">
                        </div>
                    </div>
<!--                    modal footer-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
                        <input class="btn green" name="forgotpassword" type="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
<!--        end modal-->
      </form>
<!--      end forgot password form-->
<!--      Footer-->
    <div class="footer">
        <div id="container" class="container">
            <p>Terence Highsmith Copyright &copy; 2016-<?php $today = date("Y"); echo $today;?>.</p>
        </div>
    </div>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
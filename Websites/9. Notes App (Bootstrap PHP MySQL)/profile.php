<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile Page</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--    custom css-->
    <link href="styling.css" rel="stylesheet">
<!--arvo font-->
      <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
<!--      custom styling -->
      <style>
          #container {
              margin-top: 100px;
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
          
          tr {
              cursor: pointer;
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
                <h2>General Account Settings</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <tr data-target="#updateUsername" data-toggle="modal"><td>Username</td><td>Value</td></tr>
                        <tr data-target="#updateEmail" data-toggle="modal"><td>Email</td><td>Value</td></tr>
                        <tr data-target="#updatePassword" data-toggle="modal"><td>Password</td><td>Hidden</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--    Update Username Form-->
      <form method="post" id="updateUsernameForm">
        <!--        the modal-->
        <div id="updateUsername" class="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
<!--                modal header goes here-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Edit Username</h4>
                    </div>
<!--                    modal content-->
                    <div class="modal-body">
<!--                        login message from PHP file-->
                        <div id="loginMessage"></div>
<!--                        end signup message from php file-->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input  id="username" class="form-control" type="text" name="username" placeholder="Email" maxlength="30" value="Edit username">
                        </div>
                        
                    </div>
<!--                    modal footer-->
                    <div class="modal-footer">
                        <input class="btn green" name="updateusername" type="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
<!--        end modal-->
      </form>
<!--      end update username form-->
      
<!--    Update email form -->
      <form method="post" id="updateEmailForm">
        <!--        the modal-->
        <div id="updateEmail" class="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
<!--                modal header goes here-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Enter new email</h4>
                    </div>
<!--                    modal content-->
                    <div class="modal-body">
<!--                        login message from PHP file-->
                        <div id="loginMessage"></div>
<!--                        end signup message from php file-->
                        <div class="form-group">
                            <label for="loginemail">Email</label>
                            <input  id="email" class="form-control" type="email" name="email"  maxlength="50" value="email value">
                        </div>
                        
                    </div>
<!--                    modal footer-->
                    <div class="modal-footer">
                        <input class="btn green" name="updateusername" type="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
<!--        end modal-->
      </form>
<!--      end update email form-->
      
<!--      Update password form -->
      <form method="post" id="updatePaswordForm">
        <!--        the modal-->
        <div id="updatePassword" class="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
<!--                modal header goes here-->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 id="myModalLabel">Enter current and new password</h4>
                    </div>
<!--                    modal content-->
                    <div class="modal-body">
<!--                        login message from PHP file-->
                        <div id="loginMessage"></div>
<!--                        end signup message from php file-->
                        <div class="form-group">
                            <label for="currentpassword" class="sr-only">Current password</label>
                            <input  id="currentpassword" class="form-control" type="password" name="currentpassword" placeholder="Your current password" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Choose a password</label>
                            <input  id="password" class="form-control" type="password" name="password" placeholder="Choose a password" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="sr-only">Confirm password</label>
                            <input  id="password2" class="form-control" type="password" name="password2" placeholder="Confirm password" maxlength="30">
                        </div>
                        
                    </div>
<!--                    modal footer-->
                    <div class="modal-footer">
                        <input class="btn green" name="updateusername" type="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
<!--        end modal-->
      </form>
<!--      end update password form-->
<!--      Footer-->
    <div class="footer">
        <div>
            <p>Terence Highsmith Copyright &copy; 2016-<?php $today = date("Y"); echo $today;?>.</p>
        </div>
    </div>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
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

<!--      Footer-->
    <div class="footer">
        <div class="container">
            <p>Terence Highsmith Copyright &copy; 2016-<?php $today = date("Y"); echo $today;?>.</p>
        </div>
    </div>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
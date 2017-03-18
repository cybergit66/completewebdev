<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Data Types: String functions</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 { color: purple; }
        h3 { color: turquoise; }
        .containing-div {
            border: 1px solid #7c73f6;
            border-radius: 15px;
            margin-top: 100px;
        }
    </style>
      
  </head>
  <body>
      <?php
      include "23.header.php";
      ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 containing-div">
                <h1>Upload Files</h1>
                <?php
                if($_POST["submit"]){
                    //file details
                    $name = $_FILES["file"]["name"];
                    $type = $_FILES["file"]["type"];
                    $size = $_FILES["file"]["size"];
                    $file_error = $_FILES["file"]["fileerror"];
                    $tmp_name = $_FILES["file"]["tmp_name"];
                    $permanent_dest = "uploads/" . $_FILES["file"]["name"];
                    //error messages
                    $no_file = "<p><strong>Please upload a file</strong></p>";
                    $file_exists = "<p><strong>This file already exists</strong></p>";
                    $bad_format = "<p><strong>Please upload only a pdf or text file</strong></p>";
                    $too_large = "<p><strong>Please upload a file with max size 3MB</strong></p>";
                    //allowed formats
                    $allowed_formats = array("pdf"=>"application/pdf","text"=>"text/plain");
                    //check for errors
                    if($file_error == 4){
                        $errors .= $no_file;
                    } else {
                        if(file_exists($permanent_dest)){
                        $errors .= $file_exists;
                        }
                        if($size > 3*1024*1024){
                            $errors .= $too_large;
                        }
                        if(!in_array($type, $allowed_formats)){
                            $errors .= $bad_format;
                        }
                    }
                    if($errors){
                        $result_message = '<div class="alert alert-danger">' . $errors . '</div>';
                        echo $result_message;
                    } else {
                        if(move_uploaded_file($tmp_name, $permanent_dest)){
//                            $result_message = '<div class="alert alert-success">File uploaded successfully</div';
                              header("Location:26.thanksforyourfile.php");
                        } else {
                            $result_message = '<div class="alert alert-warning">Unable to upload file. Try again later</div>';
                        }
                    }
                    print_r($_FILES);
                    if($_FILES["file"]["error"]>0){
                        echo "<p>There was an error uploading your file: " . $_FILES["file"]["error"] . "</p>";
                    } else {
                        echo "<p>File: " . $_FILES["file"]["name"] . "</p>";
                        echo "<p>File type: " . $_FILES["file"]["type"] . "</p>";
                        echo "<p>File size: " . $_FILES["file"]["size"] . "</p>";
                        echo "<p>File tmp location: " . $_FILES["file"]["tmp_name"] . "</p>";
                        echo "<p>Permanent destination: /uploads/" . $_FILES["file"]["name"] . "</p>";
                    }
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Choose file</label>
                        <input type="file" name="file" id="file" placeholder="file">
                    </div>
                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Upload">
                </form>
            </div>
        </div>
      </div>
      <?php
      include "23.footer.php";
      ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
ob_flush();
?>
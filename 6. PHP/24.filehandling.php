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
                <h1>Include Files</h1>
                <div>
                    <h3>fopen/fclose:</h3>
                    <?php
                    if(file_exists("sometextf.txt")){
                        $myFile = fopen("sometext.txt", "r");
                        fclose($myFile);
                    }else {
                        echo "<p>File does not exist</p>";
                    }
                    ?>
                    <h3>fread:</h3>
                    <?php
                    $fileHandle = fopen("sometext.txt", "r") or die("Unable to open file!");
                    $fileContent = fread($fileHandle, filesize("sometext.txt"));
                    fclose($fileHandle);
                    var_dump($fileContent);
                    ?>
                    <h3>file_get_contents:</h3>
                    <?php
                    $fileContent = file_get_contents("sometext.txt") or die("Unable to read file");
                    var_dump($fileContent);
                    ?>
                    <h3>file function:</h3>
                    <?php
                    $fileContent = file("sometext.txt") or die("Unable to read file");
                    var_dump($fileContent);
                    foreach($fileContent as $line){
                        echo $line . "<br/>";
                    }
                    ?>
                    <h3>fwrite:</h3>
                    <?php
                    $fileHandle = fopen("sometext.txt","w") or die("Unable to open file");
                    fwrite($fileHandle, "This is new content") or die("Unable to write to file");
                    $fileContent = file("sometext.txt") or die("Unable to read file");
                    var_dump($fileContent);
                    ?>
                    <h3>file_put_contents:</h3>
                    <?php
                    file_put_contents("sometext.txt","\r\n This is additional text", FILE_APPEND) or die("Unable to write to file");
                    $fileContent = file("sometext.txt") or die("Unable to read file");
                    var_dump($fileContent);
                    ?>
                </div>
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
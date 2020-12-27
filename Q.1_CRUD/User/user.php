<?php
    session_start();

    
    if(!isset($_SESSION["User"]))
    {
        header('Location: index.php');
    } 
      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <title>E-Cart</title>
</head>
<body>
    <div class="contain">
        <div class="row">
            <div class="com-md-6">
                <div class="jumbotron">
                 <div class="text-center">
                    <h2>
                        Welcome <?php echo $_SESSION["User"] ?> 
                    </h2>
                </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>
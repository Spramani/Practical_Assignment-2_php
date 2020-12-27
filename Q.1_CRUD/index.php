<?php

    include "code.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   

    <title>E-Cart</title>
</head>
<body>
    <div class="col-md-6 col-md-offset-3">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">Login </h2>
            <form action="code.php" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
                </div>

                <p class="text-center" style="color:red">
                    <?php echo $role; ?>
                </p>

                <div class="form-group">
                  
                    <input type="Submit" name="btnLogin" class="btn btn-primary" value="Login"/>
                </div>

            </form>

            <a href="registration.php">Signup</a>

        </div>
    </div>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
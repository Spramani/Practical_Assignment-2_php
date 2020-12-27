<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <title>Document</title>
</head>

<body>
    <div class="contain row">
        <div class="com-md-6">
            <h2 class="text-center">Registration !</h2>
            <form action="code.php" method="POST">

                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" />
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" />
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" />
                </div>

                <div class="form-group">
                    <label>DOB</label>
                    <input type="text" name="dob" class="form-control" placeholder="Enter DOB" />
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <input type="text" name="role" class="form-control" placeholder="Enter Role (Admin/user)" />
                </div>


                <div class="form-group">

                    <input type="Submit" name="btnregister" class="btn btn-primary" value="Login" />
                </div>

            </form>

        </div>
    </div>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>
<?php
    session_start();

if(!isset($_SESSION["Admin"]))
{
    header('Location: index.php');
} 
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <title>Admin</title>
</head>
<body>
    


<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark" >
  <a class="navbar-brand" href="#">Welcome Admin</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="category.php">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product.php">Product</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="../User/logout.php">Out</a>
      </li>
      
    </ul>

</nav>

<h1 style="text-align:center;" >Select Top navigation to perform action</h1>

   
</body>
</html>
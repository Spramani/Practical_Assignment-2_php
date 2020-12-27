<?php

    include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .row1 {
      display: flex;
    }

    .column {
      flex: 33.33%;
      padding: 5px;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#">E-Cart</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">

        <li class="mx-4" >
        <select name="categoryid" class="form-control" onchange="changeCat(this)" >
              <option disabled value="" selected>Select Category</option>
              <?php 
                        $query = "SELECT * FROM `tblcategory`";
                        $res = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($res)){
                    ?>
              <option value="<?php echo $row["categoryid"] ?>"
                <?php if(isset($_REQUEST['catId'])){ if($row['categoryid'] == $_REQUEST['catId']){ echo "selected"; } } ?>>
               
                <?php echo $row['categoryname'] ?>
              
                </option>
              <?php        
                        }
                    ?>

            </select>
            
          
        </li>
        <li> <a href="logout.php">Logout</a></li>
      </ul>
      
    </div>
  </nav>

  <h5 class="text-center">All Products</h5>



  <div class="container">
    <div class="row1 row" id="result">
      <?php 
      if(isset($_REQUEST['catId'])){
        $sql = "SELECT * FROM tblproduct WHERE categoryid = ".$_REQUEST['catId'];

      }else{

        $sql = "SELECT * FROM tblproduct";
      }
        $result  = $conn->query($sql);
        while($row=$result->fetch_assoc()){

    ?>

      <div class="col-md-3 mb-2">

        <div class="card border-secondary ">
          <img src="<?php  echo "../Admin/".$row['image']; ?>" style="width:100%;height:250px" class="img-responsive"
            alt="Cinque Terre">

          <div class="card-body">

            <h6 class="text-light bg-danger text-center rounded p-1"><?php echo $row['productname'] ?></h6>
            <?php 
                        $qry = "SELECT categoryname FROM tblcategory WHERE categoryid=".$row['categoryid'];
                        $res = mysqli_query($conn,$qry);

                        while($row2 = mysqli_fetch_assoc($res)){
                    ?>
            <h4>
              <td><?php echo $row2['categoryname']; ?></td>
            </h4>
            <?php
                        }
                    ?>

            <h4 class="card-title text-danger">Price <?php echo $row['price']; ?>/-</h4>

          </div>
          <a href="#" class="btn btn-success btn-block">Add to Cart</a>
        </div>

      </div>
      <?php } ?>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script>
  function changeCat(el){
    var catid = $(el).val();
    console.log(catid);
    if(catid){

      window.location.replace("showproduct.php?catId="+catid);
    }else{

      window.location.replace("showproduct.php");
    }
  }
  </script>
  
</body>

</html>
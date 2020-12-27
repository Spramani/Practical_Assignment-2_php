
<?php 

session_start();

// if(!isset($_SESSION["Admin"]))
// {
//     header('Location: /index.php');
// } 


include "../connection.php";

if(isset($_POST["btninsert"]))
{
    $pname = $_POST["productname"];
    $cid = $_POST["categoryid"];
    $price = $_POST["price"];
    $image = $_FILES["image"];

    $filename = $image['name'];  //image.jpg
    $fileerror = $image['error'];
    $filetmp = $image['tmp_name'];


    $fileext = explode('.',$filename);  // image , jpg
    $filecheck = strtolower(end($fileext)); //jpg

    $fileextstored = array('png','jpg','jpeg');

    if(in_array($filecheck,$fileextstored)){
        $destinationfile = 'upload/'.$filename;
        move_uploaded_file($filetmp,$destinationfile); 
    }



    $insery_query = "INSERT INTO tblproduct(productname,categoryid,price,image) VALUES ('$pname','$cid','$price','$destinationfile') ";

    if(mysqli_query($conn,$insery_query))
    {
        echo "Record Inserted Successfully.";

    }
    else{
        echo"Error: " .$insert_query. "<br>" .mysqli_error($conn);

    }
}

if(isset($_GET["id"]))
{
   $product_id = $_GET['id'];

    $GetId_query = "SELECT * FROM tblproduct WHERE productid='$product_id'";

    $result=mysqli_query($conn,$GetId_query);
    

    $row = mysqli_fetch_assoc($result);
    
    $prodid = $row['productid'];
    $prodname = $row['productname']; 

    $qry2 = "SELECT categoryname FROM tblcategory WHERE categoryid=".$row['categoryid'];
    $res2 = mysqli_query($conn,$qry2);

    $row3 = mysqli_fetch_assoc($res2);

    $prodcatID = $row['categoryid'];
    $prodcat = $row3['categoryname'];       
    $prodprice = $row['price'];       
    $prodimg = $row['image'];       

}

if(isset($_POST["btnupdate"]))
{
    $pid = $row['productid'];
    $pname = $_POST["productname"];
    $cid = $_POST["categoryid"];
    $price = $_POST["price"];
    $image = $_FILES["image"];


    $filename = $image['name'];  //image.jpg
    $fileerror = $image['error'];
    $filetmp = $image['tmp_name'];


    $fileext = explode('.',$filename);  // image , jpg
    $filecheck = strtolower(end($fileext)); //jpg

    $fileextstored = array('png','jpg','jpeg');

    if(in_array($filecheck,$fileextstored)){
        $destinationfile = 'upload./'.$filename;
        move_uploaded_file($filetmp,$destinationfile); 
    }

    $update_query = "UPDATE tblproduct SET productname='$pname',categoryid='$cid',price='$price',image='$destinationfile' WHERE productid='$pid' ";

    if(mysqli_query($conn,$update_query))
    {
      
        echo "record updated successfullyy.";

    }
    else{
        echo"Error: " .$update_query. "<br>" .mysqli_error($conn);

    }
}

if(isset($_GET["productid"]))
{
    $proid = $_GET['productid'];
   

    $delete_query = "DELETE FROM `tblproduct` WHERE `productid`='$proid'";

    if(mysqli_query($conn,$delete_query))
    {
      
        echo "delete record successfullyy.";

    }
    else{
        echo"Error: " .$delete_query. "<br>" .mysqli_error($conn);

    }
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



<title>Product</title>
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

</nav>

<div class="col-md-8 mx-auto">
    <div class="col-md-6">
        <h2 class="text-center">Add Product</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            
        <input type="hidden" name="productid" value="<?php echo $prodid; ?>">
         
            <div class="col-md-12">
                 
                <label>Product Name</label>
                <input type="text" name="productname" class="form-control" placeholder="Enter Product Name" value="<?php if(isset($_GET['id'])){ echo $prodname; }?>">
                
            </div>
            <div class="col-md-12">
                <label>Category Name</label>
                <select name="categoryid" class="form-control">
                    <option disabled value="" selected>Select Category</option>
                    <?php 
                        $query = "SELECT * FROM `tblcategory`";
                        $res = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <option value="<?php echo $row["categoryid"] ?>" <?php if(isset($_GET['id'])){ if($row['categoryid'] == $prodcatID){ echo "selected"; } } ?>><?php echo $row['categoryname'] ?></option>
                    <?php        
                        }
                    ?>
                    
                </select>
            </div>
            <div class="col-md-12">
                 
                 <label>Product Price</label>
                 <input type="text" name="price" class="form-control" placeholder="Enter Product Price" value="<?php if(isset($_GET['id'])){ echo $prodprice; }?>">
                 
             </div>

             <div class="col-md-12">
                 
                 <label>Product Image</label>
                 <input type="file" name="image" class="form-control" value="<?php if(isset($_GET['id'])){ echo $prodimg; }?>">
                 
             </div>
           
           <br>
            <div class="col-md-12">                 
                <input type="Submit" name="btninsert" class="btn btn-primary" value="Insert"/>
                <input type="Submit" name="btnupdate" class="btn btn-primary" value="Update"/>

            </div>
                        <br><br>
        </form>

    </div>
</div>




<?php
// $getdata_query = "SELECT productname,tblcategory.categoryname,price,image FROM tblproduct INNER JOIN tblcategory ON tblproduct.categoryid=tblcategory.categoryid";
$getdata_query = "SELECT * FROM tblproduct";
$result  = $conn->query($getdata_query);
?>


<div class="container">
<table class="table table-bordered table-striped table-hover text-center">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

    </thead>

    <tbody>

    <?php 
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()){
    ?>
                <tr>
                    <td><?php echo $row['productname']; ?></td>
                    <?php 
                        $qry = "SELECT categoryname FROM tblcategory WHERE categoryid=".$row['categoryid'];
                        $res = mysqli_query($conn,$qry);

                        while($row2 = mysqli_fetch_assoc($res)){
                    ?>
                        <td><?php echo $row2['categoryname']; ?></td>
                    <?php
                        }
                    ?>
                    <td><?php echo $row['price']; ?></td>
                    <td><img src="<?php echo $row['image']; ?> " height="100px" width="100px"></td>
                    <td><a class="btn btn-primary" href="product.php?id=<?php echo $row['productid']; ?>">Edit</a>
                    <a class="btn btn-danger" href="product.php?productid=<?php echo $row['productid']; ?>">Delete</a>
                     </td>
                </tr>
<?php    
       }
    }
  ?>
       
    </tbody>
</table>
</div>


</body>
</html>
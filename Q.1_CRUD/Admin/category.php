<?php

session_start();


include "../connection.php";

if (isset($_POST["btninsert"])) {
    $cname = $_POST["categoryname"];

    $insery_query = "INSERT INTO `tblcategory`(`categoryname`) VALUES ('$cname') ";

    if (mysqli_query($conn, $insery_query)) {
        echo "Record Inserted Successfully.";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
}

if (isset($_GET["id"])) {
    $category_id = $_GET['id'];

    $GetId_query = "SELECT * FROM tblcategory WHERE categoryid='$category_id'";

    $result = mysqli_query($conn, $GetId_query);


    $row = mysqli_fetch_assoc($result);

    $catID = $row['categoryid'];
    $catName = $row['categoryname'];
}

if (isset($_POST["btnupdate"])) {
    $catID = $row['categoryid'];
    $cname = $_POST["categoryname"];

    $update_query = "UPDATE `tblcategory` SET categoryname='$cname' WHERE categoryid='$catID' ";

    if (mysqli_query($conn, $update_query)) {

        echo "record updated successfullyy.";
    } else {
        echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
    }
}

if (isset($_GET["categoryid"])) {
    $catID = $_GET['categoryid'];


    $delete_query = "DELETE FROM `tblcategory` WHERE `categoryid`='$catID'";

    if (mysqli_query($conn, $delete_query)) {

        echo "delete record successfullyy.";
    } else {
        echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
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



    <title>Category</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
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
            <h2 class="text-center">Add category</h2>
            <form action="" method="POST">

                <input type="hidden" value="<?php echo $catID; ?>">

                <div class="col-md-12">

                    <label>Category Name</label>


                    <input type="text" name="categoryname" class="form-control" placeholder="Enter Category Name" value="<?php if (isset($_GET['id'])) {
                                                                                                                                echo $catName;
                                                                                                                            } ?>">

                </div>

                <br>
                <div class="col-md-12">
                    <input type="Submit" name="btninsert" class="btn btn-primary" value="Insert" />
                    <input type="Submit" name="btnupdate" class="btn btn-primary" value="Update" />

                </div>
                <br><br>
            </form>

        </div>
    </div>




    <?php
    $getdata_query = "SELECT * FROM tblcategory";
    $result  = $conn->query($getdata_query);
    ?>


    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['categoryname']; ?></td>
                            <td><a class="btn btn-primary" href="category.php?id=<?php echo $row['categoryid']; ?>">Edit</a>
                                <a class="btn btn-danger" href="category.php?categoryid=<?php echo $row['categoryid']; ?>">Delete</a>
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
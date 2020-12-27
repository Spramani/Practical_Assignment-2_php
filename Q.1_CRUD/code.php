<?php 

    session_start();
    require_once "connection.php";

    $message = "";
    $role ="";

    if(isset($_POST["btnLogin"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM tblUser WHERE Username='$username' AND Password='$password'";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                if($row["Role"] == "Admin")
                {
                    $_SESSION["Admin"] = $row["Username"];
                    header("Location: Admin/admin.php");

                }
                else
                {
                    $_SESSION["User"] = $row["Username"];
                    header("Location: User/showproduct.php");

                }
            }
        }
        else{
          header("Location: index.php");
        }

    }


    if(isset($_POST["btnregister"]))
    {
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $uname = $_POST["username"];
        $password= $_POST["password"];
        $dob = $_POST["dob"];
        $role = $_POST["role"];

        $insert_query = "INSERT INTO `tblUser`(`Firstname`,`Lastname`,`Username`,`Password`,`DOB`,`Role`) VALUES ('$fname','$lname','$uname','$password','$dob','$role')";

        if(mysqli_query($conn,$insert_query))
        {
           echo json_encode(array("statusCode"=>200));
          header("Location: index.php");
        }
        else{
            echo"Error: " .$insert_query. "<br>" .mysqli_error($conn);
        }
    }

?>
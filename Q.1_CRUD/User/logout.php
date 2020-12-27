<?php
session_start();
unset($_SESSION["Admin"]);
unset($_SESSION["Username"]);
header("Location:../index.php");
?>
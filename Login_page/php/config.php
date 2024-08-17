<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "injungle_safari";

$con = new mysqli($server, $user, $password, $database);

if($con -> connect_error){
    die("ERROR: Could not connect to database." . $con->connect_error);
}
?>
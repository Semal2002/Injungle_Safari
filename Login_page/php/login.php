<?php

include_once 'config.php';

if(isset($_POST["login"])) {
    session_start();
    
    $sql = mysqli_query($con,"SELECT * FROM user WHERE email='" . $_POST["loginemail"] . "' AND password='". $_POST["loginpassword"]."'");
    $row = mysqli_fetch_array($sql);
    if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["email"] =$row["email"];
        $_SESSION["firstname"] = $row["firstname"];
        $_SESSION["lastname"] = $row["lastname"];

        if(isset($_SESSION["email"])) {
            echo "<script>alert('Login Successfull...')</script>";
            echo "<script>setTimeout(\"location.href = '../php/profile.php';\",300);</script>";
        }
    } 
    else {
        echo "<script>alert('Invalid Username or Password')</script>";
        echo "<script>setTimeout(\"location.href = '../html/login.html';\",300);</script>";
    }
}

if(isset($_POST["register"])) {

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$telephone=$_POST['telephone'];
	$password=$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];

	$sql="SELECT email FROM user WHERE email='$email'";

	if($result=$con->query($sql)){
	
		if($result->num_rows>0){
			echo "<script>alert('Username or email already exists...')</script>";
			echo "<script>setTimeout(\"location.href='../html/login.html';\",300);</script>";
		}
		else
		{
            $result = "INSERT INTO user (firstname , lastname , email , telephone , password)
            VALUES ('$firstname','$lastname','$email','$telephone','$password')";

            if ($con->query($result) === TRUE) 
            {
                echo "<script>alert('Registration Successfull...')</script>";
                echo "<script>setTimeout(\"location.href='../html/login.html';\",300);</script>";
            }
            else
            {
                echo "SQL Error";
            }
		}
	}
	else {
		die(mysqli_error($con));
	}

}

?>

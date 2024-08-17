<?php
include_once 'config.php';

session_start();

$sql = mysqli_query($con, "SELECT * FROM user WHERE email='" . $_SESSION["email"] . "'");
$row = mysqli_fetch_array($sql);
if (is_array($row)) {

    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
    $telephone = $row["telephone"];

} else {
    echo "<script>alert('No user found')</script>";
    echo "<script>setTimeout(\"location.href = '../html/login.html';\",300);</script>";
}

if (isset($_POST['update'])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];

    $sql = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email' , telephone='$telephone' WHERE email='" . $_SESSION['email'] . "'";

    if ($con->query($sql) === TRUE) {
        $_SESSION["email"] = $email;
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        header("Location:profile.php");
        exit();
    } else {
        echo "<script>alert('Error updating account!')</script>";
        echo "<script>setTimeout(\"location.href = '../php/editprofile.php';\",300);</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Edit Profile</title>
</head>

<body>
    <form method="POST">
        <div class="wrapper">
            <div class="form-box">
                <div class="update-container" id="update">
                    <div class="top">
                        <header>Update Profile</header>
                    </div>
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" name="firstname" value='<?php echo $firstname ?>'
                                placeholder="First name">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" name="lastname" value='<?php echo $lastname ?>'
                                placeholder="Last name">
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" name="email" value='<?php echo $email ?>'
                            placeholder="Email">
                        <i class="bx bx-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" maxlength="10" value='<?php echo $telephone ?>'
                            name="telephone" placeholder="Telephone">
                        <i class='bx bxs-phone'></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" name="update" value="Edit Profile">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="../js/javascript.js"></script>
</body>

</html>
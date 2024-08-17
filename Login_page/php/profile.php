<?php
include_once 'config.php';
session_start();

if (isset($_POST['deleteAccount'])) {
    $result = mysqli_query($con, "DELETE FROM user WHERE email='" . $_SESSION["email"] . "'");
    if ($result) {
        echo "success";
        exit();
    } else {
        echo "error";
        exit();
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
    <title>Login and Register</title>
</head>

<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="container">
                <header>
                    <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>
                </header>
                <div class="image">
                    <img src="../images/image.jpg" width="100" height="100" />
                </div>
                <div class="mt-5">
                    <a href="../php/editprofile.php">
                        <input type="button" class="submit" name="update" value="Update Profile">
                    </a>
                </div>
                <div class="mt-5">
                    <input type="button" class="submit" name="update" value="Delete Profile" onclick="event.preventDefault();openDialog()">
                </div>
                <div class="mt-5">
                    <a href="../php/logout.php">
                        <input type="button" class="submit" value="Logout">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="Dialog" class="modal">
    <div class="modal-content">
        <h3>Confirm Deletion</h3>
        <p>Are you sure you want to delete your account?</p>
        <div class="button-container">
        <button id="confirmDeleteButton" onclick="deleteAccount()">Delete</button>
        <button onclick="closeDialog()">Cancel</button>
        </div>
    </div>
    </div>
<script src="../js/javascript.js"></script>
<script src="../js/jquery.min.js"></script>
</body>

</html>
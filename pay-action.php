<?php 
    include ("./includes/connect.php");
    ///------------------insert

if (isset($_POST['submit'])) {

    session_start();

    $cHolder = $_POST['cHolder'];
    $cNumber = $_POST['cNumber'];
    $exDate = $_POST['exDate'];
    $cvc = $_POST['cvc'];
    
    $sql = "INSERT INTO payment (cHolder, cNumber, exDate, cvc) VALUES ('$cHolder', '$cNumber', '$exDate', ' $cvc')";
    
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('payment Completed')</script>";
        
        
    } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
    }

}
//---------------update
if (isset($_GET['updateBtn'])) {

    $cHolder = $_GET['cHolder'];
    $cNumber = $_GET['cNumber'];
    $exDate = $_GET['exDate'];
    $cvc = $_GET['cvc'];


    $sql = "UPDATE `payment` SET `cHolder` = '$cHolder', `exDate` = '$exDate'', `cvc` = '$cvc' WHERE `payment`.`cNumber` = '$cNumber'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Reservation Updated')</script>";
        header( "refresh:1; url=payment.php" );
    }else{
        echo "<script>alert('error')</script>";
    }

    

 }

//------------delete
 if (isset($_GET['deleteBtn'])) {
    $cNumber = $_GET['cNumber'];

    $sql= "DELETE FROM 'payment' WHERE `payment`.`cNumber` = '$cNumber'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Reservation Deleted')</script>";
        header( "refresh:1; url=payment.php" );
    }else{
        echo "<script>alert('error')</script>";
    }
 }

 

?>

?>


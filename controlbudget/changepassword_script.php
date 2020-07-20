<?php
require 'includes/common.php';
if(!isset($_SESSION['email']))
{
    header('location:index.php');
}
if(isset($_POST['oldpassword'])){
$old_pass = mysqli_real_escape_string($con, $_POST['oldpassword']);
$old_pass = md5($old_pass);}

if(isset($_POST['newpassword'])){
$new_pass = mysqli_real_escape_string($con, $_POST['newpassword']);
$new_pass = md5($new_pass);}

if(isset($_POST['retypepassword'])){
$rep_pass = mysqli_real_escape_string($con, $_POST['retypepassword']);
$rep_pass = md5($rep_pass);}

$query = "SELECT password FROM user WHERE email =('" . $_SESSION['email'] . "')";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);

$orig_pass = $row['password'];


//check old password and password taken from db
if ($new_pass != $rep_pass) {
    echo "<script>alert('The passwords dont match')</script>";
    echo("<script>location:href='changepassword.php'</script>");
} else {
    if ($old_pass == $orig_pass) {
        $query = "UPDATE  user SET password = '" . $new_pass . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        header('location: index.php?password updated successfully');
    } else{
    echo "<script>alert('You have entered wrong password')</script>";
    echo("<script>location:href='changepassword.php'</script>");
    
    }
}


?>


<?php
require 'includes/common.php';

$title= mysqli_real_escape_string($con, $_POST['title']);
$from= mysqli_real_escape_string($con, $_POST['from']);
$to= mysqli_real_escape_string($con, $_POST['to']);
$initialbudget= mysqli_real_escape_string($con, $_POST['initialbudget']);
$people= mysqli_real_escape_string($con, $_POST['people']);
$query="INSERT into plandetails(title,from_date,to_date,initial_budget,people,user_id) VALUES ('".$title."','".$from."','".$to."','".$initialbudget."','".$people."','".$_SESSION['id']."')";
mysqli_query($con, $query) or die(mysqli_error($con));
$result= mysqli_query($con, "select id from plandetails where initial_budget='$initialbudget' and title='$title'") or die(mysqli_error($con));
$row= mysqli_fetch_array($result);
$_SESSION['planid']=$row['id'];
for($i=1;$i<$people+1;$i++){
    $query=mysqli_query($con,"INSERT into person_names(plan_id,person) VALUES ('".$_SESSION['planid']."','".$_POST["person$i"]."')") or die(mysqli_error($con));
}
header('location:home.php');


?>
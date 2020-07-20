<?php
require 'includes/common.php';
$title= mysqli_real_escape_string($con, $_POST['title']);
$date= mysqli_real_escape_string($con, $_POST['date']);
$amtspent= mysqli_real_escape_string($con, $_POST['amountspent']);
$pname= mysqli_real_escape_string($con, $_POST['pname']);
$result= mysqli_query($con, "select id from person_names where person='$pname' and plan_id='".$_SESSION['planid']."'") or die(mysqli_error($con));
$row= mysqli_fetch_array($result);
$pid=$row['id'];

function GetImageExtension($imagetype){
    switch($imagetype){
        case 'image/bmp': return '.bmp';
        case 'image/gif': return '.gif';
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        default: return false;
    }
}
    $file_name=$_FILES["file"]["name"];
    $temp_name=$_FILES["file"]["tmp_name"];
    $imgtype=$_FILES["file"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=date("d-m-y")."-".time().$ext;
    $target_path="img/".$imagename;
    if(move_uploaded_file($temp_name, $target_path)){
        $query= mysqli_query($con,"insert into addexpense(title,date,amount,person,planid,pid,bill) values('".$title."','".$date."','".$amtspent."','".$pname."','".$_SESSION['planid']."','".$pid."','".$target_path."')") or die(mysqli_error($con));
    }
    else {
        $query= mysqli_query($con,"insert into addexpense(title,date,amount,person,planid,pid) values('".$title."','".$date."','".$amtspent."','".$pname."','".$_SESSION['planid']."','".$pid."')") or die(mysqli_error($con));
    }

header("location:viewplan.php?planid=".$_SESSION['planid']);
?>





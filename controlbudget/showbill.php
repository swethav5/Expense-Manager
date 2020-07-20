<?php
require 'includes/common.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Control Budget</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css"  type="text/css">  
    </head>
    <body>
        <?php
        if(isset($_GET['planid'])){  
        $_SESSION['planid']=$_GET['planid']; 
        for($i=0,$j=$_SESSION['pid'];$i<$_SESSION['people'];$i++){
        $query= mysqli_query($con, "select bill from addexpense where planid='".$_SESSION['planid']."' and pid='$j'") or die(mysqli_error($con));
        $row= mysqli_fetch_array($query);
        $bill=$row['bill']; ?>
        <img src=<?php echo $bill; ?> >
        <?php $j=$j+1; } 
        }?>
        
    </body>
</html>

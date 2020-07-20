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
     require 'includes/header.php';
     ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-offset-2 col-xs-8">
                    <div class="panel">
                        <div class="panel-heading panel-style">
                        <div class="row"> 
                                <div class="col-xs-offset-4 col-xs-4"> 
                                    <center>
                                         <h3><?php echo $_SESSION['title'];?></h3>
                                    </center>
                                </div>
                                <div class="col-xs-offset-2 col-xs-2">
                                    <h3> <span class = "glyphicon glyphicon-user"></span><?php echo $_SESSION['people'];?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <b>Initial Budget</b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-4 align">
                                    &#8377;<?php echo $_SESSION['initialbudget'];?>
                                </div>
                            </div><br>
                            <?php for($i=0,$j=$_SESSION['pid'];$i<$_SESSION['people'];$i++){
                                $query1= mysqli_query($con,"select person from person_names where plan_id='".$_SESSION['planid']."' and id='$j'");
                                $row1= mysqli_fetch_array($query1);
                                $person=$row1['person'];
                                 ?>
                              <div class="row">
                                <div class="col-xs-4">
                                    <b><?php echo $person;?></b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-4 align">
                                    <?php $query= mysqli_query($con, "select sum(amount) as sum from addexpense where pid='$j'") or die(mysqli_error($con));
                                    $num= mysqli_num_rows($query);
                                    $row= mysqli_fetch_array($query);
                                    if($row['sum']>0){
                                    $amount=$row['sum'];
                                    echo '&#8377;'.$amount; }
                                    else {
                                        echo '&#8377;0';
                                    }
                                    $j=$j+1; ?>
                                </div>
                              </div><br>
                            <?php } ?>
                            <div class="row">
                                <div class="col-xs-4">
                                    <b>Total amount spent</b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-4 align">
                                    <?php $query= mysqli_query($con, "select sum(amount) as sum from addexpense where planid='".$_SESSION['planid']."'") or die(mysqli_error($con));
                                    $row= mysqli_fetch_array($query);
                                    if($row['sum']>0){
                                    
                                    $_SESSION['totalamount']=$row['sum'];
                                    ?><b><?php echo '&#8377;'.$_SESSION['totalamount'];?></b> <b> <?php }
                                    else {
                                        echo '&#8377;0'; }
                                    ?></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <b>Remaining Amount</b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-4 align">
                                    
                                    <?php
                                    
                                    $query= mysqli_query($con, "select sum(amount) as sum from addexpense where planid='".$_SESSION['planid']."'") or die(mysqli_error($con));
                                    $row= mysqli_fetch_array($query);
                                    $_SESSION['totalamount']=$row['sum'];
                                    $Remainingamount= $_SESSION['initialbudget']-$_SESSION['totalamount'];
                                    if($Remainingamount>0){
                                        ?> <div class="cgreen"><b>
                                            <?php
                                            echo "&#8377;$Remainingamount"; ?> </b></div> <?php
                                    } else if($Remainingamount<0){
                                        ?><div class="cred"><b> <?php
                                        echo "Overspent by -($Remainingamount)"; ?> </b></div> <?php
                                    }
                                    
                                      ?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <b>Individual Shares</b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-4 align">
                                    &#8377;<?php $individualshare=$_SESSION['totalamount']/$_SESSION['people'];
                                    if($individualshare>0){
                                    echo $individualshare; } 
                                    else{
                                        echo "0";
                                        echo "<script>alert('All settled up')</script>";
                                        echo("<script>location:href='expensedistributon.php'</script>");
                                    }?>
                                </div>
                            </div><br>
                            <?php for($i=0,$j=$_SESSION['pid'];$i<$_SESSION['people'];$i++){
                                $query1= mysqli_query($con,"select person from person_names where plan_id='".$_SESSION['planid']."' and id='$j'");
                                $row1= mysqli_fetch_array($query1);
                                $person=$row1['person'];
                                 ?>
                              <div class="row">
                                <div class="col-xs-4">
                                    <b><?php echo $person;?></b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-4 align">
                                <?php $query= mysqli_query($con, "select sum(amount) as sumamount from addexpense where pid=$j") or die(mysqli_error($con));
                                    $num= mysqli_num_rows($query);
                                    if($num!=0){
                                    $row= mysqli_fetch_array($query);
                                    $amount=$row['sumamount'];
                                    $personshare=$amount-$individualshare;
                                    if($personshare>0){ 
                                        ?> <div class="cgreen"> <?php
                                        echo "Gets back &#8377;".$personshare; ?></div> <?php
                                    }else if($personshare<0){
                                        ?> <div class="cred"> <?php
                                        echo "Owes &#8377;".-$personshare; ?></div> <?php
                                    }
                                    else{
                                        echo "&#8377;0";
                                    }
                                        
                                    }
                                    $j=$j+1;
                                    ?>
                                </div>
                              </div><br>
                            <?php } ?><br>
                              <center>
                                  <a href="viewplan.php?planid=<?php echo $_SESSION['planid'];?>"> <button type="button" class="btn btn-lg btn1"><span class = "glyphicon glyphicon-arrow-left"></span> Go back</button></a>
                            
                              </center>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
        require 'includes/footer.php'; ?>
   </body>
</html>
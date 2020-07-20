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
       
     <?php
     $query= mysqli_query($con,"select * from plandetails where user_id='".$_SESSION['id']."'");
     $num= mysqli_num_rows($query);
     if($num==0){ ?>
        <div class="container">
        <div class="row">
            <div class="col-xs-5">
                <h2>You don't have any active plans</h2>
            </div>
        </div>
            <div class="row">
                <div class="col-xs-offset-4 col-xs-4">
                    <div style="margin-top: 50px;"class="panel">
                        <div class="panel-body panel-primary style">
                            <center>
                                <a href = "createnewplan.php"><span class = "glyphicon glyphicon-plus-sign"></span>Create a New Plan</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php }
      else  { ?>
        <div class="container">
            <div class="row">
            <div class="col-xs-4">
                    <h2>Your Plans</h2>
                </div>       
            </div>
            <div class="row">
        
    <?php 
    $result="SELECT id FROM plandetails WHERE user_id='".$_SESSION['id']."'";
    $query1= mysqli_query($con,$result);
    while ($row= mysqli_fetch_array($query1)){
    $_SESSION['planidarray']=$row['id'];
    $query= mysqli_query($con,"select * from plandetails where user_id='".$_SESSION['id']."' and id='".$_SESSION['planidarray']."'") or die(mysqli_error($con));
        $row= mysqli_fetch_array($query);
        $_SESSION['people']=$row['people'];
        $_SESSION['title']=$row['title'];
        $_SESSION['initialbudget']=$row['initial_budget'];
        $_SESSION['from']=$row['from_date'];
        $_SESSION['to']=$row['to_date']; 
    ?>
        
                
            
                <div class="col-xs-4">
                    <div style="margin-top:40px;"class="panel">
                        <div class="panel-heading panel-style">
                            <div class="row"> 
                                <div class="col-xs-offset-1 col-xs-7"> 
                                    <center><h3><?php echo $_SESSION['title'];?></h3></center>
                                </div>
                                <div class="col-xs-offset-1 col-xs-3">
                                    <h3> <span class = "glyphicon glyphicon-user"></span><?php echo $_SESSION['people'];?></h3>
                                </div>
                            </div>
                        </div>
                        <div style="padding-top:40px; padding-bottom: 40px;" class="panel-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <b>Budget</b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-3">
                                    &#8377;<?php echo $_SESSION['initialbudget'];?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-3">
                                    <b>Date</b>
                                </div>
                                <div class="col-xs-offset-2 col-xs-7">
                                    <?php echo $_SESSION['from'];?> - <?php echo $_SESSION['to']; ?>
                                </div>
                            </div><br>
                            <?php $_SESSION['planid']=$_SESSION['planidarray']; ?>
                            
                            <a href="viewplan.php?planid=<?php echo $_SESSION['planid'];?>"><input type="submit" value="View Plan" class="btn btn-lg btn-block btn1"></a>
                        </div>
                    </div>
         </div><?php
         }?>
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-offset-11 col-xs-1">
                <a href="createnewplan.php"><span class = "glyphicon glyphicon-plus-sign gly"></span></a>
            </div>
        </div>
      <?php }
      ?>
        
     
        <?php
    include 'includes/footer.php';?>  
    </body>
</html>
            
            
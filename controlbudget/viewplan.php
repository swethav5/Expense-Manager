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
    if(isset($_GET['planid'])){  
    $_SESSION['planid']=$_GET['planid']; 
    $query= mysqli_query($con,"select * from plandetails where user_id='".$_SESSION['id']."' and id='".$_SESSION['planid']."'") or die(mysqli_error($con));
    $row= mysqli_fetch_array($query);
    $_SESSION['people']=$row['people'];
    $_SESSION['title']=$row['title'];
    $_SESSION['initialbudget']=$row['initial_budget'];
    $_SESSION['from']=$row['from_date'];
    $_SESSION['to']=$row['to_date'];
    
    $result= mysqli_query($con, "select id from person_names where plan_id='".$_SESSION['planid']."'");
    $row=mysqli_fetch_array($result);
    $_SESSION['pid']=$row['id'];
    
    ?>
        <div  class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel">
                        <div class="panel-heading panel-style">
                            <div class="row"> 
                                <div class="col-xs-offset-3 col-xs-5"> 
                                   
                                    <center><h3><?php echo $_SESSION['title'];?></h3></center>
                                </div>
                                <div class="col-xs-offset-2 col-xs-2">
                                    <h3> <span class = "glyphicon glyphicon-user"></span><?php echo $_SESSION['people'];?></h3>
                                </div>
                            </div>
                        </div>
                        <div style="padding-top:40px; padding-bottom:40px;" class="panel-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <b>Budget</b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-4 align">
                                    &#8377;<?php echo $_SESSION['initialbudget'];?>
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
                                    <b>Date</b>
                                </div>
                                <div class="col-xs-offset-2 col-xs-5 align">
                                    <?php echo $_SESSION['from'];?> - <?php echo $_SESSION['to']; ?>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div style="margin-top: 100px;" class="col-xs-offset-2 col-xs-4">
                    <a href="expensedistribution.php?planid=<?php echo $_SESSION['planid'];?>"> <input type="submit" value="Expense Distribution" class="btn btn-lg btn1"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-8 col-xs-4">
                    <div class="panel">
                        <div class="panel-heading panel-style">
                            <center>
                                <h3>Add New Expense</h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="addexpense.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Expense Name" name="title" required="true" >
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="date">date</label>
                                            <input type="date" class="form-control sample_class" id="date" name="date"min="<?php echo $_SESSION['from']; ?>" max="<?php echo $_SESSION['to']; ?>" required="true" >
                                            <span class="validity"></span>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="amtspent">Amount Spent</label>
                                            <input type="text" class="form-control" id="amtspent" placeholder="Amount Spent" name="amountspent" required="true" >
                                        </div>
                                    </div>
                                </div> 
                               
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <select name="pname" class="form-control">
                                                     <option value="choose">Choose</option>
                                                     <?php for($i=0,$j=$_SESSION['pid'];$i<$_SESSION['people'];$i++){
                                                       $query1= mysqli_query($con,"select person from person_names where plan_id='".$_SESSION['planid']."' and id='$j'");
                                                       $row1= mysqli_fetch_array($query1);
                                                       $_SESSION['person']=$row1['person'];
                                                       $j=$j+1; ?>
                                                     <option value="<?php echo $_SESSION['person']; ?>"><?php echo $_SESSION['person']; }?></option>
                                             </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="upload">Upload Bill</label>
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                    </div>
                                    
                                </div>
                                <a href="addexpense.php?planid=<?php echo $_SESSION['planid'];?>"><input type="submit" value="Add" name='submit'class="btn btn-lg btn-block btn1"></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php 
            for($i=0,$j=$_SESSION['pid'];$i<$_SESSION['people'];$i++){
            $query= mysqli_query($con, "select * from addexpense where planid='".$_SESSION['planid']."' and pid='$j'") or die(mysqli_error($con));
            $row= mysqli_fetch_array($query);
            $_SESSION['expensename']=$row['title'];
            $_SESSION['amount']=$row['amount'];
            $_SESSION['pname']=$row['person'];
            $_SESSION['pdate']=$row['date'];
            $_SESSION['bill']=$row['bill'];
            if(isset($_SESSION['expensename'])){ ?>

                <div class="col-xs-3">
                    <div style="margin-top: -550px; "class="panel">
                        <div class="panel-heading panel-style">
                            <center>
                                <h3><?php echo $_SESSION['expensename']; ?></h3>
                            </center>
                        </div><br>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4">
                                    <b>Amount</b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-4 align">
                                    <?php echo "&#8377;".$_SESSION['amount']; ?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <b>Paid by</b>
                                </div>
                                <div class="col-xs-offset-3 col-xs-4 align">
                                    <?php echo $_SESSION['pname']; ?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-4">
                                    <b>Paid on</b>
                                </div>
                                <div class="col-xs-offset-2 col-xs-5 align">
                                    <?php echo $_SESSION['pdate']; ?>
                                </div>
                            </div><br>
                            <?php
                            if($_SESSION['bill']==null){ ?>
                            <div class="row">
                                <div class="col-xs-12">
                                    <center>
                                        <a href="">You don't have bill</a>
                                    </center>
                                </div>
                            </div>
                           <?php  } else { ?>
                            <div class="row">
                                <div class="col-xs-12">
                                    <center>
                                        <a href="showbill.php?planid=<?php echo $_SESSION['planid'];?>">Show bill</a>
                                    </center>
                                </div>
                            </div>
                               
                          <?php } ?>
                        </div>
                    </div>
                </div>
            
        <?php  } 
            $j=$j+1;
            } ?>
           </div>
        </div>
        <?php
        require 'includes/footer.php';
      } ?>
        
    </body>
</html>
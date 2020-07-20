<?php
require 'includes/common.php';
$initialbudget= mysqli_real_escape_string($con, $_POST['initialbudget']);
$people= mysqli_real_escape_string($con, $_POST['people']);


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
                <div class="col-xs-offset-3 col-xs-6">
                    <div class="panel">
                        <div class="panel-body">
                            <form method="post" action="plandetails_script.php">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Enter Title (Ex Trip to Goa)" name="title" required="true" >
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="from">From</label>
                                            <input type="date" class="form-control sample_class" id="from" name="from" min="2019-04-01" max="2019-04-20" required="true">
                                           
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="to">To</label>
                                            <input type="date" class="form-control sample_class" id="to" name="to" min="2019-04-01" max="2019-04-20"required="true" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <label for="initialbudget">Initial Budget</label>
                                            <input type="number" class="form-control st" id="initialbudget" name="initialbudget" value="<?php echo $initialbudget;?>">
                                           
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="people">No. of People</label>
                                            <input type="number" class="form-control st" id="people" name="people" value="<?php echo $people;?>" >
                                        </div>
                                    </div>
                                </div>
                               <?php for ($i=1;$i<$people+1;$i++){?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="person">Person <?php echo $i;?></label>
                                            <input type="text" class="form-control" id="person" name="person<?php echo $i;?>" placeholder="Person <?php echo $i;?> Name" required="true">
                                        </div>
                                    </div>
                                </div>
                               <?php }?>
                                <a href="home.php"><input type="submit" value="Submit" class="btn btn-block btn1"></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            require 'includes/footer.php';
            ?>
    </body>
</html>

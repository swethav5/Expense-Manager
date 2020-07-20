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
    include 'includes/header.php';
    ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-offset-3 col-xs-6">
                    <div class="panel">
                        <div class="panel-heading panel-style">
                            <center>
                                <h3>Create New Plan</h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="plandetails.php">
                                 <div class="form-group">
                                    <div class="row">
                                        <p style="padding-left: 15px">Initial Budget</p>
                                        <div class="col-xs-12">
                                            <input type="text" class="form-control" placeholder="Initial Budget (Ex 4000)" name="initialbudget" required="true" >
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="row">
                                        <p style="padding-left: 15px">How many peoples you want to add in your group?</p>
                                        <div class="col-xs-12">
                                            <input type="text" class="form-control" placeholder="No. of people" name="people" required="true" >
                                        </div>
                                    </div>
                                </div>
                                <input href="plandetails.php" type="submit" value="Next" class="btn btn-lg btn-block btn1">
                                
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
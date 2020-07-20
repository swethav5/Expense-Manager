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
                <div class="col-xs-offset-4 col-xs-5">
                    <div class="panel">
                        <div class="panel-heading">
                            <center>
                                <h2>Change Password</h2>
                            </center>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="changepassword_script.php">
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="oldp">Old Password:</label>
                                            <input type="password" class="form-control" id="oldp" placeholder="Old Password" name="oldpassword" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="newp">New Password:</label>
                                            <input type="password" class="form-control" id="newp" placeholder="New Password (Min. 6 characters)"name="newpassword" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="rep">Confirm New Password:</label>
                                            <input type="password" class="form-control" id="rep" placeholder="Re-type New Password"name="retypepassword" >
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="submit" value="Change" class="btn btn-lg btn-block btn-success">
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

<?php
require 'includes/common.php';
if(isset($_SESSION['email'])){
  header('location:home.php');  
}
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
                <div class="col-xs-offset-4 col-xs-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <center>
                                <h2>Login</h2>
                            </center>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="login_script.php">
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" >
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="submit" value="Login" class="btn btn-lg btn-block btn-success">
                            </form>
                        </div>
                        <div class="panel-footer">
                            Don't have an account? <a href='signup.php'>Click here to Sign Up</a>
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
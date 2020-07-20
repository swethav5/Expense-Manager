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
                                <h2>Sign Up</h2>
                            </center>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="signup_script.php">
                                <div class="form-group">
                                    <div class="row">
                                        <p style="font-weight: bold; padding-left: 15px">Name:</p>
                                        <div class="col-xs-12">
                                            <input type="text" class="form-control" placeholder="Name" name="name" required="true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <p style="font-weight: bold; padding-left: 15px">Email:</p>
                                        <div class="col-xs-12">
                                            <input type="text" class="form-control" placeholder="Enter Valid Email" name="email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <p style="font-weight: bold; padding-left: 15px">Password:</p>
                                        <div class="col-xs-12">
                                            <input type="password" class="form-control" placeholder="Password (Min. 6 characters)" name="password" required="true" pattern=".{6,}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <p style="font-weight: bold; padding-left: 15px">Phone Number:</p>
                                        <div class="col-xs-12">
                                            <input type="tel" class="form-control" placeholder="Enter Valid Phone Number (Ex:8448444853)" name="contact" pattern="[789][0-9]{9}" >
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Sign Up" class="btn btn-success btn-lg btn-block">
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
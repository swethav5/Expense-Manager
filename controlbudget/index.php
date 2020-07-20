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
        <div id="banner-image">
            <div class="container">
                <div id="banner-content">
                    <h3>We help you control your budget</h3><br>
                    <a href="login.php" class="btn btn-success btn-lg">Start Today</a>
                </div>
            </div>
        </div>
        <?php
            require 'includes/footer.php';
        ?>
    </body>
</html>

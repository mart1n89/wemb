<!doctype html>
<html>
    <head>
        <title>Testimeter</title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
        
        <?php 
            if (isset($this->js)){ 
                foreach ($this->js as $js){
                echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script';
                }
            }
        ?>
    </head>
    <body>
        
        <?php Session::init(); ?>
        
        <div id="header">
            
            <h2>Testimeter<img class="logo" src="public/css/images/HF_Logo.png" srcset="public/css/images/HF_Logo.png 2.5x"></h2>-->-->
           
            <?php if (Session::get('loggedIn') == false): ?>
            <a href="<?php echo URL; ?>home" class="button" >Main</a>
                <a href="<?php echo URL; ?>help" class="button">Help</a>
                <a href="<?php echo URL; ?>about" class="button">About</a>
            <?php endif; ?>  
            <?php if (Session::get('loggedIn') == true): ?>
                <a href="<?php echo URL; ?>dashboard" class="button">Dashboard</a>
                <a href="<?php echo URL; ?>quiz" class="button">Quiz</a>
                <?php if (Session::get('role') == 'owner'): ?>
                    <a href="<?php echo URL; ?>user" class="button">Users</a>
                <?php endif; ?>
                <a href="<?php echo URL; ?>dashboard/logout" class="button">Logout</a>
            <?php else: ?>
                <a href="<?php echo URL; ?>login" class="button"><span>Login</span></a>
            <?php endif; ?>  

            <br />
        </div>
        
        <div id="content"> 
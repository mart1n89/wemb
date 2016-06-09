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
        
        <div id="header" > 
            <table width="90%">
                <tr>
                    <td ><h2>Testimeter</h2></td>
                    <td ><img class="logo" src="public/css/images/HF_Logo.png" alt="HS-Logo"></td>
                </tr>                
            </table>
            
            <?php if (Session::get('loggedIn') == false): ?>
            <a href="<?php echo URL; ?>home" class="buttonNav"><span>Main</span></a>
            <a href="<?php echo URL; ?>help" class="buttonNav"><span>Help</span></a>
            <a href="<?php echo URL; ?>about" class="buttonNav"><span>About</span></a>
            
            <?php endif; ?>  
            
            <?php if (Session::get('loggedIn') == true): ?>
            <a href="<?php echo URL; ?>dashboard" class="buttonNav"><span>Dashboard</span></a>
            <a href="<?php echo URL; ?>quiz" class="buttonNav"><span>Quiz</span></a>
            
                <?php if (Session::get('role') == 'owner'): ?>

            <a href="<?php echo URL; ?>user" class="buttonNav"><span>Users</span></a>
                <?php endif; ?>
            <a href="<?php echo URL; ?>dashboard/logout" class="buttonNav"><span>Logout</span></a>
            <?php else: ?>
                <a href="<?php echo URL; ?>login" class="buttonNav"><span>Login</span></a>
            <?php endif; ?> 
        </div>
        
        <div id="content"> 

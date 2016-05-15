<!doctype html>
<html>
    <head>
        <title>Head of Page</title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js">
            $(function()) {
                alert(1);
            }
        </script>
    </head>
    <body> 
        <div id="header">
            Header
            <br />
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">Help</a>
            <a href="<?php echo URL; ?>login">Login</a>

        </div>
        
        <div id="content"> 
<?php

// Use an auto loader!
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';
require 'libs/Database.php';
require 'libs/Session.php';

require 'config/paths.php';
require 'config/database.php';
mb_internal_encoding("UTF-8");

$app = new Bootstrap();

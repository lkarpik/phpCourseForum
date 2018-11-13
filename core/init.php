<?php
// Start seseion
session_start();

// Config file include
require_once('config/config.php');

// Autoload Classes
function __autoload($class_name) {
    require_once('lib/'.$class_name.'.php');
}

// Helper files
require_once('helpers/system_helper.php');
require_once('helpers/db_helper.php');
require_once('helpers/format_helper.php');
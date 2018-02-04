<?php 

require_once 'php_action/core.php';

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
$path_parts = pathinfo(__FILE__);
$page = $path_parts['dirname'];
header('location: index.php');

?>
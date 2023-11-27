<?php
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {exit("NOT ALLOWED");}
require 'functions.php';
require 'config.php';
define('DIRECT', TRUE);

$user = new user;
$stats = new stats;


?>

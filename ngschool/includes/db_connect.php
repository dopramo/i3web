<?php
/**
 * These are the database login details
 */  
 /*
define("HOST", "localhost");     // The host you want to connect to.
define("USER", "sec_user");    // The database username. 
define("PASSWORD", "eKcGZr59zAa2BEWU");    // The database password. 
define("DATABASE", "ngschool");    // The database name.
 
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");
 
define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
*/
require_once 'db.php';   // As functions.php is not included
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
?>
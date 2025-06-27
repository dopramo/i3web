<?php
header('Content-Type: application/xml');
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
if (isset($_POST['device_emei'], $_POST['video_id']) && checkpurchased($_POST['device_emei'],  $_POST['video_id'], $mysqli) ) {
    
$output = "<root><name>true</name></root>";
    
} else {
$output = "<root><name>false</name></root>";
}
print ($output);


?> 
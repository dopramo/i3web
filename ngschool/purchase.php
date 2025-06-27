<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

if (isset($_GET['id'], $_GET['grade'])) {    
      if (downlodlession($_SESSION['device_emei'], $_GET['id'], $mysqli) == true) {
        // Login success 
        header('Location: ../ngschool/subject.php?grade='.$_GET['grade'].'&subject='.$_GET['subject']);
    }else{
 header('Location: ../ngschool/subject.php?grade='.$_GET['grade'].'&subject='.$_GET['subject'].'&error=e');
}

}

?>
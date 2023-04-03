<?php
   
    session_start();
    session_destroy();
    header('Location: ../v1/auth_login.php?auth=logout');
    exit;

    
?>
<?php 
require_once "session_start.php";
if(!isset($_SESSION['log_success'])){
    header("Location: ../auth_login.php");
}else if(isset($_GET['url']) && $_GET['url'] = "Teman"){
     
}else{
    header("location: teman.php?url=Teman");
}
require "layout_header.php";
?>
    
<?php
    require "layout_footer.php";
?>

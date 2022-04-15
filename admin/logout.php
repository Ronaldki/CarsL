<?php 
require_once '../include/initialize.php';

@session_start();


unset( $_SESSION['USERID'] );
unset( $_SESSION['U_NAME'] );
unset( $_SESSION['U_USERNAME'] );
unset( $_SESSION['U_PASS'] );
unset( $_SESSION['U_ROLE'] ); 

redirect(web_root."admin/login.php?logout=1");
?>